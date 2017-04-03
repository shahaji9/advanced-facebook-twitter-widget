<?php
/**
 * Author: Shahaji Deshmukh on 02-January-2017
 * @since 1.2
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
 /*
 * Create the [facebook-pagelike] shortcode.
 * @since 1.2
 * Checks that facebook.com is in the href & modifies if it doesn't
 * @param   $atts   array   href, width, height, hide_cover, show_facepile, align, tabs, small_header, adapt_container_width
 * @return  string  Outputs the Facebook Page feed via shortcode.
 * Basic Shortcode [facebook-pagelike href="facebook" tabs="timeline, events, messages"]
 * Custom Shortcode [facebook-pagelike href="facebook" width="340" height="500" tabs="timeline, events, messages" small_header="false" align="left" hide_cover="false" show_facepile="false"]
 */

function sdaftw_facebook_shortcode( $atts ) {
	
	global $appId;

	$facebook_pagelike_atts = shortcode_atts( array(
								'href'                  => '',
								'width'                 => '340',
								'height'                => '500',
								'hide_cover'            => 'false',
								'show_facepile'         => 'false',
								'align'                 => 'initial',
								'tabs'                  => 'timeline',
								'small_header'          => 'false',
								'adapt_container_width' => 'true',
								
							), $atts );
	
	$localVars = array('app_id' => $appId);
	wp_localize_script('fbtw-widgets', 'sdftvars', $localVars);

	$output = '<!-- Start Advanced Facebook Twitter Widget Plugin (Facebook Shortcode) - https://wordpress.org/plugins/advanced-facebook-twitter-widget/ -->';

	//Facebook Widget Starts
	$output .= '<div id="fbtw-advanced-facebook-widget" style="text-align:' . esc_attr( $facebook_pagelike_atts['align'] ) . ';">';

	/************************** Facebook Feeds ****************************/
	$output .= '<div class="fb-page" ';
	if ( false !== strpos( $facebook_pagelike_atts['href'], 'facebook.com' ) ) {
		$output .= 'data-href="' . esc_attr( $facebook_pagelike_atts['href'] ) . '" ';
	} else {
		$output .= 'data-href="https://facebook.com/' . esc_attr( $facebook_pagelike_atts['href'] ) . '" ';
	}
	
	$output .= 'data-width="' . esc_attr( $facebook_pagelike_atts['width'] ) . '" ';
	$output .= 'data-height="' . esc_attr( $facebook_pagelike_atts['height'] ) . '" ';
	$output .= 'data-hide-cover="' . esc_attr( $facebook_pagelike_atts['hide_cover'] ) . '" ';
	$output .= 'data-show-facepile="' . esc_attr( $facebook_pagelike_atts['show_facepile'] ) . '" ';
	$output .= 'data-tabs="' . esc_attr( $facebook_pagelike_atts['tabs'] ) . '" ';
	$output .= 'data-small-header="' . esc_attr( $facebook_pagelike_atts['small_header'] ) . '" ';
	$output .= 'data-adapt-container-width="' . esc_attr( $facebook_pagelike_atts['adapt_container_width'] ) . '">';
	$output .= '</div>';

	$output .= '</div>';
	$output .= '<!-- End Advanced Facebook Twitter Widget Plugin (Facebook Shortcode) -->';

	return $output;
}

add_shortcode( 'facebook-pagelike', 'sdaftw_facebook_shortcode' );



/**
 * Create the [twitter-timeline] shortcode.
 * @since 1.2
 * @param   $atts   array   user_name, follow_button, data_show_count, data_show_screen_name, data_size, min_width, height, data_dnt, data_link_color
 * @return  string  Outputs the Twitter timeline with follow button via shortcode.
 * Basic Shortcode [twitter-timeline user_name="TwitterDev"]
 * Custom Shortcode with follow button [twitter-timeline user_name="TwitterDev" min_width="340" height="500" follow_button="true" data_show_count="true" data_show_screen_name="true" data_size="large"]
 * Custom Shortcode without follow button [twitter-timeline user_name="TwitterDev" min_width="340" height="500" follow_button="false" data_dnt="true" data_link_color="#365899"]
 */

function sdaftw_twitter_shortcode( $atts ) {

	$twitter_atts = shortcode_atts( array(
								'user_name'             => '',
								'follow_button'         => 'true',
								'data_show_count'       => 'true',
								'data_show_screen_name' => 'true',
								'data_size'             => '',
								'min_width'             => '340',
								'height'                => '500',
								'data_dnt'              => 'true',
								'data_link_color'       => '#0073aa'
							), $atts );

	$output = '<!-- Start Advanced Facebook Twitter Widget Plugin (Twitter Shortcode) - https://wordpress.org/plugins/advanced-facebook-twitter-widget/ -->';

	//Twitter Widget Starts
	$output .= '<div id="fbtw-advanced-twitter-widget">';

	/************************** Twitter Timeline ****************************/
	if ( esc_attr($twitter_atts['follow_button']) == 'true' && esc_attr($twitter_atts['user_name']) != ''){
		$output .= '<div class="fbtw-twitter-follow-box">';
		$output .= '<a class="twitter-follow-button"';
		$output .= 'data-show-count="'. esc_attr($twitter_atts['data_show_count']) .'" ';
		$output .= 'data-show-screen-name="'. esc_attr($twitter_atts['data_show_screen_name']) .'" ';
		$output .= 'data-size="'. esc_attr($twitter_atts['data_size']) .'" ';
		$output .= 'href="https://twitter.com/'. esc_attr($twitter_atts['user_name']) .'">Follow @'. esc_attr($twitter_atts['user_name']) .'</a>';
		$output .= '</div>';
	}
		
	$output .= '<a class="twitter-timeline" ';
	$output .= 'data-dnt="'. esc_attr($twitter_atts['data_dnt']) .'" ';
	$output .= 'href="https://twitter.com/'. esc_attr($twitter_atts['user_name']) .'" ';
    $output .= 'min-width="'. esc_attr($twitter_atts['min_width']) .'" ';
    $output .= 'height="'. esc_attr($twitter_atts['height']) .'" ';
    $output .= 'data-link-color="'. esc_attr($twitter_atts['data_link_color']) .'"></a>';
	$output .= '<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
	
	$output .= '</div>';
	$output .= '<!-- End Advanced Facebook Twitter Widget Plugin (Twitter Shortcode) -->';

	return $output;
}

add_shortcode( 'twitter-timeline', 'sdaftw_twitter_shortcode' );
