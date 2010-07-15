<?php
/* Visit Test cases generated on: 2010-07-14 23:07:12 : 1279162512*/
App::import('Model', 'Visit');

class VisitTestCase extends CakeTestCase {
	var $fixtures = array('app.visit', 'app.client', 'app.calendar', 'app.user', 'app.group', 'app.contact');

	function startTest() {
		$this->Visit =& ClassRegistry::init('Visit');
	}

	function endTest() {
		unset($this->Visit);
		ClassRegistry::flush();
	}

}
?>