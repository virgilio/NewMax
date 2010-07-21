<?php
/* Contacts Test cases generated on: 2010-07-20 22:07:37 : 1279675897*/
App::import('Controller', 'Contacts');

class TestContactsController extends ContactsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ContactsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.contact', 'app.client', 'app.user', 'app.group', 'app.cronogram', 'app.visit');

	function startTest() {
		$this->Contacts =& new TestContactsController();
		$this->Contacts->constructClasses();
	}

	function endTest() {
		unset($this->Contacts);
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