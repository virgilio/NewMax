<?php
/* Clients Test cases generated on: 2010-07-16 18:07:37 : 1279315057*/
App::import('Controller', 'Clients');

class TestClientsController extends ClientsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ClientsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.client', 'app.calendar', 'app.user', 'app.group', 'app.contact');

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