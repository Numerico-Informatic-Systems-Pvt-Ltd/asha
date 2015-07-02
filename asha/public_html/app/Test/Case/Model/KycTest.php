<?php
App::uses('Kyc', 'Model');

/**
 * Kyc Test Case
 *
 */
class KycTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.kyc',
		'app.owner',
		'app.user',
		'app.lacase',
		'app.office',
		'app.land',
		'app.classification',
		'app.acquisitioned_area',
		'app.estimate',
		'app.lands_owner',
		'app.land_value',
		'app.trans_land_owner',
		'app.trans_land',
		'app.voter_number'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Kyc = ClassRegistry::init('Kyc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Kyc);

		parent::tearDown();
	}

}
