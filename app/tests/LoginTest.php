<?php

class LoginTest extends TestCase {

	public function setUp()
	{
		parent::setUp();
		Session::start();

    // Enable filters
		Route::enableFilters();
	}  

	public function testAuthenticationWithAdminUser() {
		Auth::attempt(array('email' => 'admin', 'password' => 'qwerty'));
		$this->assertTrue(Auth::check());
	}

	public function testAuthenticationWithFalseCredentials() {
		Auth::attempt(array('email' => 'dklasjdask', 'password' => 'czxdfas'));
		$this->assertFalse(Auth::check());
	}

	public function testAuthenticationWithNoCredentials() {
		Auth::attempt(array('email' => '', 'password' => ''));
		$this->assertFalse(Auth::check());
	}

	public function testAuthenticationWithNoCredentialsAndReturnToLoginpage() {
		Auth::attempt(array('email' => '', 'password' => ''));
		$this->assertFalse(Auth::check());
	}

	public function testLoginThroughLoginPage()
	{
	// provide post input
		$credentials = array(
			'email'=>'admin',
			'password'=>'qwerty',
			);

		$response = $this->action('POST', 'SessionsController@store', null, $credentials); 

		// if success user should be redirected to homepage
		$this->assertRedirectedTo('/dashboard');
	}

	public function testLoginFailsWithFalseCredentials()
	{
		// provide post input
		$credentials = array(
			'email'=>'abckdlasæda',
			'password'=>'ofpdksdfops',
			);

		$response = $this->action('POST', 'SessionsController@store', null, $credentials); 

		// if success user should be redirected to homepage
		$this->assertRedirectedTo('/sessions/create');
	}

	public function testLoginFailsWithNoCredentials()
	{
		// provide post input
		$credentials = array(
			'email'=>'',
			'password'=>'',
			);

		$response = $this->action('POST', 'SessionsController@store', null, $credentials); 

		// if success user should be redirected to homepage
		$this->assertRedirectedTo('/sessions/create');
	}

	public function accessDashboardWithoutValidCredentials()
	{
		$this->call('GET', 'dashboard');
		$this->assertResponseOk();

	}
}

