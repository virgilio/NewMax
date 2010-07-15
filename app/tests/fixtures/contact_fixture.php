<?php
/* Contact Fixture generated on: 2010-07-14 23:07:54 : 1279160454 */
class ContactFixture extends CakeTestFixture {
	var $name = 'Contact';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'funcao' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'telefone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'email' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
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
			'funcao' => 'Lorem ipsum dolor sit amet',
			'nome' => 'Lorem ipsum dolor sit amet',
			'telefone' => 'Lorem ipsum dolor ',
			'email' => '2010-07-14 23:20:54',
			'created' => '2010-07-14 23:20:54',
			'modified' => '2010-07-14 23:20:54'
		),
	);
}
?>