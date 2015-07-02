<?php
App::uses('LandValue', 'Model');

/**
 * LandValue Test Case
 *
 */
class LandValueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.land_value',
		'app.user',
		'app.land'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LandValue = ClassRegistry::init('LandValue');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LandValue);

		parent::tearDown();
	}

}
