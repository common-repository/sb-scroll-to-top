<?php
/*
Plugin Name: SB Scroll to Top
Plugin URL: Plugin URI: http://wordpress.org/plugins/SB-Scroll-to-Top
Description: This a simple scroll to top pluguin. Anyone can use it easily. 
Author: Shathi Begum
Author URI:sb-tp.blogstopt.com
Version: 1.0
*/

function sb_scrll_to_top_scripts(){
	wp_enqueue_script( 'sb-scroll-to-top-js', plugins_url( '/js/sb-scroll-custom.js', __FILE__ ), array('jquery'), 1.0, false);
    wp_enqueue_style( 'sb-scroll-to-top-style', plugins_url( '/css/sb-scroll-custom.css', __FILE__ ));
	wp_enqueue_style( 'sb-font-awesome', plugins_url( '/css/font-awesome.min.css', __FILE__ ));
}
add_action('wp_enqueue_scripts','sb_scrll_to_top_scripts' ); 
add_action('admin_init','sb_scrll_to_top_scripts' );


function sb_scroll_to_top_text(){
	echo '<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>';
	
}
add_action('wp_footer', 'sb_scroll_to_top_text'); 

function sb_scroll_to_top_customize($a){

	$a->add_section('color_section', array(
		'title' => 'SB Scroll Color Section',
		'priority' => 10
	));
	
	$a->add_setting('bacgrounds_color', array(
		'default' => '#000000',
		'transport' => 'refresh'
	));
	$a->add_control(
	new WP_Customize_color_control($a, 'bacgrounds_color', array(
		'section' => 'color_section',
		'label' => 'SB scroll background color',
		'settings' => 'bacgrounds_color'
	))
	);
	$a->add_setting('bacgrounds_hover_color', array(
		'default' => '#dd3333',
		'transport' => 'refresh'
	));
	$a->add_control(
	new WP_Customize_color_control($a, 'bacgrounds_hover_color', array(
		'section' => 'color_section',
		'label' => 'SB scroll background hover color',
		'settings' => 'bacgrounds_hover_color'
	))
	);

}
add_action('customize_register', 'sb_scroll_to_top_customize'); 


function sb_scroll_to_top_customizer_script(){
	wp_enqueue_script('custom-js', get_template_directory_uri().'/js/sb-scroll-customscript.js', array('jquery', 'customize-preview')); 
}
add_action('customize_preview_init', 'sb_scroll_to_top_customizer_script');

function custom_style(){?>
	<style>
	#myBtn {
	 
	  background-color: <?php echo get_theme_mod('bacgrounds_color'); ?>
	}

	#myBtn:hover {
	  background-color: <?php echo get_theme_mod('bacgrounds_hover_color'); ?>
	}
	</style>
<?php

}
add_action('wp_head','custom_style');

function sb_scroll_to_top_menu(){
add_menu_page( 'SB scroll to top', 'SB scroll to top', 'manage_options', 'sb-toscroll-option', 'sb_scroll_to_top_options', 'dashicons-chart-pie',19);
}
add_action('admin_menu','sb_scroll_to_top_menu');

function sb_scroll_to_top_options(){
	echo '<h1> SB Scroll TO top Options</h1>
			<p>To change color of the scroll box go to <strong>Appearance->Customize->SB Scroll Color Section </strong>from left side of dashboard.</p>
	';
}















