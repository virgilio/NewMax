<?php
/* Calendar Fixture generated on: 2010-07-14 23:07:08 : 1279160768 */
class CalendarFixture extends CakeTestFixture {
	var $name = 'Calendar';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'inicio' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'peridiocidade' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'periodo' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'ativo' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
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
			'inicio' => '2010-07-14',
			'peridiocidade' => '2010-07-14',
			'periodo' => '2010-07-14',
			'ativo' => 1,
			'created' => '2010-07-14 23:26:08',
			'modified' => '2010-07-14 23:26:08'
		),
	);
}
?>