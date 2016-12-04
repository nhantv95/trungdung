(function() {
	tinymce.PluginManager.add('facebook_api_tinymce', function( editor, url ) {
		editor.addButton( 'facebook_api_tinymce', {
			text: false,
			icon: 'facebook',
			type: 'menubutton',
			menu: [
				
				/**===========================================
							Facebook Like Box TinyMce
				==============================================*/
				
				{
					text: 'Facebook Like Box',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook like box shortcode',
							body: [
								{
									type: 'textbox',
									name: 'LikeBoxURL',
									label: 'URL',
									value: 'http://www.facebook.com/FacebookDevelopers'
								},
								{
									type: 'textbox',
									name: 'LikeBoxWidth',
									label: 'Width',
									value: '300'
								},
								{
									type: 'textbox',
									name: 'LikeBoxHeight',
									label: 'Height',
									value: ''
								},
								{
									type: 'listbox',
									name: 'LikeBoxColor',
									label: 'Color',
									'values': [
										{text: 'light', value: 'light'},
										{text: 'dark', value: 'dark'},
									]
								},
								{
									type: 'listbox',
									name: 'LikeBoxFaces',
									label: 'Faces',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								},
								{
									type: 'listbox',
									name: 'LikeBoxStream',
									label: 'Stream',
									'values': [
										{text: 'false', value: 'false'},
										{text: 'true', value: 'true'},
									]
								},
								{
									type: 'listbox',
									name: 'LikeBoxHeader',
									label: 'Header',
									'values': [
										{text: 'false', value: 'false'},
										{text: 'true', value: 'true'},
									]
								},
								{
									type: 'listbox',
									name: 'LikeBoxBorder',
									label: 'Border',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_likebox url="' + e.data.LikeBoxURL + '" width="' + e.data.LikeBoxWidth + '" height="' + e.data.LikeBoxHeight + '" color="' + e.data.LikeBoxColor + '" faces="' + e.data.LikeBoxFaces + '" stream="' + e.data.LikeBoxStream + '" header="' + e.data.LikeBoxHeader + '" border="' + e.data.LikeBoxBorder + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Embedded Post TinyMce
				==============================================*/
				
				{
					text: 'Facebook Embedded Post',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook embedded posts shortcode',
							body: [
								{
									type: 'textbox',
									name: 'EmbeddedPostURL',
									label: 'URL',
									value: 'http://www.facebook.com/FacebookDevelopers/posts/10151471074398553'
								},
								{
									type: 'textbox',
									name: 'EmbeddedPostWidth',
									label: 'Width',
									value: ''
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_post url="' + e.data.EmbeddedPostURL + '" width="' + e.data.EmbeddedPostWidth + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Comment TinyMce
				==============================================*/
				
				{
					text: 'Facebook Comments',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook comments shortcode',
							body: [
								{
									type: 'textbox',
									name: 'CommentURL',
									label: 'URL',
									value: 'http://developers.facebook.com/docs/plugins/comments/'
								},
								{
									type: 'textbox',
									name: 'CommentWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'textbox',
									name: 'CoomentNumber',
									label: 'Number',
									value: '5'
								},
								{
									type: 'listbox',
									name: 'CommentColor',
									label: 'Color',
									'values': [
										{text: 'light', value: 'light'},
										{text: 'dark', value: 'dark'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_comment url="' + e.data.CommentURL + '" width="' + e.data.CommentWidth + '" number="' + e.data.CoomentNumber + '" color="' + e.data.CommentColor + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Facepile TinyMce
				==============================================*/
				
				{
					text: 'Facebook Facepile',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook facepile shortcode',
							body: [
								{
									type: 'textbox',
									name: 'FacepileID',
									label: 'ID',
									value: ''
								},
								{
									type: 'textbox',
									name: 'FacepileURL',
									label: 'URL',
									value: 'http://www.facebook.com/FacebookDevelopers'
								},
								{
									type: 'textbox',
									name: 'FacepileWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'textbox',
									name: 'FacepileHeight',
									label: 'Height',
									value: ''
								},
								{
									type: 'textbox',
									name: 'FacepileRow',
									label: 'Row',
									value: '1'
								},
								{
									type: 'listbox',
									name: 'FacepileSize',
									label: 'Size',
									'values': [
										{text: 'medium', value: 'medium'},
										{text: 'small', value: 'small'},
										{text: 'large', value: 'large'},
									]
								},
								{
									type: 'listbox',
									name: 'FacepileColor',
									label: 'Color',
									'values': [
										{text: 'light', value: 'light'},
										{text: 'dark', value: 'dark'},
									]
								},
								{
									type: 'listbox',
									name: 'FacepileCount',
									label: 'Count',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_facepile id="' + e.data.FacepileID + '" url="' + e.data.FacepileURL + '" width="' + e.data.FacepileWidth + '" height="' + e.data.FacepileHeight + '" row="' + e.data.FacepileRow + '" size="' + e.data.FacepileSize + '" color="' + e.data.FacepileColor + '" count="' + e.data.FacepileCount + '"]');
							}
						});
					}
				},
								
				/**===========================================
							Facebook Follow Button TinyMce
				==============================================*/
				
				{
					text: 'Facebook Follow Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook follow button shortcode',
							body: [
								{
									type: 'textbox',
									name: 'FollowButtonURL',
									label: 'URL',
									value: 'http://www.facebook.com/dipto01'
								},
								{
									type: 'textbox',
									name: 'FollowButtonWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'textbox',
									name: 'FollowButtonHeight',
									label: 'Height',
									value: ''
								},
								{
									type: 'listbox',
									name: 'FollowButtonColor',
									label: 'Color',
									'values': [
										{text: 'light', value: 'light'},
										{text: 'dark', value: 'dark'},
									]
								},
								{
									type: 'listbox',
									name: 'FollowButtonLayout',
									label: 'Layout',
									'values': [
										{text: 'standard', value: 'standard'},
										{text: 'box_count', value: 'box_count'},
										{text: 'button_count', value: 'button_count'},
										{text: 'button', value: 'button'},
									]
								},
								{
									type: 'listbox',
									name: 'FollowButtonFaces',
									label: 'Faces',
									'values': [
										{text: 'false', value: 'false'},
										{text: 'true', value: 'true'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_follow url="' + e.data.FollowButtonURL + '" width="' + e.data.FollowButtonWidth + '" height="' + e.data.FollowButtonHeight + '" color="' + e.data.FollowButtonColor + '" layout="' + e.data.FollowButtonLayout + '" faces="' + e.data.FollowButtonFaces + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Like Button TinyMce
				==============================================*/
				
				{
					text: 'Facebook Like Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook like button shortcode',
							body: [
								{
									type: 'textbox',
									name: 'LikeButtonURL',
									label: 'URL',
									value: 'http://developers.facebook.com/docs/plugins/'
								},
								{
									type: 'textbox',
									name: 'LikeButtonWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'listbox',
									name: 'LikeButtonLayout',
									label: 'Layout',
									'values': [
										{text: 'standard', value: 'standard'},
										{text: 'box_count', value: 'box_count'},
										{text: 'button_count', value: 'button_count'},
										{text: 'button', value: 'button'},
									]
								},
								{
									type: 'textbox',
									name: 'LikeButtonAction',
									label: 'Action',
									value: 'like'
								},
								{
									type: 'listbox',
									name: 'LikeButtonFaces',
									label: 'Faces',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								},
								{
									type: 'listbox',
									name: 'LikeButtonShare',
									label: 'Share',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_like url="' + e.data.LikeButtonURL + '" width="' + e.data.LikeButtonWidth + '" layout="' + e.data.LikeButtonLayout + '" action="' + e.data.LikeButtonAction + '" faces="' + e.data.LikeButtonFaces + '" share="' + e.data.LikeButtonShare + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Share Button TinyMce
				==============================================*/
				
				{
					text: 'Facebook Share Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook share button shortcode',
							body: [
								{
									type: 'textbox',
									name: 'ShareButtonURL',
									label: 'URL',
									value: 'http://developers.facebook.com/docs/plugins/'
								},
								{
									type: 'textbox',
									name: 'ShareButtonWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'listbox',
									name: 'ShareButtonLayout',
									label: 'Layout',
									'values': [
										{text: 'button_count', value: 'button_count'},
										{text: 'standard', value: 'standard'},
										{text: 'box_count', value: 'box_count'},
										{text: 'button', value: 'button'},
										{text: 'icon_link', value: 'icon_link'},
										{text: 'icon', value: 'icon'},
										{text: 'link', value: 'link'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_share url="' + e.data.ShareButtonURL + '" width="' + e.data.ShareButtonWidth + '" layout="' + e.data.ShareButtonLayout + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Send Button TinyMce
				==============================================*/
				
				{
					text: 'Facebook Send Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook send button shortcode',
							body: [
								{
									type: 'textbox',
									name: 'SendButtonURL',
									label: 'URL',
									value: 'http://developers.facebook.com/docs/plugins/'
								},
								{
									type: 'textbox',
									name: 'SendButtonWidth',
									label: 'Width',
									value: ''
								},
								{
									type: 'textbox',
									name: 'SendButtonHeight',
									label: 'Height',
									value: ''
								},
								{
									type: 'listbox',
									name: 'SendButtonColor',
									label: 'Color',
									'values': [
										{text: 'light', value: 'light'},
										{text: 'dark', value: 'dark'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_send url="' + e.data.SendButtonURL + '" width="' + e.data.SendButtonWidth + '" height="' + e.data.SendButtonHeight + '" color="' + e.data.SendButtonColor + '"]');
							}
						});
					}
				},
				
				/**===========================================
							Facebook Login Button TinyMce
				==============================================*/

				{
					text: 'Facebook Login Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Facebook login button shortcode',
							body: [
								{
									type: 'textbox',
									name: 'LoginButtonRow',
									label: 'Row',
									value: '1'
								},
								{
									type: 'listbox',
									name: 'LoginButtonSize',
									label: 'Size',
									'values': [
										{text: 'medium', value: 'medium'},
										{text: 'small', value: 'small'},
										{text: 'large', value: 'large'},
									]
								},
								{
									type: 'listbox',
									name: 'LoginButtonFaces',
									label: 'Faces',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								},
								{
									type: 'listbox',
									name: 'LoginButtonLogout',
									label: 'Logout',
									'values': [
										{text: 'true', value: 'true'},
										{text: 'false', value: 'false'},
									]
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[facebook_login row="' + e.data.LoginButtonRow + '" size="' + e.data.LoginButtonSize + '" faces="' + e.data.LoginButtonFaces + '" logout="' + e.data.LoginButtonLogout + '"]');
							}
						});
					}
				} // end login button
			]
		});
	});
})();
