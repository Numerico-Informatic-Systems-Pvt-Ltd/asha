<?php
App::uses('ChainDeed', 'Model');

/**
 * ChainDeed Test Case
 *
 */
class ChainDeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chain_deed',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChainDeed = ClassRegistry::init('ChainDeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChainDeed);

		parent::tearDown();
	}

}
