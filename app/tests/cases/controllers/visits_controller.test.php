<?php
/* Visits Test cases generated on: 2010-07-20 22:07:48 : 1279675908*/
App::import('Controller', 'Visits');

class TestVisitsController extends VisitsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class VisitsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.visit', 'app.cronogram', 'app.client', 'app.user', 'app.group', 'app.contact');

	function startTest() {
		$this->Visits =& new TestVisitsController();
		$this->Visits->constructClasses();
	}

	function endTest() {
		unset($this->Visits);
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