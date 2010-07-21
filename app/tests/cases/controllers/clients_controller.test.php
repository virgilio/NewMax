<?php
/* Clients Test cases generated on: 2010-07-20 22:07:52 : 1279675912*/
App::import('Controller', 'Clients');

class TestClientsController extends ClientsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ClientsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.client', 'app.user', 'app.group', 'app.cronogram', 'app.visit', 'app.contact');

	function startTest() {
		$this->Clients =& new TestClientsController();
		$this->Clients->constructClasses();
	}

	function endTest() {
		unset($this->Clients);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>