<?php
/**
* Initializes the Neuro Theme Options
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Neuro.
* @since 2.0
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$carouselterms2 = get_terms('carousel_categories', 'hide_empty=0');

	$customcarousel = array();
                                    
    	foreach($carouselterms2 as $carouselterm) {

        	$customcarousel[$carouselterm->slug] = $carouselterm->name;

        }

$customterms2 = get_terms('slide_categories', 'hide_empty=0');

	$customslider = array();
                                    
    	foreach($customterms2 as $customterm) {

        	$customslider[$customterm->slug] = $customterm->name;

        }

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "All";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }


$options
	->section("Welcome")
		->info("<h1>Neuro</h1>
		
<p><strong>A Responsive Blog WordPress Theme with Drag and Drop Theme Options</strong></p>

<p>Neuro includes a Responsive Design (which magically adjusts to mobile devices such as the iPhone and iPad), Responsive Slider, Drag & Drop Header Elements, Page and Blog Elements, simplified Theme Options, and is built with HTML5 and CSS3.</p>

<p>To get started simply work your way through the options below, add your content, and always remember to hit save after making any changes.</p>

<p>The Neuro Slider options are under the Neuro Pro Page Options which are available below the Page content entry area in WP-Admin when you edit a page. This way you can configure each page individually. You will also find the Drag & Drop Page Elements editor within the response Pro Page Options as well.</p>

<p>We tried to make Neuro Pro as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/neuropro/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Neuro Pro.</p>
")
	->section("Design")
		->open_outersection()
			->select($themeslug."_color_scheme", "Select a Skin Color", array( 'options' => array("black" => "Black (default)", "grey" => "Grey", "pink" => "Pink"), 'default' => 'black'))
		->close_outersection()
		->subsection("Typography")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Helvetica" => "Helvetica (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))			
		->subsection_end()
		->subsection("Background")
			->images($themeslug."_background_image", "Select a background", array( 'options' => array(  'blue' => TEMPLATE_URL . '/images/backgrounds/thumbs/blue.jpg', 'wood' => TEMPLATE_URL . '/images/backgrounds/thumbs/wood.jpg', 'neuro' => TEMPLATE_URL . '/images/backgrounds/thumbs/neurobg.png'), 'default' => 'wood'))
			->checkbox($themeslug."_custom_background", "Use a custom background")
			->color($themeslug."_background_color", "Custom Background Color")
			->upload($themeslug."_background_upload", "Background Image")
			->radio($themeslug."_bg_image_position", "Image Position", array( 'options' => array("top left" => "Left", "top center" => "Center", "top right" => "Right")))
			->radio($themeslug."_bg_image_repeat", "Image Repeat", array( 'options' => array( "repeat" => "Tile", "repeat-x" => "Tile Horizontally", "repeat-y" => "Tile Vertically", "no-repeat" => "No Tile")))
			->radio($themeslug."_bg_image_attachment", "Image Attachment", array( 'options' => array("scroll" => "Scroll", "fixed" => "Fixed")))
		->subsection_end()

		->subsection("Layout")
			->text($themeslug."_row_max_width", "Row Max Width", array('default' => '980px'))
		->subsection_end()
		->subsection("Custom Colors")
			->color($themeslug."_text_color", "Text Color")
			->color($themeslug."_sitetitle_color", "Site Title Color")
			->color($themeslug."_tagline_color", "Site Description Color")
		->subsection_end()
		->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Header Elements", array('options' => array("response_logo_icons" => "Logo + Icons", "response_banner" => "Banner", "response_custom_header_element" => "Custom"), 'default' => 'response_logo_icons'))
			->upload($themeslug."_banner", "Banner Image")
			->textarea($themeslug."_custom_header_element", "Custom HTML")
		->close_outersection()
			->subsection("Header Options")
			->checkbox($themeslug."_subheader", "Subheader")
			->checkbox($themeslug."_header_wrap", "Header Wrap")
			->checkbox($themeslug."_full_menu", "Full Width Menu" , array('default' => true))
			->checkbox($themeslug."_custom_logo", "Custom Logo" , array('default' => true))
			->upload($themeslug."_logo", "Logo", array('default' => array('url' => TEMPLATE_URL . '/images/neuropro.png')))
			->upload($themeslug."_favicon", "Custom Favicon")
		->subsection_end()
		->subsection("Social")
			->images($themeslug."_icon_style", "Icon set", array( 'options' => array('legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($themeslug."_email", "Email Address")
			->checkbox($themeslug."_hide_email", "Hide Email Icon")
			->text($themeslug."_rsslink", "RSS Icon URL")
			->checkbox($themeslug."_hide_rss_icon", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking and Scripts")
			->textarea($themeslug."_ga_code", "Google Analytics Code")
			->textarea($themeslug."_custom_header_scripts", "Custom Header Scripts")
		->subsection_end()
	->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Drag & Drop Blog Elements", array('options' => array("response_index" => "Post Page", "response_blog_slider" => "Feature Slider",  "response_callout_section" => "Callout Section"), "default" => 'response_blog_slider,response_index'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => '(More)…'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->select($themeslug."_featured_image_align", "Featured Image Alignment", array( 'options' => array("key1" => "Left", "key2" => "Center", "key3" => "Right")))
			->text($themeslug."_featured_image_height", "Featured Image Height", array('default' => '100'))
			->text($themeslug."_featured_image_width", "Featured Image Width", array('default' => '100'))	
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Feature Slider")
			->upload($themeslug."_blog_slide_one_image", "Slide One Image", array('default' => array('url' => TEMPLATE_URL . '/images/neurofreeslider.jpg')))
			->text($themeslug."_blog_slide_one_url", "Slide One Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_two_image", "Slide Two", array('default' => array('url' => TEMPLATE_URL . '/images/neurofreeslider.jpg')))
			->text($themeslug."_blog_slide_two_url", "Slide Two Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_three_image", "Slide Three", array('default' => array('url' => TEMPLATE_URL . '/images/neurofreeslider.jpg')))
			->text($themeslug."_blog_slide_three_url", "Slide Three Link", array('default' => 'http://cyberchimps.com'))
		->subsection_end()
		->subsection("Callout Options")
			->textarea($themeslug."_blog_callout_text", "Enter your Callout text")
		->subsection_end()
		->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_show_featured_images", "Featured Images")
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->subsection_end()
		->subsection("Search")
			->images($themeslug."_search_sidebar", "Sidebar Options", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($themeslug."_404_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->textarea($themeslug."_custom_404", "Custom 404 Content")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->text($themeslug."_footer_text", "Footer Copyright Text")
		->close_outersection()	
;
}