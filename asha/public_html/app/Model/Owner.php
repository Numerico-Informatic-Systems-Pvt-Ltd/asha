<?php
App::uses('AppModel', 'Model');
/**
 * Owner Model
 *
 * @property User $User
 * @property Land $Land
 */
class Owner extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Lacase' => array(
			'className' => 'Lacase',
			'foreignKey' => 'lacase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
	
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Land' => array(
			'className' => 'Land',
			'joinTable' => 'lands_owners',
			'foreignKey' => 'owner_id',
			'associationForeignKey' => 'land_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	public $hasMany = array(
		'Estimate' => array(
			'className' => 'Estimate',
			'foreignKey' => 'owner_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		'Kyc' => array(
			'className' => 'Kyc',
			'foreignKey' => 'owner_id',
			'dependent' => false
		)

	);

}