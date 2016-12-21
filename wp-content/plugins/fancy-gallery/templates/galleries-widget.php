<?php

/*

Available environment vars:
 - $widget
 - $options

*/

Echo $widget->before_widget;

if (!empty($widget->title))
  echo $widget->before_title . $widget->title . $widget->after_title;

while ($options->galleries->have_Posts()): $options->galleries->the_Post(); ?>

<div class="gallery gallery-<?php The_ID() ?>">
  <h4><a href="<?php The_Permalink() ?>" title="<?php The_Title_Attribute() ?>"><?php The_Title() ?></a></h4>
  <?php The_Excerpt() ?>
</div>

<?php endwhile;

Echo $widget->after_widget;
