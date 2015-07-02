<script type="text/javascript">
function check_value(count)
{
	//alert('hoii');
	var amount1 = document.getElementById('Land'+count+'Area').value;
	var amount2 = document.getElementById('Land'+count+'1').value;
	var amount3 =	parseFloat(amount1 * amount2);
	document.getElementById('Land'+count+'2').value=amount3.toFixed(2);
	var amount4 = document.getElementById('Land'+count+'2').value;
	var amount5 = parseFloat(amount4 * 0.8);
	document.getElementById('Land'+count+'3').value=amount5.toFixed(2);
	var amount6 =document.getElementById('Land'+count+'3').value;
	var col7= parseFloat(amount4 - amount6);
	document.getElementById('Land'+count+'5').value=col7.toFixed(2);
	var tree=document.getElementById('Land'+count+'4').value;
	var amount7=document.getElementById('Land'+count+'5').value;
	var col8=parseFloat(tree + amount7);
	document.getElementById('Land'+count+'7').value=col8.toFixed(2);
	var duration1=parseFloat(document.getElementById('Land'+count+'Dur1').value);
	//alert(duration1.toFixed(2));
	var col9=parseFloat(0.12 * amount4 * duration1);
	//document.getElementById('Land'+count+'8').value=col9.toFixed(2);
	document.getElementById('Land'+count+'9').value=col9.toFixed(2);
	var duration2=parseFloat(document.getElementById('Land'+count+'Dur2').value);
	var col10=parseFloat(0.12 * amount4 * (duration2.toFixed(2)));
	//document.getElementById('Land'+count+'10').value=col10.toFixed(2);
	var newrate=document.getElementById('Land'+count+'11').value;
	var col10=parseFloat(newrate * amount1);
	//alert (col10);
	//document.getElementById('Land'+count+'11').value=col10.toFixed(2);
	document.getElementById('Land'+count+'12').value=col10.toFixed(2);
	var s1=document.getElementById('Land'+count+'12').value;
	//var amount7=document.getElementById('Land'+count+'11').value;
	var s2=parseFloat(tree + s1);
	document.getElementById('Land'+count+'13').value=s2.toFixed(2);
	var s3=document.getElementById('Land'+count+'13').value;
	var s4=parseFloat(s3 - amount6);
	document.getElementById('Land'+count+'14').value=s4.toFixed(2);
	var duration3=parseFloat(document.getElementById('Land'+count+'Dur3').value);
	//alert (duration3);
	var s5=(0.12 * duration3 * s1);
	document.getElementById('Land'+count+'15').value=s5.toFixed(2);
	var s6=(0.3 * amount1 * newrate);
	document.getElementById('Land'+count+'16').value=s6.toFixed(2);
	var s7=document.getElementById('Land'+count+'15').value;
	var s8=document.getElementById('Land'+count+'16').value;
	//var col11=parseFloat(tree + amount7);
	//document.getElementById('Land'+count+'13').value=col12.toFixed(2);
	//var duration2=document.getElementById('Land'+count+'Dur2').value;
	//var amount9=parseFloat(0.12 * amount7 * duration2);
	//document.getElementById('Land'+count+'10').value=amount9.toFixed(2);
	//document.getElementById('Land'+count+'14').value=amount9.toFixed(2);
	//var duration2=document.getElementById('Land'+count+'Dur2').value;
	//var col13=parseFloat(duration2 * newrate * amount1);
	//document.getElementById('Land'+count+'15').value=col13.toFixed(2);
	//var col14=document.getElementById('Land'+count+'15').value;
	var tot9=document.getElementById('Land'+count+'9').value;
	var tot10=document.getElementById('Land'+count+'10').value;
	//var tot15=document.getElementById('Land'+count+'14').value;

	var total=parseFloat(+s7 + +s8 + +tot9 + +tot10 + +s3);
	document.getElementById('Land'+count+'17').value=total.toFixed(2);
	
	
}
</script>
<div class="landsform">
<?php if(!isset($lands)): ?>
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
	
		echo $this->Form->input('caseno',array('options'=>$caseno,'label'=>false));
		
		
		
	?>
    </td></tr>
    </table>
	</fieldset>
