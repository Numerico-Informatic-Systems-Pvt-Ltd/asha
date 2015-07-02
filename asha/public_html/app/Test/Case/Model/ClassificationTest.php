<?php
App::uses('Classification', 'Model');

/**
 * Classification Test Case
 *
 */
class ClassificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.classification'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Classification = ClassRegistry::init('Classification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Classification);

		parent::tearDown();
	}

}
