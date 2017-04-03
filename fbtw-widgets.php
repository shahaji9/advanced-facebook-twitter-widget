<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Facebook Page Like Widget Class
 */
class fbPageLike_widget extends WP_Widget {

    /** constructor */
    function __construct() {
        parent::__construct(
                'fbtw_facebook', __('Facebook Page Like and Feeds', 'facebook-pagelike-feeds')
        );
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {

        global $appId;
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $appId = $instance['app_id'];
        $facebook_page_url = $instance['facebook_page_url'];
        
        $tab_output = array();

		if ( $instance['timeline_tab'] == 1 ) {
			array_push( $tab_output, 'timeline' );
		}
		if ( $instance['events_tab'] == 1 ) {
			array_push( $tab_output, 'events' );
		}
		if ( $instance['messages_tab'] == 1 ) {
			array_push( $tab_output, 'messages' );
		}
        
        $data_small_header = isset($instance['data_small_header']) && $instance['data_small_header'] != '' ? 'true' : 'false';
        $data_hide_cover = isset($instance['data_hide_cover']) && $instance['data_hide_cover'] != '' ? 'true' : 'false';
        $data_show_facepile = isset($instance['data_show_facepile']) && $instance['data_show_facepile'] != '' ? 'true' : 'false';
        $data_adapt_container_width = isset($instance['data_adapt_container_width']) && $instance['data_adapt_container_width'] != '' ? 'true' : 'false';
        $width = $instance['width'];
        $height = $instance['height'];
        $custom_css = $instance['custom_css'];

        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;

        $localVars = array('app_id' => $appId);
        wp_localize_script('fbtw-widgets', 'sdftvars', $localVars);
        ?>
        <style>
            #fbtw-facebook-timeline{
                display: none;
            }
            <?php echo $custom_css; ?>
        </style>
        
        <?php
        echo '<center><div class="widget-loader"><img src="' . AFTW_WIDGET_PLUGIN_URL . '/loader.gif" /></div></center>';
        echo '<div id="fbtw-facebook-timeline"><div id="fb-root"></div>';
        echo '<div class="fb-page" data-tabs="' . implode( ', ', $tab_output ) . '" data-href="' . $facebook_page_url . '" data-width="' . $width . '" data-height="' . $height . '" data-small-header="' . $data_small_header . '" data-adapt-container-width="' . $data_adapt_container_width . '" data-hide-cover="' . $data_hide_cover . '" data-show-facepile="' . $data_show_facepile . '" style="' . $custom_css . '"></div></div>';
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {

        $instance = $old_instance;
			
        $instance = array('timeline_tab' => '1', 'events_tab' => '0', 'messages_tab' => '0', 'data_small_header' => 'false', 'data_adapt_container_width' => 'false', 'data_hide_cover' => 'false', 'data_show_facepile' => 'false');
        
        foreach ($instance as $field => $val) {
            if (isset($new_instance[$field]))
                $instance[$field] = 'true';
        }
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['app_id'] = strip_tags($new_instance['app_id']);
        $instance['facebook_page_url'] = strip_tags($new_instance['facebook_page_url']);
        $instance['timeline_tab'] = strip_tags($new_instance['timeline_tab']);
        $instance['events_tab'] = strip_tags($new_instance['events_tab']);
        $instance['messages_tab'] = strip_tags($new_instance['messages_tab']);
        $instance['data_small_header'] = strip_tags($new_instance['data_small_header']);
        $instance['data_hide_cover'] = strip_tags($new_instance['data_hide_cover']);
        $instance['data_show_facepile'] = strip_tags($new_instance['data_show_facepile']);
        $instance['data_adapt_container_width'] = strip_tags($new_instance['data_adapt_container_width']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
        $instance['custom_css'] = strip_tags($new_instance['custom_css']);

        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {

        /**
         * Set Default Value for widget form
         */
        $defaults = array('title' => 'Facebook Page Like', 'app_id' => '', 'facebook_page_url' => 'http://facebook.com/facebook', 'timeline_tab' => '1', 'events_tab' => '0', 'messages_tab' => '0', 'width' => '250', 'height' => '350', 'data_small_header' => 'false', 'data_adapt_container_width' => 'false', 'data_hide_cover' => 'false', 'data_show_facepile' => 'on', 'custom_css' => '');
        
        $instance = wp_parse_args((array) $instance, $defaults);
        $title = esc_attr($instance['title']);
        $appId = isset($instance['app_id']) ? esc_attr($instance['app_id']) : "";
        $facebook_page_url = isset($instance['facebook_page_url']) ? esc_attr($instance['facebook_page_url']) : "http://www.facebook.com/facebook";
        
        $timeline_tab = array( 'true' => 'Yes', 'false' => 'No' );
		$events_tab = array( 'true' => 'Yes', 'false' => 'No' );
		$messages_tab = array( 'true' => 'Yes', 'false' => 'No' );
        
        $data_hide_cover = esc_attr($instance['data_hide_cover']);
        $data_show_facepile = esc_attr($instance['data_show_facepile']);
        $data_adapt_container_width = esc_attr($instance['data_adapt_container_width']);
        $width = esc_attr($instance['width']);
        $height = esc_attr($instance['height']);        
        $custom_css = isset($instance['custom_css']) ? esc_attr($instance['custom_css']) : "";
        
        $booleans = array( 1 => 'Yes', 0 => 'No' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'facebook-pagelike-feeds'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('app_id'); ?>"><?php _e('Facebook Application Id:', 'facebook-pagelike-feeds'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('app_id'); ?>" name="<?php echo $this->get_field_name('app_id'); ?>" type="text" value="<?php echo $appId ?>" />
            <small>
				<?php _e('Configure a'); ?> <a href="https://developers.facebook.com/apps/" target="_blank"><?php _e('Facebook App'); ?></a> <?php _e('to enable the Share functionality.'); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_page_url'); ?>"><?php _e('Facebook Page Url:', 'facebook-pagelike-feeds'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_page_url'); ?>" name="<?php echo $this->get_field_name('facebook_page_url'); ?>" type="text" value="<?php echo $facebook_page_url; ?>" />
            <small>
                <?php _e('Works with only'); ?> <a href="https://developers.facebook.com/docs/plugins/page-plugin" target="_blank"> <?php _e('Valid Facebook Pages'); ?></a>
            </small>
        </p>        
        <p>
			<label for="<?php echo $this->get_field_id( 'timeline_tab' ); ?>"><?php _e( 'Show Timeline Tab?', 'facebook-pagelike-feeds' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'timeline_tab' ); ?>" name="<?php echo $this->get_field_name( 'timeline_tab' ); ?>">
				<?php foreach ( $booleans as $key => $val ): ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['timeline_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'events_tab' ); ?>"><?php _e( 'Show Events Tab?', 'facebook-pagelike-feeds' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'events_tab' ); ?>" name="<?php echo $this->get_field_name( 'events_tab' ); ?>">
				<?php foreach ( $booleans as $key => $val ): ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['events_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'messages_tab' ); ?>"><?php _e( 'Show Messages Tab?', 'facebook-pagelike-feeds' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'messages_tab' ); ?>" name="<?php echo $this->get_field_name( 'messages_tab' ); ?>">
				<?php foreach ( $booleans as $key => $val ): ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['messages_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['data_small_header'], "on") ?> id="<?php echo $this->get_field_id('data_small_header'); ?>" name="<?php echo $this->get_field_name('data_small_header'); ?>" />
            <label for="<?php echo $this->get_field_id('data_small_header'); ?>"><?php _e('Use Small Header', 'facebook-pagelike-feeds'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['data_hide_cover'], "on") ?> id="<?php echo $this->get_field_id('data_hide_cover'); ?>" name="<?php echo $this->get_field_name('data_hide_cover'); ?>" />
            <label for="<?php echo $this->get_field_id('data_hide_cover'); ?>"><?php _e('Hide Cover Photo', 'facebook-pagelike-feeds'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['data_show_facepile'], "on") ?> id="<?php echo $this->get_field_id('data_show_facepile'); ?>" name="<?php echo $this->get_field_name('data_show_facepile'); ?>" />
            <label for="<?php echo $this->get_field_id('data_show_facepile'); ?>"><?php _e('Show Friends Faces', 'facebook-pagelike-feeds'); ?></label>
        </p>        
        <p>
            <input onclick="showHideWidthSection();" class="checkbox" type="checkbox" <?php checked($instance['data_adapt_container_width'], "on") ?> id="<?php echo $this->get_field_id('data_adapt_container_width'); ?>" name="<?php echo $this->get_field_name('data_adapt_container_width'); ?>" />
            <label for="<?php echo $this->get_field_id('data_adapt_container_width'); ?>"><?php _e('Adapt To Plugin Container Width', 'facebook-pagelike-feeds'); ?></label>
        </p>
        <p class="width_section <?php echo $instance['data_adapt_container_width'] == 'on' ? 'hide-width-section' : ''; ?>">
            <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'facebook-pagelike-feeds'); ?></label>
            <input size="5" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'facebook-pagelike-feeds'); ?></label>
            <input size="5" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('custom_css'); ?>"><?php _e('Custom CSS:', 'facebook-pagelike-feeds'); ?></label>
            <textarea rows="2" cols="30" name="<?php echo $this->get_field_name('custom_css'); ?>"><?php echo trim($custom_css); ?></textarea>
        </p>
        <script type="text/javascript">
            function showHideWidthSection() {
                if (jQuery(".width_section").hasClass('hide-width-section'))
                    jQuery(".width_section").removeClass('hide-width-section');
                else
                    jQuery(".width_section").addClass('hide-width-section');
            }
        </script>
        <style type="text/css">.hide-width-section {display: none;}</style>
        <?php
    }

}

/**
 * Widget Code
 */
class TwitterTweets_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'fbtw_tweets', __('Twitter Tweets With Follow Button', 'twitter-tweets-with-follow-button')
        );
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance) {
        // Outputs the content of the widget
        extract($args); // Make before_widget, etc available.

        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        $TwitterUserName = $instance['TwitterUserName'];
        $Width = $instance['Width'];
        $Height = $instance['Height'];
        $LinkColor = $instance['LinkColor'];
        $ExcludeReplies = $instance['ExcludeReplies'];
        $AutoExpandPhotos = $instance['AutoExpandPhotos'];
        $TwitterFollowButton = $instance['TwitterFollowButton'];
        $TwitterFollowButtonCount = $instance['TwitterFollowButtonCount'];
        $ButtonHideUsername = $instance['ButtonHideUsername'];
        $FollowButtonLarge = $instance['FollowButtonLarge'];        
        $CustomTwitterCss = $instance['CustomTwitterCss'];
        ?>
        <style>
            #fbtw-twitter-timeline{
                display: block;
                width: 100%;
                float: left;
                overflow: hidden;
                display: none;
            }
            #fbtw-twitter-timeline .fbtw-twitter-follow-box{
                width: 100%;
                display: block;
                float: left;
            }
            #fbtw-twitter-timeline .fbtw-twitter-follow-box iframe{
                margin-bottom: 0px;
            }
            <?php echo $CustomTwitterCss; ?>
        </style>
        <center><div class="widget-loader"><img src="<?php echo AFTW_WIDGET_PLUGIN_URL; ?>/loader.gif" /></div></center>
        <div id="fbtw-twitter-timeline">
            <?php if (isset($TwitterFollowButton) && $TwitterFollowButton == 'on') { ?>
                <div class="fbtw-twitter-follow-box">
                    <a class="twitter-follow-button" data-show-count="<?php echo (isset($TwitterFollowButtonCount) && $TwitterFollowButtonCount == 'on') ? 'true' : 'false'; ?>" data-show-screen-name="<?php echo (isset($ButtonHideUsername) && $ButtonHideUsername == 'on') ? 'false' : 'true'; ?>" data-size="<?php echo (isset($FollowButtonLarge) && $FollowButtonLarge == 'on') ? 'large' : ''; ?>" href="https://twitter.com/<?php echo $TwitterUserName; ?>">Follow @<?php echo $TwitterUserName; ?></a>                    
                </div>
            <?php } ?>
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/<?php echo esc_attr($TwitterUserName); ?>" 
               min-width="<?php echo esc_attr($Width); ?>" 
               height="<?php echo esc_attr($Height); ?>" 
               data-link-color="<?php echo esc_attr($LinkColor); ?>"></a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <?php
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance = array('Height' => '450', 'LinkColor' => '#3b94d9', 'ExcludeReplies' => 'yes', 'AutoExpandPhotos' => 'yes', 'TwitterFollowButtonCount' => 'true', 'ButtonHideUsername' => 'false');
        foreach ($instance as $field => $val) {
            if (isset($new_instance[$field]))
                $instance[$field] = 'true';
        }

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['TwitterUserName'] = strip_tags($new_instance['TwitterUserName']);
        $instance['Width'] = strip_tags($new_instance['Width']);
        $instance['Height'] = strip_tags($new_instance['Height']);
        $instance['LinkColor'] = strip_tags($new_instance['LinkColor']);
        $instance['ExcludeReplies'] = strip_tags($new_instance['ExcludeReplies']);
        $instance['AutoExpandPhotos'] = strip_tags($new_instance['AutoExpandPhotos']);
        $instance['TwitterFollowButton'] = strip_tags($new_instance['TwitterFollowButton']);
        $instance['TwitterFollowButtonCount'] = strip_tags($new_instance['TwitterFollowButtonCount']);
        $instance['ButtonHideUsername'] = strip_tags($new_instance['ButtonHideUsername']);
        $instance['FollowButtonLarge'] = strip_tags($new_instance['FollowButtonLarge']);
        $instance['CustomTwitterCss'] = strip_tags($new_instance['CustomTwitterCss']);

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance) {

        $defaults = array('title' => 'Twitter Tweets', 'TwitterUserName' => '', 'Height' => '450', 'LinkColor' => '#3b94d9', 'ExcludeReplies' => 'yes', 'AutoExpandPhotos' => 'yes', 'TwitterFollowButton' => '', 'TwitterFollowButtonCount' => 'false', 'ButtonHideUsername' => 'true', 'FollowButtonLarge' => '', 'CustomTwitterCss' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        $title = esc_attr($instance['title']);
        $TwitterUserName = isset($instance['TwitterUserName']) ? esc_attr($instance['TwitterUserName']) : "";
        $Height = esc_attr($instance['Height']);
        $LinkColor = esc_attr($instance['LinkColor']);
        $ExcludeReplies = esc_attr($instance['ExcludeReplies']);
        $AutoExpandPhotos = esc_attr($instance['AutoExpandPhotos']);
        $TwitterFollowButton = esc_attr($instance['TwitterFollowButton']);
        $TwitterFollowButtonCount = esc_attr($instance['TwitterFollowButtonCount']);
        $ButtonHideUsername = esc_attr($instance['ButtonHideUsername']);
        $FollowButtonLarge = esc_attr($instance['FollowButtonLarge']);
        $CustomTwitterCss = esc_attr($instance['CustomTwitterCss']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'twitter-tweets-with-follow-button'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="<?php _e('Enter Widget Title', 'twitter-tweets-with-follow-button'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('TwitterUserName'); ?>"><?php _e('Twitter Username:', 'twitter-tweets-with-follow-button'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('TwitterUserName'); ?>" name="<?php echo $this->get_field_name('TwitterUserName'); ?>" type="text" value="<?php echo esc_attr($TwitterUserName); ?>" placeholder="<?php _e('Enter Your Twitter Account Username', 'twitter-tweets-with-follow-button'); ?>">
            <small>
                <?php _e('Works with only', 'twitter-tweets-with-follow-button'); ?>
                <a href="https://dev.twitter.com/web/embedded-timelines" target="_blank">
                    <?php _e('Valid Twitter Username', 'twitter-tweets-with-follow-button'); ?>
                </a>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('Height'); ?>"><?php _e('Timeline Height:', 'twitter-tweets-with-follow-button'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('Height'); ?>" name="<?php echo $this->get_field_name('Height'); ?>" type="text" value="<?php echo esc_attr($Height); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('LinkColor'); ?>"><?php _e('URL Link Color:', 'twitter-tweets-with-follow-button'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('LinkColor'); ?>" name="<?php echo $this->get_field_name('LinkColor'); ?>" type="text" value="<?php echo esc_attr($LinkColor); ?>">            
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ExcludeReplies'); ?>"><?php _e('Exclude Replies on Tweets', 'twitter-tweets-with-follow-button'); ?></label>
            <select id="<?php echo $this->get_field_id('ExcludeReplies'); ?>" name="<?php echo $this->get_field_name('ExcludeReplies'); ?>">
                <option value="yes" <?php if ($ExcludeReplies == "yes") echo "selected=selected" ?>>Yes</option>
                <option value="no" <?php if ($ExcludeReplies == "no") echo "selected=selected" ?>>No</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('AutoExpandPhotos'); ?>"><?php _e('Auto Expand Photos in Tweets', 'twitter-tweets-with-follow-button'); ?></label>
            <select id="<?php echo $this->get_field_id('AutoExpandPhotos'); ?>" name="<?php echo $this->get_field_name('AutoExpandPhotos'); ?>">
                <option value="yes" <?php if ($AutoExpandPhotos == "yes") echo "selected=selected" ?>>Yes</option>
                <option value="no" <?php if ($AutoExpandPhotos == "no") echo "selected=selected" ?>>No</option>
            </select>
        </p>
        <p>
            <input onclick="showHideFollowButtonOptions();" class="checkbox" type="checkbox" <?php checked($instance['TwitterFollowButton'], "on") ?> id="<?php echo $this->get_field_id('TwitterFollowButton'); ?>" name="<?php echo $this->get_field_name('TwitterFollowButton'); ?>" />
            <label for="<?php echo $this->get_field_id('TwitterFollowButton'); ?>"><?php _e('Visible Follow Button', 'twitter-tweets-with-follow-button'); ?></label>
        </p>
        <p class="follow_btn <?php echo $instance['TwitterFollowButton'] == 'on' ? 'show-follow-button-option' : ''; ?>">
            <input class="checkbox" type="checkbox" <?php checked($instance['TwitterFollowButtonCount'], "on") ?> id="<?php echo $this->get_field_id('TwitterFollowButtonCount'); ?>" name="<?php echo $this->get_field_name('TwitterFollowButtonCount'); ?>" />
            <label for="<?php echo $this->get_field_id('TwitterFollowButtonCount'); ?>"><?php _e('Show Count', 'twitter-tweets-with-follow-button'); ?></label>
        </p>
        <p class="follow_btn <?php echo $instance['TwitterFollowButton'] == 'on' ? 'show-follow-button-option' : ''; ?>">
            <input class="checkbox" type="checkbox" <?php checked($instance['ButtonHideUsername'], "on") ?> id="<?php echo $this->get_field_id('ButtonHideUsername'); ?>" name="<?php echo $this->get_field_name('ButtonHideUsername'); ?>" />
            <label for="<?php echo $this->get_field_id('ButtonHideUsername'); ?>"><?php _e('Hide Username', 'twitter-tweets-with-follow-button'); ?></label>
        </p>
        <p class="follow_btn <?php echo $instance['TwitterFollowButton'] == 'on' ? 'show-follow-button-option' : ''; ?>">
            <input class="checkbox" type="checkbox" <?php checked($instance['FollowButtonLarge'], "on") ?> id="<?php echo $this->get_field_id('FollowButtonLarge'); ?>" name="<?php echo $this->get_field_name('FollowButtonLarge'); ?>" />
            <label for="<?php echo $this->get_field_id('FollowButtonLarge'); ?>"><?php _e('Button Large', 'twitter-tweets-with-follow-button'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('CustomTwitterCss'); ?>"><?php _e('Custom CSS:', 'twitter-tweets-with-follow-button') ?></label>
            <textarea rows="2" cols="30" name="<?php echo $this->get_field_name('CustomTwitterCss'); ?>"><?php echo trim($CustomTwitterCss); ?></textarea>
        </p>
        <script type="text/javascript">
            function showHideFollowButtonOptions() {
                if (jQuery(".follow_btn").hasClass('show-follow-button-option'))
                    jQuery(".follow_btn").removeClass('show-follow-button-option');
                else
                    jQuery(".follow_btn").addClass('show-follow-button-option');
            }
        </script>
        <style type="text/css">
            .follow_btn{ display: none; }
            .show-follow-button-option { display: block; }
        </style>
        <?php
    }

}

// register custom widgets
function fbtw_register_custom_widget() {
    register_widget('fbPageLike_widget');
    register_widget('TwitterTweets_widget');
}

add_action('widgets_init', 'fbtw_register_custom_widget');
