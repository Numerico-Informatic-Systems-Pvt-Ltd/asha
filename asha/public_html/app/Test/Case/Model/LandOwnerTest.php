<?php
App::uses('LandOwner', 'Model');

/**
 * LandOwner Test Case
 *
 */
class LandOwnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.land_owner',
		'app.user',
		'app.owner',
		'app.land'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LandOwner = ClassRegistry::init('LandOwner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LandOwner);

		parent::tearDown();
	}

}
