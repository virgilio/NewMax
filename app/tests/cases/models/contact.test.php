<?php
/* Contact Test cases generated on: 2010-07-20 22:07:36 : 1279675896*/
App::import('Model', 'Contact');

class ContactTestCase extends CakeTestCase {
	var $fixtures = array('app.contact', 'app.client', 'app.user', 'app.group', 'app.cronogram', 'app.visit');

	function startTest() {
		$this->Contact =& ClassRegistry::init('Contact');
	}

	function endTest() {
		unset($this->Contact);
		ClassRegistry::flush();
	}

}
?>