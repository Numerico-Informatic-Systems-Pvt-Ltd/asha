<?php
App::uses('AppModel', 'Model');
/**
 * Classification Model
 *
 */
class Classification extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	public $belongsTo = array(
        'Lacase' => array(
            'className' => 'Lacase',
            'foreignKey' => 'lacase_id',
            'conditions' => '',
            'order' => '',
            'limit' => '',
            'dependent' => ''
        )
    );
}
