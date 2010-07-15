<?php
/* Contact Test cases generated on: 2010-07-14 23:07:54 : 1279160454*/
App::import('Model', 'Contact');

class ContactTestCase extends CakeTestCase {
	var $fixtures = array('app.contact', 'app.client', 'app.calendar', 'app.user', 'app.group');

	function startTest() {
		$this->Contact =& ClassRegistry::init('Contact');
	}

	function endTest() {
		unset($this->Contact);
		ClassRegistry::flush();
	}

}
?>