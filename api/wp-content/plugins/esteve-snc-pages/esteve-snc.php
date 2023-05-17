<?php
/*
Plugin Name: Esteve SNC pages
Plugin URI: https://commonpeoplei.com/
Description: <strong>IMPORTANTE: ESTE PLUGIN PROVEE FUNCIONALIDAD IMPORTANTE PARA EL FUNCIONAMIENTO DE LA API, POR FAVOR, NO DESINSTALAR.</strong> Este plugin require tener instalado Advanced Custom Fields previamente para poder funcionar.
Version: 1.0.0
Author: fitodac
Author URI: https://fitodac.com/
*/


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'		=> 'Página de inicio',
		'menu_title'		=> 'ESTEVE SNC',
		'menu_slug'		 	=> 'page-home-settings',
		'capability'		=> 'edit_posts',
		'position' 			=> 6,
		'icon_url' 			=> 'dashicons-admin-page',
		'redirect'			=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title'		=> 'Depresión y Ansiedad',
		'menu_title'		=> 'Depresión y Ansiedad',
		'parent_slug'		=> 'page-home-settings',
		'menu_slug'			=> 'page-depresion-ansiedad'
	));
	
	acf_add_options_sub_page(array(
		'page_title'		=> 'Enfermedad de Alzheimer y Demencia',
		'menu_title'		=> 'Alzheimer y Demencia',
		'parent_slug'		=> 'page-home-settings',
		'menu_slug'			=> 'page-alzheimer-demencia'
	));

	acf_add_options_sub_page(array(
		'page_title'		=> 'Para pacientes',
		'menu_title'		=> 'Para pacientes',
		'parent_slug'		=> 'page-home-settings',
		'menu_slug'			=> 'page-pacientes'
	));

	acf_add_options_sub_page(array(
		'page_title'		=> 'Para ponentes',
		'menu_title'		=> 'Para ponentes',
		'parent_slug'		=> 'page-home-settings',
		'menu_slug'			=> 'page-ponentes'
	));

}



add_action("rest_api_init", function(){
	// Home
	register_rest_route("wp/v2/options", "home", [ "methods" => "GET", "callback" => "getOptionsPage_Home" ]);
	// Depresión y Ansiedad
	register_rest_route("wp/v2/options", "depresion-ansiedad", [ "methods" => "GET", "callback" => "getOptionsPage_DepresionAnsiedad" ]);
	// Enfermedad de Alzheimer y Demencia
	register_rest_route("wp/v2/options", "alzheimer-demencia", [ "methods" => "GET", "callback" => "getOptionsPage_AlzheimerDemencia" ]);
	// Para pacientes
	register_rest_route("wp/v2/options", "pacientes", [ "methods" => "GET", "callback" => "getOptionsPage_Pacientes" ]);
	// Para ponentes
	register_rest_route("wp/v2/options", "ponentes", [ "methods" => "GET", "callback" => "getOptionsPage_Ponentes" ]);
});


// Home
function getOptionsPage_Home(){
	$resp = [];
	for($i = 1; $i < 3; $i++) $resp["posts_row_$i"] = get_field("posts_row_$i", 'options');
	return $resp;
}

// Depresión y Ansiedad
function getOptionsPage_DepresionAnsiedad(){
	$resp = [];
	for($i = 3; $i < 7; $i++) $resp["posts_row_$i"] = get_field("posts_row_$i", 'options');
	return $resp;
}

// Alzheimer y Demencia
function getOptionsPage_AlzheimerDemencia(){
	$resp = [];
	for($i = 7; $i < 13; $i++) $resp["posts_row_$i"] = get_field("posts_row_$i", 'options');
	return $resp;
}

// Para pacientes
function getOptionsPage_Pacientes(){
	$resp = [];
	for($i = 13; $i < 16; $i++) $resp["posts_row_$i"] = get_field("posts_row_$i", 'options');
	return $resp;
}

// Para ponentes
function getOptionsPage_Ponentes(){
	$resp = [];
	for($i = 16; $i < 21; $i++) $resp["posts_row_$i"] = get_field("posts_row_$i", 'options');
	return $resp;
}