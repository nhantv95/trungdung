/**
 * Allow prices to be added and deleted on the Menu Item editing page and
 * list table
 *
 *  @since 1.5
 */
jQuery( function ( $ ) {
	var $prices = $( '.fdm-input-prices' );

	if ( !$prices.length ) {
		return;
	}

	// Open the price editing panel in the menu item list table
	$( '.fdm-item-list-price' ).click( function( e ) {
		var $target = $( e.target );

		if ( $target.hasClass( 'fdm-item-price-edit' ) ) {
			$(this).addClass( 'is-visible' );
			return false;
		}
	} );

	// Re-usable function to remove a price entry field
	function removePrice( e ) {
		priceChanged( e );
		$( this ).closest( '.fdm-input-control' ).remove();
		return false;
	}

	// Re-usable function to signal when prices have changed.
	// Only used on menu items list table.
	function priceChanged( e ) {
		var $form = $( e.target ).closest( '.fdm-item-price-form' );

		if ( !$form.length ) {
			return;
		}

		$( '.fdm-item-price-save', $form ).removeAttr( 'disabled' );
	}

	$prices.click( function( e ) {
		var $target = $( e.target ),
			$price_panel = $(this),
			$price_input = $price_panel.find( '.fdm-input-control' ).last(),
			$new_price_input = $price_input.clone();

		if ( !$target.hasClass( 'fdm-price-add' ) ) {
			return;
		}

		$new_price_input.find( 'input[name="fdm_item_price[]"]' ).val( '' );
		$price_input.after( $new_price_input );
		$new_price_input.find( 'input' ).focus();

		$( '.fdm-input-delete', $price_panel ).off()
			.click( removePrice );
		$( 'input[name="fdm_item_price[]"]', $price_panel ).off()
			.keyup( priceChanged );

		return false;
	} );

	// Remove a price entry field
	$( '.fdm-input-delete', $prices ).click( removePrice );

	// Enable the update price button on the menu item list whenever a price
	// has changed.
	$( 'input[name="fdm_item_price[]"]', $prices ).keyup( priceChanged );

	// Save price changes (only on menu item list table)
	var $submit = $( '.fdm-item-price-save' );
	if ( $submit.length ) {
		$submit.click( function( e ) {
			var $button = $(this),
				$spinner = $button.siblings( '.spinner' ),
				$price_wrapper = $button.closest( '.fdm-item-list-price'),
				$price_summary = $price_wrapper.find( '.fdm-item-price-summary' ),
				menu_item_id = $price_wrapper.data( 'menu-item-id' ),
				$price_inputs = $price_wrapper.find( 'input[name="fdm_item_price[]"]' ),
				prices = [],
				$message = $price_wrapper.find( '.fdm-item-price-message' ),
				params;

			if ( !menu_item_id ) {
				return false;
			}

			$button.attr( 'disabled', 'disabled' );
			$spinner.css( 'visibility', 'visible' );
			$message.empty();

			$price_inputs.each( function() {
				prices.push( $(this).val() );
			} );

			params = {
				id: menu_item_id,
				prices: prices,
				action: 'fdm-menu-item-price',
				nonce: fdmSettings.nonce,
			};

			// Allow third-party addons to hook in and add data
			$price_wrapper.trigger( 'save-item-price.fdm', params );

			$.post(
				ajaxurl,
				params,
				function( r ) {

					$button.removeAttr( 'disabled' );
					$spinner.css( 'visibility', 'hidden' );

					if ( typeof r === 'undefined' || typeof r.success === 'undefined' ) {
						$message.html( fdmSettings.i18n.undefined_error );
						return;
					}

					if ( r.success === false ) {
						if ( typeof r.data === 'undefined' || typeof r.data.msg === 'undefined' ) {
							$message.html( fdmSettings.i18n.undefined_error );
						} else {
							$message.html( r.data.msg );
						}
						return;
					}

					if ( typeof r.data.price_summary !== 'undefined' ) {
						$price_summary.html( r.data.price_summary );
					}
					$price_wrapper.removeClass( 'is-visible' );
				}
			);

			return false;
		} );
	}

} );

/**
 * Handle the Menu Organizer on the Menu editing page
 *
 *  @since 1.5
 */

var fdmMenuOrganizer = fdmMenuOrganizer || {};

