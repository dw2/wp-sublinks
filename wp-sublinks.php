<?php
/*
Plugin Name: wp-sublinks
Plugin URI: http://dougwaltman.com/
Description: Creates an unordered list of links for the sub-pages of the specified ID. If no ID is specified, the current page will be used instead. Examples: [subpage-linkage] (all sub-pages of the current page), [sublinks ID="2"] (all sub-pages of the page with the ID of 2), [sublinks ID="0"] (full sitemap)
Version: 3
Author: Douglas Waltman II
Author URI: http://dougwaltman.com/
*/

function get_sublinks($atts, $content=null, $code="")
{
  global $post;

	extract(shortcode_atts(array('of' => $post->ID), $atts));
	
	$of = $of == '0' ? '' : preg_replace('/[^0-9\,]/', '', $of);

  $ul = '<ul class="sublinks">'.wp_list_pages('echo=0&title_li='.($of ? "&child_of=$of" : '')).'</ul>';

  return $ul;
}
add_shortcode('sublinks', 'get_sublinks');