<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '512850268856157',
            'client_secret' => 'efe20191ed0796649d07bc9a7178c3cd',
            'scope'         => array('email','read_friendlists','user_online_presence','user_location'),
        ),

        /**
         * Google
         */
        'Google' => array(
            'client_id'     => '873659744801-12vaoihd28buecbm0uo937e4p7tkt5dl.apps.googleusercontent.com',
            'client_secret' => 'X9isy50cmi1QQk3d3wDQ-10m',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),	

	)

);