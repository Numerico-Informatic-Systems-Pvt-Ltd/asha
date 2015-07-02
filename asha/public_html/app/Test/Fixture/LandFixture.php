<?php
/**
 * LandFixture
 *
 */
class LandFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'office_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'lacase_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'sl_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rsplot_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'comment' => 'part/full', 'charset' => 'latin1'),
		'portion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'comment' => 'N/S/E/W/NE/NW/SE/SW', 'charset' => 'latin1'),
		'khatian_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mouja' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'jl_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dag_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'police_station' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'acquisitioned_areas_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'land_value_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'charset' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'office_id' => 1,
			'user_id' => 1,
			'lacase_id' => 1,
			'sl_no' => 'Lorem ipsum dolor sit amet',
			'rsplot_no' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor ',
			'portion' => 'Lorem ipsum dolor ',
			'khatian_no' => 'Lorem ipsum dolor sit amet',
			'mouja' => 'Lorem ipsum dolor sit amet',
			'jl_no' => 'Lorem ipsum dolor sit amet',
			'dag_no' => 'Lorem ipsum dolor sit amet',
			'police_station' => 'Lorem ipsum dolor sit amet',
			'acquisitioned_areas_id' => 1,
			'land_value_id' => 1,
			'charset' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-10-17 10:17:56',
			'modified' => '2013-10-17 10:17:56',
			'active' => 1
		),
	);

}
