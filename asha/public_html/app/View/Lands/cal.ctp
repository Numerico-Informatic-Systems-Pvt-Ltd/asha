<script>

function st(str)
	{
			
		document.getElementById(str).value='';
		
		}

function isNumberKey(evt) {
	
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
  return true;
}
function cal()
{
	
	var i=0;
	
	while(document.getElementById('Land'+i+'Ana'))
	{	
	var x1=document.getElementById('Land'+i+'Ana').value*625;
	
	var x2=document.getElementById('Land'+i+'Ganda').value*31.25;
	var x3=document.getElementById('Land'+i+'Kra').value*7.81;
	var x4=document.getElementById('Land'+i+'Krati').value*2.60;
	var x5=document.getElementById('Land'+i+'Til').value*0.13;
	var sum=x1+x2+x3+x4+x5;
	document.getElementById('Land'+i+'Total').value=sum.toFixed(3);
i++;
	}
	
	
}


</script>



<div class="landsform">
<?php if(!isset($la)): ?>
<?php echo $this->Form->create('Land'); ?>
	<fieldset>
		<legend><?php echo __('Add Land'); ?></legend>
        <table>
        <tr>
        <td>
        <h3>Please enter the L.A.Case no.</h3>
        </td>
        <td>
	<?php
	
		echo $this->Form->input('lac_no',array('options'=>$lac_no,'label'=>false));
		
		
		
	?>
    </td></tr>
    </table>
	</fieldset>
<?php echo $this->Form->end(__('search')); ?>
<?php else: ?>
<?php echo $this->Form->create('Land',array('action'=>'insert')); ?>

	<table class="estimates">
    <tr><td>Plot no</td><td>Ana</td>
    <td>Ganda</td>
    <td>kara</td><td>kranti</td><td>Till</td><td>Total(in point)</td>
    </tr>
    	<?php
		 $i = 0;	
		 foreach($la as $la)
		 //for($i=0;$i<10;$i++) 
		 		{	 
				
		?>
        	<tr>
				<?php echo $this->Form->input('Land.'.$i.'.user_id',
							array('type'=>'hidden','label'=>false,'value'=>$this->Session->read('UserAuth.User.id'))); ?>
                <?php echo $this->Form->input('Land.'.$i.'.land_id',
							array('type'=>'hidden','label'=>false,'value'=>$la['Land']['id'])); ?>
				<td><?php  echo $this->Form->input('Land.'.$i.'.rsplot_no',array('label'=>false,
																				'value'=>$la['Land']['rsplot_no'],
																				'readonly'=>'readonly')); ?>
                </td>
                <td><?php   ?>
                 <?php 
				 	if($la['AcquisitionedArea']!=null)
					{
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							echo $this->Form->input('Land.'.$i.'.ana',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>$la['AcquisitionedArea'][0]['ana'],
																			'onkeypress'=>' return isNumberKey(event) ',
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Ana')"));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['ana'].'</p>';
						}
						
					}
					else
						{
							echo $this->Form->input('Land.'.$i.'.ana',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>0,
																			'onkeypress'=>' return isNumberKey(event) ',
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Ana')"));
						}
				?>
                 </td>
                <td><?php   ?>
                	<?php 
					if($la['AcquisitionedArea']!=null)
					{
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							 echo $this->Form->input('Land.'.$i.'.ganda',array('label'=>false,
																			 'onchange'=>'cal()',
																			 'value'=>$la['AcquisitionedArea'][0]['ganda'],
																			 'onkeypress'=>' return isNumberKey(event)',
																				'type'=>'number',
																				'onfocus'=>"st('Land".$i."Ganda')" ));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['ganda'].'</p>';
						}
						
					}
					else
					{
						echo $this->Form->input('Land.'.$i.'.ganda',array('label'=>false,
																			 'onchange'=>'cal()',
																			 'value'=>0,
																			 'onkeypress'=>' return isNumberKey(event)',
																				'type'=>'number',
																				'onfocus'=>"st('Land".$i."Ganda')" ));
					}
					?>                                                                
                </td>
                <td><?php   ?>
                	<?php 
					if($la['AcquisitionedArea']!=null)
					{
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							echo $this->Form->input('Land.'.$i.'.kra',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>$la['AcquisitionedArea'][0]['kra'],
																			'onkeypress'=>" return isNumberKey(event) ",
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Kra')"));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['kra'].'</p>';
						}
					}
					else
					{
						echo $this->Form->input('Land.'.$i.'.kra',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>'0',
																			'onkeypress'=>" return isNumberKey(event) ",
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Kra')"));
					}
					?> 
                </td>
                <td><?php   ?>
                    <?php
					if($la['AcquisitionedArea']!=null)
					{ 
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							echo $this->Form->input('Land.'.$i.'.krati',array('label'=>false,
																			  'onchange'=>'cal()',
																			  'value'=>$la['AcquisitionedArea'][0]['krati'],
																			  'onkeypress'=>"return isNumberKey(event)",
																			  'type'=>'number',
																			  'onclick'=>"st('Land".$i."Krati')"));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['krati'].'</p>';
						}
					}
					else
					{
						echo $this->Form->input('Land.'.$i.'.krati',array('label'=>false,
																			  'onchange'=>'cal()',
																			  'value'=>'0',
																			  'onkeypress'=>"return isNumberKey(event)",
																			  'type'=>'number',
																			  'onclick'=>"st('Land".$i."Krati')"));
					}
					?> 
                </td>
                <td><?php  ?>
                   <?php 
				   if($la['AcquisitionedArea']!=null)
					{
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							 echo $this->Form->input('Land.'.$i.'.til',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>$la['AcquisitionedArea'][0]['til'],
																			'onkeypress'=>" return isNumberKey(event) ",
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Til')"));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['til'].'</p>';
						}
					}
					else
					{
						 echo $this->Form->input('Land.'.$i.'.til',array('label'=>false,
																			'onchange'=>'cal()',
																			'value'=>'0',
																			'onkeypress'=>" return isNumberKey(event) ",
																			'type'=>'number',
																			'onclick'=>"st('Land".$i."Til')"));
					}
					?> 
                </td>
                <td><?php  ?>
                 	<?php 
					if($la['AcquisitionedArea']!=null)
					{
						if($la['AcquisitionedArea'][0]['ana']!=null || $la['AcquisitionedArea'][0]['total']!=null)
						{
							echo $this->Form->input('Land.'.$i.'.total',array('label'=>false,
														'value'=>$la['AcquisitionedArea'][0]['total'],
																			'readonly'=>'readonly'));
							//echo '<p>Old: '.$la['AcquisitionedArea'][0]['total'].'</p>';
						}
					}
					else
					{
						 echo $this->Form->input('Land.'.$i.'.total',array('label'=>false,
																			'readonly'=>'readonly'));
					}
					?> 
                </td>
               


            </tr>
        <?php 
				$i++;
		} 
		?>
    </table>
	<?php //debug($results); ?>
    <?php echo $this->Form->end(__('Submit')); ?>
    <?php //debug($results); ?>
    <br /><br />
    
<?php endif; ?>
</div>
