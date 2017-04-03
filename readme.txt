=== Advanced Facebook Twitter Widget & Shortcode ===
Contributors: shahaji9
Donate link: https://www.paypal.me/ShahajiDeshmukh
Tags: facebook, facebook like box, twitter, tweet, tweets, twitter feed, twitter timeline, social, social media, embed tweets, facebook fan pages, facebook like button, facebook button share, facebook social bookmarking, facebook feeds, social share, wordpress social share, socialmedia, social media widget, social media sharing, social media icon, facebook widget, twitter widget
Requires at least: 3.0
Tested up to: 4.7
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A powerful Facebook and Twitter widgets & shortcode integration that allows you to display facebook, twitter timelines for your wordpress website.

== Description ==
<p>Facebook & Twitter Integration widget is made to display your Facebook & Twitter profiles of your brand on your website(See Screenshots). This widget is built to increase your facebook page likes & twitter followers from website without sending users to social media accounts. Just install & activate this widget from Appearance >> Widgets section to integrate your social media accounts on sidebar of your websites or blogs. After intergrating this widget website users can easily access to social media news feeds directly from your website. Benifit of this Widget is that it made to customise what you want to display from your social accounts whether it is News feeds, Event information or Messages.</p>
<p>Also, you can use shortcodes for Facebook [facebook-pagelike href="facebook"] & Twitter [twitter-timeline user_name="TwitterDev"].</p>
<p>This plugin is very useful for displaying facebook page like button, twitter follow button and news feeds. It will improve page likes and followers.</p>

<h4>Features</h4>
<pre><code>
* Facebook widget integration 
* Twitter widget integration
* Shortcode integration for page/post/templates
* Shortcode customization
* Display facebook timeline, events, messages tabs
* Add/Remove Twitter follow button with its customizations
* Easy to setup and maintain
* Clean & simple widgets options
</code></pre>

<h4>Advantages</h4>
* Increase your facebook page likes and twitter followers

<h4>Widget Instructions</h4>
<h5>Facebook Widget:</h5>
<ol>
<li>Add a customizable Facebook widget through Appearance >> Widgets</li>
<li>Choose "Facebook Page Like and Feeds" Widget</li>
<li>Update the Facebook Page URL & Options</li>
<li>Click Save button.</li>
</ol>

<h5>Twitter Widget:</h5>
<ol>
<li>Add a customizable Twitter widget through Appearance >> Widgets</li>
<li>Choose "Twitter Tweets With Follow Button" Widget</li>
<li>Update the Twitter Username & Options</li>
<li>Click Save button.</li>
</ol>

<p>See the <a href="https://wordpress.org/plugins/advanced-facebook-twitter-widget/screenshots/" rel="nofollow">screenshots</a> for your reference.</p>

<h4>Shortcode Instructions</h4>
<p>Basic Shortcode for Facebook:</p>
<pre><code>[facebook-pagelike href="facebook" tabs="timeline, events, messages"]</code></pre>

<p>Advanced Shortcode for Facebook:</p>
<pre><code>[facebook-pagelike href="facebook" width="340" height="500" tabs="timeline, events, messages" small_header="false" align="left" hide_cover="false" show_facepile="false"]</code></pre>

<p>Basic Shortcode for Twitter:</p>
<pre><code>[twitter-timeline user_name="TwitterDev"]</code></pre>

<p>Advanced Shortcode for Twitter With Follow Button:</p>
<pre><code>[twitter-timeline user_name="TwitterDev" min_width="340" height="500" follow_button="true" data_show_count="true" data_show_screen_name="true" data_size="large" data_link_color="#365899"]</code></pre>

<p>Advanced Shortcode for Twitter Without Follow Button:</p>
<pre><code>[twitter-timeline user_name="TwitterDev" min_width="340" height="500" follow_button="false" data_dnt="true" data_link_color="#365899"]</code></pre>

<p>To use a shortcode in a page/theme template, simply wrap the standard WordPress do_shortcode() function. eg.</p>
<pre><code><?php echo do_shortcode('[twitter-timeline user_name="TwitterDev"]'); ?></code></pre>

<p>For more details about the shortcode parameters see the <a href="https://wordpress.org/plugins/advanced-facebook-twitter-widget/installation/" rel="nofollow">installation</a> page.</p>

<p>Also, you can check our Facebook Twitter Feeds https://wordpress.org/plugins/fbtw-feeds plugin for your website or blog.</p>

<h4>Rate Us/ Feedback</h4>
<p>Give your valuable feedback so that we can improve the plugin for you and other users. Please take the time to let us and others know about your experiences by leaving a review.</p>

== Installation ==
1. Put the folder named "advanced-facebook-twitter-widget" under '/wp-content/plugins/' directory or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress. For more details, http://codex.wordpress.org/Managing_Plugins
3. Goto Appearance >> Widgets.
4. For facebook (timeline, events and messages) use "Facebook Page Like and Feeds" and for twitter follow button and timeline use "Twitter Tweets With Follow Button" widgets.
5. Add widgets into the sidebars or any customized section in Widgets area and it will be working fine.

<h4>Shortcode Parameters for Facebook:</h4>
<ol>
	<li>href - Any Fan Page URL (not your personal page!)</li>
	<li>tabs - timeline, events, messages</li>
	<li>width - number (minimum 180, maximum 500)</li>
	<li>height - number (min 70)</li>
	<li>hide_cover - true or false</li>
	<li>show_facepile - true or false</li>
	<li>small_header - true or false</li>
</ol>

<h4>Shortcode Parameters for Twitter:</h4>
<ol>
	<li>user_name - Any Twitter Username (eg. TwitterDev)</li>
	<li>min_width - number</li>
	<li>height - number</li>
	<li>data_dnt - true or false</li>
	<li>data_link_color - eg. #365899</li>
</ol>
<p>Follow Button Cutomization:</p>
<ol>
	<li>follow_button - true or false</li>
	<li>data_show_count - true or false</li>
	<li>data_show_screen_name - true or false</li>
	<li>data_size - large or ''</li>
</ol>

== Frequently Asked Questions ==

== Screenshots ==
1. See screenshot-1.png - Shows facebook page like widget settings
2. See screenshot-2.png - Shows twitter follow button and timeline settings
3. See screenshot-3.png - Shows how facebook page like and timeline will be showing at sidebar
4. See screenshot-4.png - Shows how twitter follow button and timeline will be showing at sidebar

== Changelog ==
<h4>1.2 - 03 January 2017</h4>
<p>Added Shortcodes for Page/Post/Templates:</p>
<ul>
<li>Shortcode for Facebook</li>
<li>Shortcode for Twitter</li>
</ul>

<h4>1.1 - 02 January 2017</h4>
<p>Major changes: "Facebook Page Like and Feeds" widgets options</p>
<ul>
<li>Remove the tabs option</li>
<li>Added facebook timeline, events and messages tabs options separately</li>
</ul>

<h4>1.0 - 26 December 2016</h4>
<ul>
<li>Initial release</li>
</ul>

== Upgrade Notice ==
