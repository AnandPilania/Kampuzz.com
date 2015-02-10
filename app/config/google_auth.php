<?php

return array(

	"base_url"		=>URL::route('glogin', array('action' => 'auth')),
	"providers"		=>array(

		"Google"	=>array(

			"enabled"=>true,
			"keys"   => array("id"=>"243543030692-gmlu5eb6bj8h1aj17ldobth3sth2lq5q.apps.googleusercontent.com",
							  "secret"=>"X0Vp9agXnYWka_xVx-Qc9HbG"
						),
			"scope"  =>"https://www.googleapis.com/auth/userinfo.email"
			)

		)

	);

// return [
//     'app_name'          => 'kampuzz', //Can be anything
//     'client_id'         => '243543030692-gmlu5eb6bj8h1aj17ldobth3sth2lq5q.apps.googleusercontent.com',//can be found on the credentials page
//     'client_secret'     => 'X0Vp9agXnYWka_xVx-Qc9HbG',//on the credentials page
//     'api_key'           => 'AIzaSyADoSPYlaJ2wVmbPCrhnpD2dbgpNenfejU'//can be found at the bottom of your credentials page
// ];
