<?php
App::uses('Estimate', 'Model');

/**
 * Estimate Test Case
 *
 */
class EstimateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estimate',
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
		$this->Estimate = ClassRegistry::init('Estimate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estimate);

		parent::tearDown();
	}

}
