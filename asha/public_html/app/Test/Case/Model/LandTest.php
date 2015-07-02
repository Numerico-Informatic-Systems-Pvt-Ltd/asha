<?php
App::uses('Land', 'Model');

/**
 * Land Test Case
 *
 */
class LandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.land',
		'app.office',
		'app.user',
		'app.lacase',
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
		$this->Land = ClassRegistry::init('Land');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Land);

		parent::tearDown();
	}

}
