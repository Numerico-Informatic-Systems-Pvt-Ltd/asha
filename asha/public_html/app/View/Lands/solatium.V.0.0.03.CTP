<script type="text/javascript">
function check_value(count)
{
	// alert('hoii');
	var amount1 = document.getElementById('Land'+count+'Area').value; /* Get Land Area */
	
	var amount2 = document.getElementById('Land'+count+'1').value;    /* Old Rate */

	var amount3 =	parseFloat(amount1 * amount2);	/* Old Value */
	
	document.getElementById('Land'+count+'2').value=amount3.toFixed(2);
	var amount4 = document.getElementById('Land'+count+'2').value;  /* Old Value */
	
	
	var amount5 = parseFloat(amount4 * 0.8);			/* Paid 80% */
	
	document.getElementById('Land'+count+'3').value=amount5.toFixed(2);
														/* Paid 80%  */
														
	
	document.getElementById('Land'+count+'3Check').value=amount5.toFixed(2); /* Paid 80% */
	
	var amount6 =document.getElementById('Land'+count+'3').value;  /* Paid 80% */
 	
	var col7= parseFloat(amount4 - amount6); 
	document.getElementById('Land'+count+'5').value=col7.toFixed(2); /* Old Value - 80% */
	
	var tree=document.getElementById('Land'+count+'4').value;
	
	var amount7=document.getElementById('Land'+count+'5').value;
	
	var col8=parseFloat(Number(tree) + Number(amount7));		/* Old value - 80% plus tree value */
	
	document.getElementById('Land'+count+'7').value=col8.toFixed(2);
	var duration1=parseFloat(document.getElementById('Land'+count+'Dur1').value);	/* Duration 1 */

	//alert(duration1.toFixed(2));
	
	var col9=parseFloat(0.12 * amount4 * duration1);	/*ADDITIONAL COMPENSATION 1*/
	
	//document.getElementById('Land'+count+'8').value=col9.toFixed(2);
	
	document.getElementById('Land'+count+'9').value=col9.toFixed(2);	/*Additional compensation 1*/
	
	var duration2=parseFloat(document.getElementById('Land'+count+'Dur2').value);	/*Period for Additional Compensation 2*/

	
	var col10=parseFloat(0.12 * amount7 * (duration2));
	//alert(col10);	
	
	document.getElementById('Land'+count+'10').value=col10.toFixed(2);	/*Additional compensation 2*/
	
	
	//document.getElementById('Land'+count+'10').value=col10.toFixed(2);
	var newrate=document.getElementById('Land'+count+'11').value;		/*New Rate*/
	
	var col10=parseFloat(newrate * amount1) ;  /*New Rate X Land Area Acquisition */
	
	//alert (col10);
	//document.getElementById('Land'+count+'11').value=col10.toFixed(2);
	document.getElementById('Land'+count+'12').value=col10.toFixed(2) ; /*New Value*/
	
	
	var s1=document.getElementById('Land'+count+'12').value;
	var s14=document.getElementById('Land'+count+'14').value;
	//var amount7=document.getElementById('Land'+count+'11').value;
	var s2=parseFloat(Number(tree) + Number(s1));
	
	document.getElementById('Land'+count+'13').value=s2.toFixed(2);	/* New Value + Tree */
	
	var s3=document.getElementById('Land'+count+'13').value; /*New value with tree */
	
	var s4=parseFloat(s3 - amount6);	/*New value + trees - 80% */
	
	document.getElementById('Land'+count+'14').value=s4.toFixed(2); /*New value + trees - 80% */
	
	var duration3=parseFloat(document.getElementById('Land'+count+'Dur3').value); /* Duration 3 */

	var s5=(0.12 * duration3 * parseFloat(s14));
	//alert(s5);
		
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

	var total=parseFloat(s7)+parseFloat(s8)+parseFloat(tot9)+parseFloat(tot10)+parseFloat(s3);
//	var total=s7+s8+ +tot9 + +tot10 + +s3);
	document.getElementById('Land'+count+'17').value=total.toFixed(2);
	
	
}
	function paid80(e,count)
	{
		//alert(e);
		//alert(count);
		if(e.checked)
		{
			var amount1 = document.getElementById('Land'+count+'Area').value; /* Get Land Area */
	
			var amount2 = document.getElementById('Land'+count+'1').value;    /* Old Rate */
		
			var amount3 =	parseFloat(amount1 * amount2);	/* Old Value */
			
			document.getElementById('Land'+count+'2').value=amount3.toFixed(2);
			var amount4 = document.getElementById('Land'+count+'2').value;  /* Old Value */
			
			
			var amount5 = parseFloat(amount4 * 0.8);			/* Paid 80% */
			
			document.getElementById('Land'+count+'3').value=amount5.toFixed(2);
																/* Paid 80%  */
			var amount6 =document.getElementById('Land'+count+'3').value;  /* Paid 80% */
			var col7= parseFloat(amount4 - amount6); 
			document.getElementById('Land'+count+'5').value=col7.toFixed(2); /* Old Value - 80% */
			
			var tree=document.getElementById('Land'+count+'4').value;
	
			var amount7=document.getElementById('Land'+count+'5').value;
	
			var col8=parseFloat(Number(tree) + Number(amount7));		/* Old value - 80% plus tree value */
	
			document.getElementById('Land'+count+'7').value=col8.toFixed(2);
			//var duration1=parseFloat(document.getElementById('Land'+count+'Dur1').value);	/* Duration 1 */
			var s3=document.getElementById('Land'+count+'13').value; /*New value with tree */
			
			var s4=parseFloat(s3 - amount6);	/*New value + trees - 80% */
	
			document.getElementById('Land'+count+'14').value=s4.toFixed(2); /*New value + trees - 80% */
	
		}
		else
		{
			document.getElementById('Land'+count+'3').value=0.00;
			document.getElementById('Land'+count+'5').value=document.getElementById('Land'+count+'2').value;
			document.getElementById('Land'+count+'7').value=document.getElementById('Land'+count+'2').value;
			document.getElementById('Land'+count+'14').value=document.getElementById('Land'+count+'12').value;
		}
	}
