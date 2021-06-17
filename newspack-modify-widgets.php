<?php
/*
Plugin Name: Newspack - Modify Widget Arguments
Description: Allows you to modify default widgets, inspired by Tracy Becker.  No front end editor, edits must be made to the plugin to configure.
Author: Daniel Brown => Newspack => Automattic
Version: 1
Author URI: https://newspack.pub
*/

// Key = Widget to hook into
// Value = Arguments you would configure in WP_Query
// https://developer.wordpress.org/reference/classes/wp_query/

$newspack_widget_configurations['widget_posts_args'] = [
	"category__not_in" => [
		"455", // Category Id
		"841", // Additional Category Id
	],
];


// No need to edit below this line
// -------------------------------------------------------------------------------------------
class NewspackBase {
	// Building additional base function here
}

class NewspackWidget extends NewspackBase {
	static public function reconfigureWidget($args) {
		// Additional modification of arguments here
	    return $args;
	}
}

foreach($newspack_widget_configurations as $widget => $args)
{
	add_filter(
		$widget, // This hooks into the widget
		function() use ($args) { return NewspackWidget::reconfigureWidget($args); }, // what to run when "widget" is hooked
		1 // Priority of this filter, 1 = top priority, 10 is default
	);
}
