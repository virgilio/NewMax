<?php
/* Calendars Test cases generated on: 2010-07-15 00:07:28 : 1279162828*/
App::import('Controller', 'Calendars');

class TestCalendarsController extends CalendarsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CalendarsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.calendar', 'app.client', 'app.contact', 'app.user', 'app.group');

	function startTest() {
		$this->Calendars =& new TestCalendarsController();
		$this->Calendars->constructClasses();
	}

	function endTest() {
		unset($this->Calendars);
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