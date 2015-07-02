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
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'ASHA: LAND Acquisition Compensation Management Systems - ACT - II of 1948');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<?php
		if(!isset($title_for_layout)):
		echo $this->set('title_for_layout',"ASHA - Land Acquisition Compensation Management Systems - DM, East Medinipore");
		else:
		echo $this->set('title_for_layout',$title_for_layout. 
								"ASHA - Land Acquisition Compensation Management Systems - DM, East Medinipore");
		
		endif;
		
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('/usermgmt/css/umstyle');
		echo $this->Html->script('jquery-1.10.1.min');
		echo $this->Html->script('popup-script');
		echo $this->Html->script('nis');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <title>	
    	<?php echo $title_for_layout; ?>
    </title>
</head>
<body>
	<div id="container">
		<div id="header">
        <p class="AppName">ASHA - Version 1.4.0 [BETA]</b>
        	 <?php
				if($this->Session->read('UserAuth.User.user_group_id') == 1):
					echo $this->element('admin_menu');
				endif;	
        		
            ?>
			<!--<h1><?php /*?><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?><?php */?>
           
            </h1>-->
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
<!--		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('nis.power.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.nisbusiness.com/',
					array('target' => '_blank', 'escape' => false)
				);
			echo '<p class="feebleText">
					Licensed to use in the Office of the District Magistrate & Collector, East Midnapore.
					<br />
					Developed by: Numerico Informatic Systems Pvt Ltd. Phone: 033-65627421 Mobile: +91 84200 - 80823 Support: support@nisbusiness.com
				  </p>';
    ?>
	
	</div>
-->	
</div>
     <?php echo $this->Js->writeBuffer(); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>