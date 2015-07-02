<?php
/**
 * LacaseFixture
 *
 */
class LacaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'office_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'la_case_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'project' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year_of_lacase' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'possession_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'publication_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'period_of_interest_from' => array('type' => 'date', 'null' => false, 'default' => null),
		'period_of_interest_to' => array('type' => 'date', 'null' => false, 'default' => null),
		'period_of_requisition_from' => array('type' => 'date', 'null' => false, 'default' => null),
		'period_of_requisition_to' => array('type' => 'date', 'null' => false, 'default' => null),
		'act' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mouza' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'police_station' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'jl_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'district' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'charset' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'la_case_number' => array('column' => 'la_case_number', 'unique' => 1)
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
			'la_case_number' => 'Lorem ipsum dolor sit amet',
			'project' => 'Lorem ipsum dolor sit amet',
			'year_of_lacase' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'possession_date' => '2013-10-17',
			'publication_date' => '2013-10-17',
			'period_of_interest_from' => '2013-10-17',
			'period_of_interest_to' => '2013-10-17',
			'period_of_requisition_from' => '2013-10-17',
			'period_of_requisition_to' => '2013-10-17',
			'act' => 'Lorem ipsum dolor sit amet',
			'mouza' => 'Lorem ipsum dolor sit amet',
			'police_station' => 'Lorem ipsum dolor sit amet',
			'jl_number' => 'Lorem ipsum dolor sit amet',
			'district' => 'Lorem ipsum dolor sit amet',
			'charset' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-10-17 10:17:30',
			'modified' => '2013-10-17 10:17:30',
			'active' => 1
		),
	);

}
