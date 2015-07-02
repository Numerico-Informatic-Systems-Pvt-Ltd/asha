<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Dashboard'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Admin Panel",true),"/admin_panel") ?></span>	
                
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?>&nbsp; | &nbsp;</span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid">
				<div class="um_box_mid_content_mid_left" style="text-align:justify;">
                	                	<br />
					Hello <?php echo h($user['User']['first_name']).' '.h($user['User']['last_name']); ?>
					<br /><br />Welcome to ASHS - Land Acquisition Compensation Management Systems Software.<br />
                    <br />You are now at your administrative dashboard and you can edit your account settings. Users with enogh privilege may also add new users, grant / revoke permissions to various functions of this software. It is strongly recommended not to use a feature in this page unless you know what you are doing. Other operations of the system may fail.
                    </p>
                    <p>
                    	We hope you have a nice experience using this software. Please let us know if you have any difficulty in operation. Please refer to user manual to resolve any operational guidelines.
                    </p>
                    <p>
                    Thanks,<br />
                    Numerico&trade; Informatic Systems Private Ltd.
                    </p>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>