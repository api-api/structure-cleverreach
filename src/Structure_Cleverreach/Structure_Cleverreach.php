<?php
/**
 * Structure_Cleverreach class
 *
 * @package APIAPI\Structure_Billomat
 * @since   1.0.0
 */

namespace APIAPI\Structure_Cleverreach;

use APIAPI\Core\Structures\Structure;
use APIAPI\Core\Request\Method;

if ( ! class_exists( 'APIAPI\Structure_Cleverreach\Structure_Cleverreach' ) ) {

	/**
	 * Structure implementation for Cleverreach.
	 *
	 * @since 1.0.0
	 */
	class Structure_Cleverreach extends Structure {
		/**
		 * Sets up the API structure.
		 * This method should populate the routes array, and can also be used to
		 * handle further initialization functionality, like setting the authenticator
		 * class and default authentication data.
		 *
		 * @since 1.0.0
		 */
		protected function setup() {
			$this->title         = 'Cleverreach API';

			$this->description   = 'Allows to access and manage the data in your Cleverreach account.';
			$this->base_uri      = 'https://rest.cleverreach.com/v2/';

			$this->authenticator = 'bearer';

			$this->routes['/login.json'] = array(
				'methods' => array(
					Method::POST  => array(
						'description'          => 'Get Token',
						'needs_authentication' => false,
						'request_data_type'    => 'json',
						'params'               => array(
							'client_id'        => array(
								'description' => 'Client ID for Cleverreach',
								'type'        => 'integer',
							),
							'login'        => array(
								'description' => 'Login for Cleverreach',
								'type'        => 'string',
							),
							'password'        => array(
								'description' => 'Password for Cleverreach',
								'type'        => 'string',
							)
						)
					)
				)
			);

			$this->routes['/clients.json'] = array(
				'methods' => array(
					Method::GET  => array(
						'description'          => 'Get Clients',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'params'               => array(
							'pagesize'        => array(
								'description' => 'Numbers of entries to show at one page',
								'type'        => 'integer',
							),
							'page'        => array(
								'description' => 'Page number to show',
								'type'        => 'integer',
							)
						)
					)
				)
			);

			$this->routes['/groups.json'] = array(
				'methods' => array(
					Method::GET  => array(
						'description'          => 'Get Groups',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'params'               => array(
							'order'        => array(
								'description' => 'Order by statement (created ASC oder DESC, changed ASC or DESC).',
								'type'        => 'string',
							)
						)
					),
					Method::POST  => array(
						'description'          => 'Adds a Group',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'params'               => array(
							'name'        => array(
								'description' => 'Name of the group',
								'type'        => 'string',
							)
						)
					)
				)
			);

			$this->routes['/groups.json/(?P<id>[\\d]+)'] = array(
				'methods' => array(
					Method::DELETE  => array(
						'description'          => 'Deletes a Group',
						'needs_authentication' => true
					)
				)
			);
		}
	}
}
