<?php

/*

Available environment vars:
 - $widget
 - $options

*/

Echo $widget->before_widget;

if (!empty($widget->title))
  echo $widget->before_title . $widget->title . $widget->after_title;

Echo Gallery_Shortcode(Array(
  'id' => 0,
  'ids' => $options->image_ids,
  'columns' => $options->columns,
  'size' => $options->thumb_size
));

Echo $widget->after_widget;
