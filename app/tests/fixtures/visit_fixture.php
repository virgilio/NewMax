<?php
/* Visit Fixture generated on: 2010-07-20 22:07:48 : 1279675908 */
class VisitFixture extends CakeTestFixture {
	var $name = 'Visit';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cronogram_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'done' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'report' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'cronogram_id' => 1,
			'client_id' => 1,
			'user_id' => 1,
			'date' => '2010-07-20',
			'done' => 1,
			'report' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-07-20 22:31:48',
			'modified' => '2010-07-20 22:31:48'
		),
	);
}
?>