</script>
<div class="landsform">
<?php if(!isset($lands)): ?>
<?php
	$opt=array('0'=>'Select LA Case');
	foreach($caseno as $key=>$value)
	{
		$opt[$key]=$value;
	}
?>
<?php echo $this->Form->create('Land'); ?>

	<fieldset>
		<legend><?php echo __('Plot Wise Estimate for Land'); ?></legend>
        <table>
        <tr>
        <td>
        <h3>Please search the L.A.Case no.</h3>
        </td>
        <td>
	<?php
		echo $this->Form->input('caseno',array('options'=>$opt,'label'=>false));
	?>

    </td></tr>
	<tr id="success"><tr>
    </table>
	</fieldset>
	
	<?php
		 $this->Js->get('#LandCaseno')->event('change',
			$this->Js->request(array(
				'controller'=>'lands',
				'action'=>'viewplotbylacase'
				), array(
				'update'=>'#success',
				'async' => true,
				'method' => 'post',
				'dataExpression'=>true,
				'data'=> $this->Js->serializeForm(array(
					'isForm' => true,
					'inline' => true
					))
				))
			);
?>
<?php echo $this->Form->end(); ?>
<?php else: ?>
<?php echo $this->Form->create('Land',array('action'=>'updateestimate')); ?>
<?php
	//debug($lacase);
	$date_of_possession = $lacase['Lacase']['possession_date'];
	$meterial_date = $lacase['Lacase']['publication_date'];
	$date_of_80_payment = $lacase['Lacase']['period_of_interest_from'];
	$award_date = $lacase['Lacase']['period_of_interest_to'];
?>	


<div style="text-align:center; border:1px solid #039; background:#FC3; padding:6px;">

<h1 style="padding:6px; font-size:20px;">
	<b>LA Case Number ::</b> 
	<?php echo $lacase['Lacase']['la_case_number']?>
</h1>

<b>Project name ::  </b><?php //echo $lacase['Lacase']['project']?><br />

