<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class IdentificationsTests extends Cleverreach_TestCase {
	public function testLogin() {
		$request = $this->apiapi->get_request_object( 'cleverreach', '/login.json', 'POST' );
		$request->set_param('client_id', getenv( 'CLEVERREACH_CLIENT_ID') );
		$request->set_param('login', getenv( 'CLEVERREACH_LOGIN') );
		$request->set_param('password', getenv( 'CLEVERREACH_PASSWORD') );

		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testGetClients() {
		$request = $this->apiapi->get_request_object( 'cleverreach', '/clients.json' );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testGetGroups() {
		$request = $this->apiapi->get_request_object( 'cleverreach', '/groups.json' );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testAddDeleteGroup() {
		$request = $this->apiapi->get_request_object( 'cleverreach', '/groups.json', 'POST' );
		$request->set_param( 'name', 'Testgroup');
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );

		$group_id = $response->get_param('id');
		$request = $this->apiapi->get_request_object( 'cleverreach', '/groups.json/(?P<id>[\\d]+)', 'DELETE' );
		$request->set_param( 'id', $group_id );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}
}