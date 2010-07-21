<?php
/* Cronogram Fixture generated on: 2010-07-20 22:07:25 : 1279675885 */
class CronogramFixture extends CakeTestFixture {
	var $name = 'Cronogram';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'start' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'frequency' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'period' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'client_id' => 1,
			'user_id' => 1,
			'start' => '2010-07-20',
			'frequency' => 1,
			'period' => 1,
			'active' => 1,
			'created' => '2010-07-20 22:31:25',
			'modified' => '2010-07-20 22:31:25'
		),
	);
}
?>