<?php
App::uses('Owner', 'Model');

/**
 * Owner Test Case
 *
 */
class OwnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.owner',
		'app.user',
		'app.land',
		'app.office',
		'app.lacase',
		'app.acquisitioned_areas',
		'app.land_value',
		'app.acquisitioned_area',
		'app.estimate',
		'app.land_owner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Owner = ClassRegistry::init('Owner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Owner);

		parent::tearDown();
	}

}
