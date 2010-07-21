<?php
/* Contact Fixture generated on: 2010-07-20 22:07:36 : 1279675896 */
class ContactFixture extends CakeTestFixture {
	var $name = 'Contact';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'funcao' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'phone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'client_id' => 1,
			'funcao' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor ',
			'email' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-07-20 22:31:36',
			'modified' => '2010-07-20 22:31:36'
		),
	);
}
?>