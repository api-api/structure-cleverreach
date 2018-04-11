<?php

class Cleverreach_TestCase extends Structure_TestCase {
	/**
	 * @var \APIAPI\Core\APIAPI
	 */
	protected $apiapi;

	/**
	 * @var \APIAPI\Structure_Cleverreach\Structure_Cleverreach
	 */
	protected $api;

	protected function setUp() {

		$token = getenv( 'CLEVERREACH_TOKEN' );

		$config = array(
			'transporter'            => 'curl',
			'cleverreach'                => array(
				'authentication_data' => array(
					'token'   => $token
				)
			)
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}