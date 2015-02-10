<?php

return array(

	"base_url"		=>URL::route('fblogin', array('action' => 'auth')),
	"providers"		=>array(

		"Facebook" => array( 
           "enabled" => true,
           "keys"    => array( "id" => "1771027263122867", "secret" => "fb3507d4b58120b13fba1dc43fa5a204" ), 
           "scope"   => "email", // optional
           "display" => "popup" // optional

    	 )

		)

	);

// return [
//     'app_name'          => 'kampuzz', //Can be anything
//     'client_id'         => '243543030692-gmlu5eb6bj8h1aj17ldobth3sth2lq5q.apps.googleusercontent.com',//can be found on the credentials page
//     'client_secret'     => 'X0Vp9agXnYWka_xVx-Qc9HbG',//on the credentials page
//     'api_key'           => 'AIzaSyADoSPYlaJ2wVmbPCrhnpD2dbgpNenfejU'//can be found at the bottom of your credentials page
// ];
