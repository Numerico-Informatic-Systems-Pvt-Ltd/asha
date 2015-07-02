<?php
App::uses('Office', 'Model');

/**
 * Office Test Case
 *
 */
class OfficeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office',
		'app.lacase',
		'app.user',
		'app.land',
		'app.acquisitioned_areas',
		'app.land_value',
		'app.acquisitioned_area',
		'app.estimate',
		'app.land_owner',
		'app.owner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Office = ClassRegistry::init('Office');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Office);

		parent::tearDown();
	}

}
