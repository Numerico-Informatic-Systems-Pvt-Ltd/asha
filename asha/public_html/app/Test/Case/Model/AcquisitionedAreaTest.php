<?php
App::uses('AcquisitionedArea', 'Model');

/**
 * AcquisitionedArea Test Case
 *
 */
class AcquisitionedAreaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acquisitioned_area',
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
		$this->AcquisitionedArea = ClassRegistry::init('AcquisitionedArea');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcquisitionedArea);

		parent::tearDown();
	}

}
