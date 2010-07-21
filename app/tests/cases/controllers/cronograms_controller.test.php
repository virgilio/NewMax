<?php
/* Cronograms Test cases generated on: 2010-07-20 22:07:25 : 1279675885*/
App::import('Controller', 'Cronograms');

class TestCronogramsController extends CronogramsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CronogramsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.cronogram', 'app.client', 'app.user', 'app.group', 'app.visit', 'app.contact');

	function startTest() {
		$this->Cronograms =& new TestCronogramsController();
		$this->Cronograms->constructClasses();
	}

	function endTest() {
		unset($this->Cronograms);
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