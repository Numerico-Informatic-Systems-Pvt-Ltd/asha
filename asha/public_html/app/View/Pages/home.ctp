<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Debugger', 'Utility');
?>
<h2>
<?php 
	echo $this->Html->css('home.style');
?>	
<div id="HomePageBg">
&nbsp;
<?php
	echo $this->set('title_for_layout',
		"ASHA - Land Acquisition Compensation Management Systems - DM, East Medinipore");
		
	echo $this->Html->link('LOGIN',array(
						'plugin' => 'usermgmt',
						'controller'=>'users',
						'action' => 'login'
						),
						array('id'=>'homeLoginLink'));
?>
</div>