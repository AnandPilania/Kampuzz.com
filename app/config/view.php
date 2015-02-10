<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| View Storage Paths
	|--------------------------------------------------------------------------
	|
	| Most templating systems load templates from disk. Here you may specify
	| an array of paths that should be checked for your views. Of course
	| the usual Laravel view path has already been registered for you.
	|
	*/

	'paths' => array(__DIR__.'/../views'),

	/*
	|--------------------------------------------------------------------------
	| Pagination View
	|--------------------------------------------------------------------------
	|
	| This view will be used to render the pagination link output, and can
	| be easily customized here to show any view you like. A clean view
	| compatible with Twitter's Bootstrap is given to you by default.
	|
	*/

	'pagination' => 'pagination::slider-3',
	'results_per_page' => 20,
	'path_college_logo' => '/images/logo',
	'path_college_logo_abroad' => '/images/logo_univ',
	'path_college_images' => '/images/college_images',
	'path_college_images_abroad' => '/images/images_univ',
	'path_uploads' => '/images/uploads',
	'path_files' => '/files',

);
