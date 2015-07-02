<?php
App::uses('AppModel', 'Model');
/**
 * Land Model
 *
 * @property Office $Office
 * @property User $User
 * @property Lacase $Lacase
 * @property AcquisitionedArea $AcquisitionedArea
 * @property Estimate $Estimate
 * @property LandsOwner $LandsOwner
 * @property LandValue $LandValue
 * @property TransLandsOwner $TransLandsOwner
 */
class Land extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'office_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lacase_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rsplot_no' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('CheckUnique',array('rsplot_no','mouja')),
				'message' => 'Your input violates a unique key constraint, check your input and try again.'
			),			
		),
		
		# Composite Uniqueness
		
		'rsplot_no' => array(
                'checkUnique' => array(
                    'rule' => array('checkUnique', array('rsplot_no', 'lacase_id')),
                    'message' => 'This field need to be non-empty and the row need to be unique'
                ),
            ),
		'lacase_id' => array(
                'checkUnique' => array(
                    'rule' => array('checkUnique', array('lacase_id', 'rsplot_no')),
                    'message' => 'This field need to be 
										non-empty and the row need to be unique'
                ),
            ),
		
		# composite uniqueness ends
		
		
	);


	function checkUnique($data, $fields) {
		if (!is_array($fields)) {
				$fields = array($fields);
			}
			foreach($fields as $key) {
				$tmp[$key] = $this->data[$this->name][$key];
			}
		if (isset($this->data[$this->name][$this->primaryKey])
					 && $this->data[$this->name][$this->primaryKey] > 0) {
				$tmp[$this->primaryKey." !="] = $this->data[$this->name][$this->primaryKey];
			}
		//return false;
			return $this->isUnique($tmp, false); 
		}

	public function checkDuplicate($check) {
		// $check will have value: array('rsplot_no' => 'some-value')
        $existing_plot = $this->find('count', array(
            'conditions' => $check,
            'recursive' => -1
        ));
	/*	
		if($existing_plot >= 1)
			echo '<script>alert("Plot already in use.");</script>';
	*/		
	    return $existing_plot < 1 ;
    }
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
 
 
 	public $belongsTo = array(
		'Office' => array(
			'className' => 'Office',
			'foreignKey' => 'office_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Classification' => array(
		'className' => 'Classification',
		'foreignKey' => 'classification_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		)
	);
	
/** hasOne associations


*/

	public $hasOne = array(
		'PlotEstimate' => array(
			'className' => 'PlotEstimate',
			'foreignKey' => 'land_id',
			'conditions' => '',
			'dependent' => true,
			'fields' => '',
			'order' => ''
		)
	
	);
		
	
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AcquisitionedArea' => array(
			'className' => 'AcquisitionedArea',
			'foreignKey' => 'land_id',
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
		'Estimate' => array(
			'className' => 'Estimate',
			'foreignKey' => 'land_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'LandsOwner' => array(
			'className' => 'LandsOwner',
			'foreignKey' => 'land_id',
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
		'LandValue' => array(
			'className' => 'LandValue',
			'foreignKey' => 'land_id',
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
		'TransLandOwner' => array(
			'className' => 'TransLandOwner',
			'foreignKey' => 'land_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