<b>Date of Possession ::  </b><?php echo $this->Time->format("F jS, Y",$date_of_possession);?>
&nbsp;&nbsp;&nbsp;&nbsp;
<b>Meterial Date :: </b> <?php echo $this->Time->format("F jS, Y",$meterial_date); ?> <br/>
<b>Date of 80% Payment :: </b><?php echo $this->Time->format("F jS, Y",$date_of_80_payment);?>
&nbsp;&nbsp;&nbsp;&nbsp;
<b>Date of Award :: </b><?php echo $this->Time->format("F jS, Y",$award_date);?><br/>

<?php

/* 
calculation of dates
*/

//This function take two parameter
//Start date and end Date
 
function Get_Date_Difference($start_date, $end_date)
    {		/* Substraction of Day */
			$startDay=(int)(substr($start_date,8,2));
			$endDay=(int)(substr($end_date,8,2));
			/* Substraction of Month */
			$startMonth=substr($start_date,5,2);
			$endMonth=substr($end_date,5,2);
			/* Substraction of Year */
			$startYear=substr($start_date,0,4);
			$endYear=substr($end_date,0,4);
			/* Date Difference */
			$differenceDay=0;
			$differenceMonth=0;
			$differenceYear=0;
					
			if($endDay < $startDay )
			{
				$startDay=$endDay+30-$startDay;
				$differenceMonth=1;							
			}
			else
			{
				$startDay=$endDay-$startDay;		
				
			}		
			if($endMonth < $startMonth )
			{
				$startMonth = $endMonth + 12-$startMonth-$differenceMonth;
				$differenceYear=1;			
			}
			else
			{
				$startMonth=$endMonth-$startMonth-$differenceMonth;				
			}

			$startYear=$endYear-$startYear-$differenceYear;
			
			$total_time_involded = $startYear." Year ".$startMonth." Month ".$startDay." Day";
			$time_for_calculation = array($startYear,$startMonth,$startDay);
			$period = array($total_time_involded,$time_for_calculation);
			return $period;
		
/*        $diff = abs(strtotime($end_date) - strtotime($start_date));
        echo $diff;
		$years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years.' Years '.$months.' Month '.$days.' Days';
		*/
		
    }
 
//call the function from where you need
 
//echo Get_Date_Difference($StartDate,$EndDate);

	$periodforAdditionalCompensation1 = Get_Date_Difference($date_of_possession ,$date_of_80_payment );
	$periodforAdditionalCompensation2 = Get_Date_Difference($date_of_80_payment,$meterial_date);
	$periodforAdditionalCompensation3 = Get_Date_Difference($meterial_date,$award_date);
	
	//$periodforAdditionalCompensation3 = Get_Date_Difference($award_date , $meterial_date);
// you will get result (1 Years 9 Month 14 Days) 