jQuery( function ( $ ) {

	if ( !$( '#fdm-menu-organizer' ).length ) {
		return;
	}

	/**
	 * Column slugs used by the menu organizer
	 *
	 * @param array
	 * @since 1.5
	 */
	fdmMenuOrganizer.columns = ['fdm_menu_column_one', 'fdm_menu_column_two'];

	/**
	 * Modal for editing menu section names
	 *
	 * @param jQuery object
	 * @since 1.5
	 */
	fdmMenuOrganizer.$menu_section_modal = $( '#fdm-menu-section-modal' );

	/**
	 * Initialize the menu organizer
	 *
	 * @since 1.5
	 */
	fdmMenuOrganizer.init = function() {

		$( '.fdm-sortable-sections', '#fdm-menu-organizer' ).sortable( {
			connectWith: '.fdm-sortable-sections',
			placeholder: 'fdm-menu-sections-placeholder',
			delay: 150,
			handle: '.fdm-title',
			update: fdmMenuOrganizer.sectionsUpdated,
		} );

		for ( var i in fdmMenuOrganizer.columns ) {
			var column = fdmMenuOrganizer.columns[i];
			var ids = $( '#' + column ).val();
			if ( ids ) {
				ids = ids.split(',').filter(Boolean);
				for ( var s in ids ) {
					$( '#fdm-menu-sections-list > [data-term-id="' + ids[s] + '"]' )
						.appendTo( '#' + column + '_list' );
				}
			}
		}

		$( '#fdm-menu-section-modal-save' ).click( fdmMenuOrganizer.saveMenuSectionModal );

		$( '#fdm-menu-organizer' ).click( function( e ) {
			var $target = $( e.target ),
				section_id,
				section_title;

			if ( !$target.hasClass( 'fdm-edit-section-name' ) ) {
				return;
			}

			section_title = $target.siblings( '.fdm-title' ).find( '.fdm-term-name' ).text();
			section_id = $target.parent().data( 'term-id' );

			fdmMenuOrganizer.openMenuSectionModal( section_id, section_title );

			return false;
		} );

		fdmMenuOrganizer.$menu_section_modal.click( function( e ) {
			if ( $( e.target ).is ( fdmMenuOrganizer.$menu_section_modal ) ) {
				fdmMenuOrganizer.closeMenuSectionModal();
			}
		} );

		$( document ).keyup( function( e ) {
			if ( e.which == '27' ) {
				fdmMenuOrganizer.closeMenuSectionModal();
			}
		} );

	};

	/**
	 * Update the sections values
	 *
	 * @since 1.5
	 */
	fdmMenuOrganizer.sectionsUpdated = function( event, ui ) {

		function getIds( $list ) {
			var ids = [];
			$list.each( function() {
				ids.push( $(this).data( 'term-id' ) );
			} );
			return ids;
		}

		for ( var i in fdmMenuOrganizer.columns ) {
			var column = fdmMenuOrganizer.columns[i];
			$( '#' + column ).val( getIds( $( '#' + column + '_list > li' ) ) );
		}
	};

	/**
	 * Open the Menu Section title editing modal
	 *
	 * @param int id Section id
	 * @param string title Section title
	 * @since 1.5
	 */
	fdmMenuOrganizer.openMenuSectionModal = function( id, title ) {
		var $modal = fdmMenuOrganizer.$menu_section_modal;

		$modal.find( '#fdm-menu-section-modal-name' ).val( title );
		$modal.find( '#fdm-menu-section-modal-save' ).data( 'section-id', id );
		$modal.addClass( 'is-visible' );
	};

	/**
	 * Close the Menu Section title editing modal
	 *
	 * @since 1.5
	 */
	fdmMenuOrganizer.closeMenuSectionModal = function() {
		var $modal = fdmMenuOrganizer.$menu_section_modal;

		$modal.find( '#fdm-menu-section-modal-name' ).val( '' );
		$modal.find( '#fdm-menu-section-modal-save' ).data( 'section-id', '' );
		$modal.removeClass( 'is-visible' );
	};

	/**
	 * Save changes to the Menu Section title
	 *
	 * @since 1.5
	 */
	fdmMenuOrganizer.saveMenuSectionModal = function() {
		var $modal = fdmMenuOrganizer.$menu_section_modal,
			section_id,
			section_title,
			$section_input;

		section_title = $modal.find( '#fdm-menu-section-modal-name' ).val();
		section_id = $modal.find( '#fdm-menu-section-modal-save' ).data( 'section-id' );

		$section_input = $( '#fdm_menu_column_one' ).siblings( '#fdm_menu_section_' + section_id );
		if ( !$section_input.length ) {
			$( '#fdm_menu_column_one' ).after ( $( '<input type="hidden" name="fdm_menu_section_' + section_id + '" id="fdm_menu_section_' + section_id + '" value="' + section_title + '">' ) );
		} else {
			$section_input.val( section_title );
		}

		$( '[data-term-id="' + section_id + '"] .fdm-term-name', '#fdm-menu-organizer' ).text( section_title );

		fdmMenuOrganizer.closeMenuSectionModal();

		return false;
	};

	fdmMenuOrganizer.init();
} );
