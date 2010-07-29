<?php
class M4c5117387bd041fc98331f55d87f7e0c extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			      'create_field' => array(
						      'visits' => array (
									 'contact_id' => array('type' => 'integer', 'null' =>  false, 'default' => 1),
									 'real_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
									 'status' => array('type' => 'smallint', 'lenght' => 4, 'default' => 0)
									 ),
						      'contacts' => array(
									  'user_id' => array('type' => 'integer', 'null' =>  false, 'default' => 1),
									  'frequency' => array('type' => 'integer', 'null' =>  false, 'default' => 28),
									  'active' => array('type' => 'tinyint', 'lenght' => 1, 'null' =>  true, 'default' => 0),
									  )
						      ),
			      'drop_field' => array(
						    'visits' => array (
								       'cronogram_id', 'client_id', 'user_id', 'done'
									 
									 )
						    )
			      
		),
		'down' => array(
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
?>