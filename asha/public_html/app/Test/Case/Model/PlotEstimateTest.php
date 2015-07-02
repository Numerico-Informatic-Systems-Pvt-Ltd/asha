<?php
App::uses('PlotEstimate', 'Model');

/**
 * PlotEstimate Test Case
 *
 */
class PlotEstimateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plot_estimate',
		'app.user',
		'app.land',
		'app.office',
		'app.lacase',
		'app.trans_land',
		'app.classification',
		'app.acquisitioned_area',
		'app.estimate',
		'app.land_owner',
		'app.owner',
		'app.land_value',
		'app.trans_land_owner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlotEstimate = ClassRegistry::init('PlotEstimate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlotEstimate);

		parent::tearDown();
	}

}
