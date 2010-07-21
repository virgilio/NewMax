<?php
/* Cronogram Test cases generated on: 2010-07-20 22:07:25 : 1279675885*/
App::import('Model', 'Cronogram');

class CronogramTestCase extends CakeTestCase {
	var $fixtures = array('app.cronogram', 'app.client', 'app.user', 'app.group', 'app.visit', 'app.contact');

	function startTest() {
		$this->Cronogram =& ClassRegistry::init('Cronogram');
	}

	function endTest() {
		unset($this->Cronogram);
		ClassRegistry::flush();
	}

}
?>