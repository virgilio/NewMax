<?php
/* Client Test cases generated on: 2010-07-20 22:07:16 : 1279675876*/
App::import('Model', 'Client');

class ClientTestCase extends CakeTestCase {
	var $fixtures = array('app.client', 'app.user', 'app.group', 'app.cronogram', 'app.visit', 'app.contact');

	function startTest() {
		$this->Client =& ClassRegistry::init('Client');
	}

	function endTest() {
		unset($this->Client);
		ClassRegistry::flush();
	}

}
?>