?>
<b>Year of L.A.Case ::</b>  <?php echo $lacase['Lacase']['year_of_lacase']?>
<br />
</div>
<style>
table td {border:1px #eaeaea solid;}
</style>

	<table>
	<tr><td colspan="3">Tree Value = 0.00 </td></tr>
    <tr><th>Plot no</th>
   <!-- <td>Class</td>-->
    <th>Acq. area</th>
    <th>old rate</th>
    <th>old value</th>
    <th>paid 80%</th>
    <!--<th>tree value</th>-->
    <th>old value - 80%</th>
    <th>oldvalues + trees - 80 %</th>
    <th>12 % interset for <?php echo $periodforAdditionalCompensation1['0']; ?></th>
    <th>12 % interset for <?php echo $periodforAdditionalCompensation2['0']; ?></th>
    <th>new rate</th>
    <th>new value</th>
    <!--<th>new value with trees</th>-->
    <th>new value + trees - 80%</th>
	 <th>12 % interset for <?php echo $periodforAdditionalCompensation3['0']; ?></th>
     <th>solatium @30% new rate</th>
    <th>G. total</th>

    </tr>
   	<?php
		 $i = 0;	
		$class=array('Jal'=>'Jal','Kala'=>'Kala','Bastu'=>'Bastu','Danga'=>'Danga','Khamar'=>'Khamar','Doba'=>'Doba',
		'Doba Par'=>'Doba Par','Bans Ban'=>'Bans Ban','Path'=>'Path');
			
		 //foreach($lands as $land):
		 //debug($land);
		 if($lands['AcquisitionedArea']!= null):
		 //for($i=0;$i<10;$i++) 
			 
		?>
        	<tr>
            <?php echo $this->Form->input('Land.'.$i.'.id',
							array('type'=>'hidden','label'=>false,'value'=>$lands['Land']['id']));
				 ?>
            <td><?php echo $lands['Land']['rsplot_no']; ?></td>
            
           <!--  <td><?php  echo $this->Form->input('Land.'.$i.'.classification_id',array('label'=>false)); ?></td>
-->             
            <!-- <td><?php echo $land['AcquisitionedArea'][0]['total']; ?></td>	-->
            
             <td><?php  echo $this->Form->input('Land.'.$i.'.area',array('label'=>false,'value'=>$lands['AcquisitionedArea'][0]['total'],'readonly'=>'readonly')); ?></td>
             
             <td><?php  echo $this->Form->input('Land.'.$i.'.1',array('label'=>false,
			 'value'=>$lands['Classification']['old_value'],'onblur'=>'check_value('.$i.')')); ?></td>
              <td><?php  echo $this->Form->input('Land.'.$i.'.2',array('label'=>false)); ?></td>
              
              <td><?php  echo $this->Form->input('Land.'.$i.'.3',array('label'=>false)); ?></td>
              
             <!-- <td>--><?php  echo $this->Form->input('Land.'.$i.'.4',array('label'=>false,'value'=>0,'type'=>'hidden')); ?><!--</td>-->
              
               <td><?php  echo $this->Form->input('Land.'.$i.'.5',array('label'=>false)); ?></td>
               
               <td><?php  echo $this->Form->input('Land.'.$i.'.7',array('label'=>false)); ?></td>
              
                <?php /*echo $this->Form->input('Land.'.$i.'.dur1y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_year'])); 
                 echo $this->Form->input('Land.'.$i.'.dur1m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_month']));
                 echo $this->Form->input('Land.'.$i.'.dur1d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_day']));*/ ?>                <?php 
						/* Commented out by SID dated 10.28.2013 - NOT IN USE 
						See below for modified code
						$m1= (($land['Lacase']['duration1_month'])/12);
						$d1= (($land['Lacase']['duration1_day'])/365);
						$year=(($land['Lacase']['duration1_year']) + $m1 + $d1);
						*/
				
				/* Convert the duration of 1st Additional Compensation to Year */
				
				$year = $periodforAdditionalCompensation1['1']['0'];
				$month = $periodforAdditionalCompensation1['1']['1'];
				$day =  $periodforAdditionalCompensation1['1']['2'];
				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
				
				
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

				<?php
				$year = $periodforAdditionalCompensation2['1']['0'];
				$month = $periodforAdditionalCompensation2['1']['1'];
				$day =  $periodforAdditionalCompensation2['1']['2'];
				?>

                            
                 <?php $m2= (($month)/12);
						$d2= (($day)/365);
						$year2=(($year) + $m2 + $d2);
						//debug($year2);
				 echo $this->Form->input('Land.'.$i.'.dur2',
							array('type'=>'hidden','label'=>false,'value'=>$year2));
				?>   
                         
               <td><?php  echo $this->Form->input('Land.'.$i.'.9',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.10',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.11',array('label'=>false,
			   'value'=>$lands['Classification']['new_value'],'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.12',array('label'=>false)); ?></td>
               <!--<td>--><?php  echo $this->Form->input('Land.'.$i.'.13',array('label'=>false,'type'=>'hidden')); ?><!--</td>-->
                <?php /*echo $this->Form->input('Land.'.$i.'.dur3y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_year'])); 
               echo $this->Form->input('Land.'.$i.'.dur3m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_month'])); 
                  echo $this->Form->input('Land.'.$i.'.dur3d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_day']));*/ ?>
                 
                            
               <td><?php  echo $this->Form->input('Land.'.$i.'.14',array('label'=>false)); ?></td>
                <?php
				
				
				
				$year = $periodforAdditionalCompensation3['1']['0'];
				$month = $periodforAdditionalCompensation3['1']['1'];
				$day =  $periodforAdditionalCompensation3['1']['2'];

				 $m3= (($month)/12);
						$d3= (($day)/365);
						$year3=(($year) + $m3 + $d3);
				
				 echo $this->Form->input('Land.'.$i.'.dur3',
							array('type'=>'hidden','label'=>false,'value'=>$year3));
				?>  
                <td><?php  echo $this->Form->input('Land.'.$i.'.15',array('label'=>false)); ?></td>
                 <td><?php  echo $this->Form->input('Land.'.$i.'.16',array('label'=>false)); ?></td>
                  <td><?php  echo $this->Form->input('Land.'.$i.'.17',array('label'=>false)); ?>
                  <?php  echo $this->Form->input('Land.'.$i.'.3_check',array('label'=>false,'type'=>'hidden')); ?></td>
              
              



                
            </tr>
        <?php 
				//$i++;
				endif;
				//endforeach;
		?>
		
    </table>
	<table>
		<tr>
			<th>Owner</th>
			<th>Share area</th>
			<th>old rate</th>
			<th>old value</th>
			<th>paid 80%</th>
			<!--<th>tree value</th>-->
			<th>old value - 80%</th>
			<th>oldvalues + trees - 80 %</th>
			<th>12 % interset for <?php echo $periodforAdditionalCompensation1['0']; ?></th>
			<th>12 % interset for <?php echo $periodforAdditionalCompensation2['0']; ?></th>
			<th>new rate</th>
			<th>new value</th>
			<!--<th>new value with trees</th>-->
			<th>new value + trees - 80%</th>
			 <th>12 % interset for <?php echo $periodforAdditionalCompensation3['0']; ?></th>
			 <th>solatium @30% new rate</th>
			<th>G. total</th>
			<th>80% Paid</th>
		</tr>
		<?php
			$i=1;
			foreach($lands['LandOwner'] as $landowner):
			//debug($landowner);
			echo $this->Form->input('Land.'.$i.'.owner',
							array('type'=>'hidden','label'=>false,'value'=>$landowner['owner_id']));
			$owner=$this->requestAction('/owners/getwonerbyid/'.$landowner['owner_id']); 
			//debug($owner);
		?>
			<tr>
				<td><p><?php echo $owner['Owner']['name'].' - '.$owner['Owner']['relation'].' - '.
				$owner['Owner']['parent'];?></p>
			</td>
			<?php echo $this->Form->input('Land.'.$i.'.id',
							array('type'=>'hidden','label'=>false,'value'=>$lands['Land']['id'])); ?>
            <!--<td><?php echo $lands['Land']['rsplot_no']; ?></td>-->
            
           <!--  <td><?php  echo $this->Form->input('Land.'.$i.'.classification_id',array('label'=>false)); ?></td>
-->             
            <!-- <td><?php echo $land['AcquisitionedArea'][0]['total']; ?></td>	-->
            <?php $aqu=$lands['AcquisitionedArea'][0]['total']*($landowner['shared_area']/10000); ?>
             <td><?php  
				echo $this->Form->input('Land.'.$i.'.area_clone',array('label'=>false,'value'=>$landowner['shared_area'],'readonly'=>'readonly'));
					 
			 echo $this->Form->input('Land.'.$i.'.area',array('label'=>false,'value'=>$aqu,'readonly'=>'readonly','type'=>'hidden')); ?></td>
             
             <td><?php  echo $this->Form->input('Land.'.$i.'.1',array('label'=>false,
			 'value'=>$lands['Classification']['old_value'],'onblur'=>'check_value('.$i.')')); ?></td>
              <td><?php  echo $this->Form->input('Land.'.$i.'.2',array('label'=>false)); ?></td>
              
              <td><?php  echo $this->Form->input('Land.'.$i.'.3',array('label'=>false)); ?></td>
              
             <!-- <td>--><?php  echo $this->Form->input('Land.'.$i.'.4',array('label'=>false,'value'=>0,'type'=>'hidden')); ?><!--</td>-->
              
               <td><?php  echo $this->Form->input('Land.'.$i.'.5',array('label'=>false)); ?></td>
               
               <td><?php  echo $this->Form->input('Land.'.$i.'.7',array('label'=>false)); ?></td>
              
                <?php /*echo $this->Form->input('Land.'.$i.'.dur1y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_year'])); 
                 echo $this->Form->input('Land.'.$i.'.dur1m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_month']));
                 echo $this->Form->input('Land.'.$i.'.dur1d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration1_day']));*/ ?>                <?php 
						/* Commented out by SID dated 10.28.2013 - NOT IN USE 
						See below for modified code
						$m1= (($land['Lacase']['duration1_month'])/12);
						$d1= (($land['Lacase']['duration1_day'])/365);
						$year=(($land['Lacase']['duration1_year']) + $m1 + $d1);
						*/
				
				/* Convert the duration of 1st Additional Compensation to Year */
				
				$year = $periodforAdditionalCompensation1['1']['0'];
				$month = $periodforAdditionalCompensation1['1']['1'];
				$day =  $periodforAdditionalCompensation1['1']['2'];
				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
				
				
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

				<?php
				$year = $periodforAdditionalCompensation2['1']['0'];
				$month = $periodforAdditionalCompensation2['1']['1'];
				$day =  $periodforAdditionalCompensation2['1']['2'];
				?>

                            
                 <?php $m2= (($month)/12);
						$d2= (($day)/365);
						$year2=(($year) + $m2 + $d2);
				
				 echo $this->Form->input('Land.'.$i.'.dur2',
							array('type'=>'hidden','label'=>false,'value'=>$year2));
				?>   
                         
               <td><?php  echo $this->Form->input('Land.'.$i.'.9',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.10',array('label'=>false,'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.11',array('label'=>false,
			   'value'=>$lands['Classification']['new_value'],'onchange'=>'check_value('.$i.')')); ?></td>
               <td><?php  echo $this->Form->input('Land.'.$i.'.12',array('label'=>false)); ?></td>
               <!--<td>--><?php  echo $this->Form->input('Land.'.$i.'.13',array('label'=>false,'type'=>'hidden')); ?><!--</td>-->
                <?php /*echo $this->Form->input('Land.'.$i.'.dur3y',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_year'])); 
               echo $this->Form->input('Land.'.$i.'.dur3m',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_month'])); 
                  echo $this->Form->input('Land.'.$i.'.dur3d',
							array('type'=>'text','label'=>false,'value'=>$land['Lacase']['duration3_day']));*/ ?>
                 
                            
               <td><?php  echo $this->Form->input('Land.'.$i.'.14',array('label'=>false)); ?></td>
                <?php
				
				
				
				$year = $periodforAdditionalCompensation3['1']['0'];
				$month = $periodforAdditionalCompensation3['1']['1'];
				$day =  $periodforAdditionalCompensation3['1']['2'];

				 $m3= (($month)/12);
						$d3= (($day)/365);
						$year3=(($year) + $m3 + $d3);
				
				 echo $this->Form->input('Land.'.$i.'.dur3',
							array('type'=>'hidden','label'=>false,'value'=>$year3));
				?>  
                <td><?php  echo $this->Form->input('Land.'.$i.'.15',array('label'=>false)); ?></td>
                 <td><?php  echo $this->Form->input('Land.'.$i.'.16',array('label'=>false)); ?></td>
                  <td><?php  echo $this->Form->input('Land.'.$i.'.17',array('label'=>false)); ?>
                  <?php  echo $this->Form->input('Land.'.$i.'.3_check',array('label'=>false,'type'=>'hidden')); ?></td>
              	 <td><?php  echo $this->Form->checkbox('Land.'.$i.'.18',array('label'=>false,'checked'=>true,
				 		'onclick'=>"paid80(this,$i)")); ?>
			</tr>
		<?php 
			$i++;
			endforeach;
		?>
	</table>
	<?php //debug($results); ?>
    <?php echo $this->Form->end(__('Next >>')); ?>
    <?php //debug($results); ?>
    <br /><br />
    <?php /*echo $this->Html->link('Click here for completing submition of marks and closing the academic session for giving marks',
						array('action'=>'closeconfirm',$results[0]['Result']['academic_session_id']),array('class'=>'link-button')); */?>
<?php endif; ?>
</div>