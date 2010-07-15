<?php
/* Calendar Test cases generated on: 2010-07-14 23:07:08 : 1279160768*/
App::import('Model', 'Calendar');

class CalendarTestCase extends CakeTestCase {
	var $fixtures = array('app.calendar', 'app.client', 'app.contact', 'app.user', 'app.group');

	function startTest() {
		$this->Calendar =& ClassRegistry::init('Calendar');
	}

	function endTest() {
		unset($this->Calendar);
		ClassRegistry::flush();
	}

}
?>