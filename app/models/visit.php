<?php
class Visit extends AppModel {
    var $name = 'Visit';
    var $validate = array(
            'date' => array(
                            'date' => array(
                                            'rule' => array('date'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
                            'real_date' => array(
                                            'rule' => array('date'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
            ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
            'Contact' => array(
                            'className' => 'Contact',
                            'foreignKey' => 'contact_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );
}
?>