<?php echo $this->Form->end(__('search')); ?>
<?php else: ?>
<?php echo $this->Form->create('Land',array('action'=>'update')); ?>
	<table>
    <tr><td>Plot no</td>
    <td>Class</td>
    <td>Acq. area</td>
    <td>old rate</td>
    <td>old value</td>
    <td>paid 80%</td>
    <td>tree value</td>
    <td>old value - 80%</td>
    <td>oldvalues + trees - 80 %</td>
    <td>12 % interset for 4 y 10 m 21 d on 4</td>
    <td>12 % interset for 19 y 10 m 26 d on 6</td>
    <td>new rate</td>
    <td>new value</td>
    <td>new value with trees</td>
    <td>new value + trees - 80%</td>
	 <td>12 % interset for 0y 3 m 0d on 12</td>
     <td>solatium @30 % on 11</td>
    <td>G. total</td>

    </tr>
   	<?php
		 $i = 0;	
		$class=array('Jal'=>'Jal','Kala'=>'Kala','Bastu'=>'Bastu','Danga'=>'Danga','Khamar'=>'Khamar','Doba'=>'Doba',
		'Doba Par'=>'Doba Par','Bans Ban'=>'Bans Ban','Path'=>'Path');
			
		 foreach($lands as $land):
		 //debug($land);
		 if($land['AcquisitionedArea']!= null):
		 //for($i=0;$i<10;$i++) 
			 
		?>
        	<tr>
            <?php echo $this->Form->input('Land.'.$i.'.id',
							array('type'=>'hidden','label'=>false,'value'=>$land['Land']['id'])); ?>
            <td><?php echo $land['Land']['rsplot_no']; ?></td>
             <td><?php  echo $this->Form->input('Land.'.$i.'.class',array('label'=>false,'options'=>$class)); ?></td>
            <!-- <td><?php echo $land['AcquisitionedArea'][0]['total']; ?></td>	-->
             <td><?php  echo $this->Form->input('Land.'.$i.'.area',array('label'=>false,'value'=>$land['AcquisitionedArea'][0]['total'],'readonly'=>'readonly')); ?></td>
             <td><?php  echo $this->Form->input('Land.'.$i.'.1',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
              <td><?php  echo $this->Form->input('Land.'.$i.'.2',array('label'=>false)); ?></td>
              <td><?php  echo $this->Form->input('Land.'.$i.'.3',array('label'=>false)); ?></td>
              <td><?php  echo $this->Form->input('Land.'.$i.'.4',array('label'=>false,'value'=>0)); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.5',array('label'=>false)); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.7',array('label'=>false)); ?></td>
              
                <?php /*echo $this->Form->input('Land.'.$i.'.dur1y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_year'])); 
                 echo $this->Form->input('Land.'.$i.'.dur1m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_month']));
                 echo $this->Form->input('Land.'.$i.'.dur1d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_day']));*/ ?>                <?php $m1= (($land['Lacase']['duration1_month'])/12);
						$d1= (($land['Lacase']['duration1_day'])/365);
						$year=(($land['Lacase']['duration1_year']) + $m1 + $d1);
				
				 echo $this->Form->input('Land.'.$i.'.dur1',
							array('type'=>'hidden','label'=>false,'value'=>$year));
				?> 
                 
                            
               <?php /* echo $this->Form->input('Land.'.$i.'.8',array('label'=>false)); ?></td>
                <?php echo $this->Form->input('Land.'.$i.'.dur2y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration2_year'])); 
                echo $this->Form->input('Land.'.$i.'.dur2m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration2_month'])); 
                  echo $this->Form->input('Land.'.$i.'.dur2d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration2_day']));*/ ?>
                            
                 <?php $m2= (($land['Lacase']['duration2_month'])/12);
						$d2= (($land['Lacase']['duration2_day'])/365);
						$year2=(($land['Lacase']['duration2_year']) + $m2 + $d2);
				
				 echo $this->Form->input('Land.'.$i.'.dur2',
							array('type'=>'hidden','label'=>false,'value'=>$year2));
				?>   
                         
               <td><?php  echo $this->Form->input('Land.'.$i.'.9',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.10',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.11',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.12',array('label'=>false)); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.13',array('label'=>false)); ?></td>
                <?php /*echo $this->Form->input('Land.'.$i.'.dur3y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_year'])); 
               echo $this->Form->input('Land.'.$i.'.dur3m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_month'])); 
                  echo $this->Form->input('Land.'.$i.'.dur3d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_day']));*/ ?>
                 
                            
               <td><?php  echo $this->Form->input('Land.'.$i.'.14',array('label'=>false)); ?></td>
                <?php $m3= (($land['Lacase']['duration3_month'])/12);
						$d3= (($land['Lacase']['duration3_day'])/365);
						$year3=(($land['Lacase']['duration3_year']) + $m3 + $d3);
				
				 echo $this->Form->input('Land.'.$i.'.dur3',
							array('type'=>'hidden','label'=>false,'value'=>$year3));
				?>  
                <td><?php  echo $this->Form->input('Land.'.$i.'.15',array('label'=>false)); ?></td>
                 <td><?php  echo $this->Form->input('Land.'.$i.'.16',array('label'=>false)); ?></td>
                  <td><?php  echo $this->Form->input('Land.'.$i.'.17',array('label'=>false)); ?></td>
              
              



                
            </tr>
        <?php 
				$i++;
				endif;
				endforeach;
		 
		?>
    </table>
	<?php //debug($results); ?>
    <?php echo $this->Form->end(__('Submit')); ?>
    <?php //debug($results); ?>
    <br /><br />
    <?php /*echo $this->Html->link('Click here for completing submition of marks and closing the academic session for giving marks',
						array('action'=>'closeconfirm',$results[0]['Result']['academic_session_id']),array('class'=>'link-button')); */?>
<?php endif; ?>
</div>
