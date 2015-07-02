<?php
App::uses('Lacase', 'Model');

/**
 * Lacase Test Case
 *
 */
class LacaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lacase',
		'app.office',
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
		$this->Lacase = ClassRegistry::init('Lacase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lacase);

		parent::tearDown();
	}

}
