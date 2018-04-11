<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class IdentificationsTests extends Cleverreach_TestCase {
	public function testGetClients() {
		$request = $this->apiapi->get_request_object( 'cleverreach', '/clients.json' );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}
}