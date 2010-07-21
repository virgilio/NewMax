<?php
/* Visit Test cases generated on: 2010-07-20 22:07:48 : 1279675908*/
App::import('Model', 'Visit');

class VisitTestCase extends CakeTestCase {
	var $fixtures = array('app.visit', 'app.cronogram', 'app.client', 'app.user', 'app.group', 'app.contact');

	function startTest() {
		$this->Visit =& ClassRegistry::init('Visit');
	}

	function endTest() {
		unset($this->Visit);
		ClassRegistry::flush();
	}

}
?>