<style>
div.submit
{
	clear:both;
	border:1px solid; 
	width:95%; 
	height:10%; 
	z-index:999999;
}
</style>
<!--<div class="landsform" style="margin-top:100px; position:relative;">-->
<div class="landsform">
<?php if(!isset($lacase)): ?>
<?php echo $this->Form->create('Land'); ?>
	<fieldset>
		<legend><?php echo __('Form to Enter Details of Lands for an L.A. Case '); ?></legend>
        <table>
        <tr>
        <td>
        <h3>Please select the L.A.Case no.
        <?php
			echo $this->Html->link('(+)',array(
										'controller'=>'lacases',
										'action' => 'add'
										),
										array('class'=>'btnAdd',
											  'onMouseOver' => 'Add new L.A. Case',
											  'title' => 'Click to add a New L. A. Case.'));
											
		?>
        </h3>
        </td>
        <td>
	<?php
		echo $this->Form->input('lac_no',array('options'=>$lac_no,'label'=>false));
		
	?>
    </td></tr>
    </table>
	</fieldset>
<?php echo $this->Form->end(__('Add Plots')); ?>
&nbsp;

<?php else: ?><?php //debug ($lacase); ?>
<?php echo $this->Form->create('Land',array('action'=>'edit'),array('style'=>'border:1px solid;')); ?>
<!--<div style="text-align:center; border:1px solid #039; background:#FC3; padding:6px; 
position:fixed; width:95%; margin-top:-100px;">-->
<div class="topFrame" style="text-align:center; border:1px solid #039; background:#FC3; padding:6px;">
		<div style="text-align:left;">
        
		<?php // echo $this->Html->link(__('A/K/G to Decimal'), array('controller'=>'Lands','action' => 'cal')); ?>
        
        <?php echo $this->Html->link(__('Edit / Delete Plots'), array('action' => 'index')); ?>
        &nbsp; | &nbsp;
        <?php echo $this->Html->link(__('Add Land Classifications'), array('controller'=>'classifications',
											'action' => 'add')); ?>
        </div>

<h1 style="padding:6px; font-size:20px;"><b>LA Case Number ::</b>  <?php echo $lacase['Lacase']['la_case_number']?></h1>
<b>Project name ::  </b><?php echo $lacase['Lacase']['project']?>
<br />
<b>Year of L.A.Case ::</b>  <?php echo $lacase['Lacase']['year_of_lacase']?>
<br />
</div>
<br /><br /><br /><br /><br /><br /><br />
	<table>
    <tr>	
    <td>Plot no</td>
    <td>Class</td>
    <td>Khatian no</td>
    <td>Mouja</td>
    <td>JL-no</td>
    <!--<td>dag_no</td>-->
    <td>P.S</td>
    <td>Acq. area(Ac.)</td>
    <td>Total Barga Effected Area(Ac.)</td>
    <td>Total tree value</td>
    <td>Total Structure value</td>
    <td>Total pan-baroz value</td>
    
    <td>Portion</td><!--<td>Status</td>-->
    </tr>
    	<?php
		 $i = 0;	
		$portion=array('Full'=>'Full','Middle'=>'Middle','N'=>'N','S'=>'S','E'=>'E','W'=>'W',
		'NE'=>'NE','NW'=>'NW','SE'=>'SE','SW'=>'SW','NEC'=>'NEC','NWC'=>'NWC','SEC'=>'SEC','SWC'=>'SWC');
		$status=array('part'=>'part','full'=>'full');

		 //foreach($lands as $land):
		 for($i=0;$i<20;$i++) 
		{	 
		?>
        	<tr>
            
            <script>
				
				function copyValueRsPlotNo(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'RsplotNo').value == "" ||
							document.getElementById('Land'+rowID+'RsplotNo').value == null){
					document.getElementById('Land'+rowID+'RsplotNo').value
							 = document.getElementById('Land'+(rowID-1)+'RsplotNo').value;
					}
				
				}
				
				
				function copyValueKhatianNo(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'KhatianNo').value == "" ||
							document.getElementById('Land'+rowID+'KhatianNo').value == null){
					document.getElementById('Land'+rowID+'KhatianNo').value
							 = document.getElementById('Land'+(rowID-1)+'KhatianNo').value;
					}
				
				}
				
				function copyValueMouja(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'Mouja').value == "" ||
							document.getElementById('Land'+rowID+'Mouja').value == null){
					document.getElementById('Land'+rowID+'Mouja').value
							 = document.getElementById('Land'+(rowID-1)+'Mouja').value;
					}
				
				}
				
				
				function copyValueJlNo(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'JlNo').value == "" ||
							document.getElementById('Land'+rowID+'JlNo').value == null){
					document.getElementById('Land'+rowID+'JlNo').value
							 = document.getElementById('Land'+(rowID-1)+'JlNo').value;
					}
				
				}
				
				function copyValueDagNo(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'DagNo').value == "" ||
							document.getElementById('Land'+rowID+'DagNo').value == null){
					document.getElementById('Land'+rowID+'DagNo').value
							 = document.getElementById('Land'+(rowID-1)+'DagNo').value;
					}
				
				}
				
				function copyValuePoliceStation(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('Land'+rowID+'PoliceStation').value == "" ||
							document.getElementById('Land'+rowID+'PoliceStation').value == null){
					document.getElementById('Land'+rowID+'PoliceStation').value
							 = document.getElementById('Land'+(rowID-1)+'PoliceStation').value;
					}
				
				}
				function checkvalue(e)
				{
					if(e.value > 10000)
					{
						alert('Value Can not be more than 10000');
						e.value='';
					}
				}
				
				
				
				
				
				
				
			</script>
            	
                <?php echo $this->Form->input('Land.'.$i.'.lacase_id',
							array('type'=>'hidden','label'=>false,'value'=>$lacase['Lacase']['id'])); ?>
				<td>
					<?php  echo $this->Form->input('Land.'.$i.'.rsplot_no',array('label'=>false,
											'onfocus'=>"copyValueRsPlotNo($i)",'required'=>false)); ?>
                                            
                    <p id="success.<?php echo $i;?>"></p>
                </td>
               
               
                <td><?php  echo $this->Form->input('Land.'.$i.'.classification_id',array('label'=>false,'required'=>false,
											)); ?></td>
               
                <td><?php  echo $this->Form->input('Land.'.$i.'.khatian_no',array('label'=>false,'required'=>false,
											'onfocus'=>"copyValueKhatianNo($i)")); ?></td>
                                            
                <td><?php  echo $this->Form->input('Land.'.$i.'.mouja',array('label'=>false,'required'=>false,
											'onfocus'=>"copyValueMouja($i)")); ?></td>
                                            
                <td><?php  echo $this->Form->input('Land.'.$i.'.jl_no',array('label'=>false,'required'=>false,
											'onfocus'=>"copyValueJlNo($i)")); ?></td>
                                            
               <!-- <td>--><?php  echo $this->Form->input('Land.'.$i.'.dag_no',array('label'=>false,'required'=>false,'type'=>'hidden',
											'onfocus'=>"copyValueDagNo($i)")); ?><!--</td>-->
                                            
                <td><?php  echo $this->Form->input('Land.'.$i.'.police_station',array('label'=>false,'required'=>false,
											'value'=>$lacase['Lacase']['police_station'])); 
				/*echo $this->Form->input('Land.'.$i.'.police_station',array('label'=>false,'required'=>false,
											'onfocus'=>"copyValuePoliceStation($i)"));*/ ?></td>
                                            
                <td><?php  echo $this->Form->input('Land.'.$i.'.acquisitioned_areas_value',array('label'=>false)); ?></td>
                <td><?php  echo $this->Form->input('Land.'.$i.'.total_barga_effected_area',array('label'=>false)); ?></td>
                <td><?php  echo $this->Form->input('Land.'.$i.'.tree_area',array('label'=>false)); ?></td>
                <td><?php  echo $this->Form->input('Land.'.$i.'.structure_area',array('label'=>false)); ?></td>
                <td><?php  echo $this->Form->input('Land.'.$i.'.pan_baroz_area',array('label'=>false)); ?></td>
                
                <td><?php  echo $this->Form->input('Land.'.$i.'.portion',array('label'=>false,'options'=>$portion)); ?></td>
                
                <!--<td>--><?php  echo $this->Form->input('Land.'.$i.'.status',array('label'=>false,'options'=>$status,'type'=>'hidden')); ?><!--</td>-->
                
<!--                <td><?php  echo $this->Form->input('Land.'.$i.'.acquisitioned_areas_value'); ?></td>
-->
         
            </tr>
            
        <?php 
				//$i++;
		} 
		?>
        <!--<tr style="border:1px solid; z-index:1000; margin-top:-100px;">
        		<td ><?php  echo $this->Form->submit('Submit'); ?></td></tr>-->
    </table>
	<?php //debug($results); ?>
    <div class="podbar" style="">
    	<!--<div style="position:fixed;">-->
        <?php  echo $this->Form->submit('Submit'); ?>
    	<?php echo $this->Form->end(); ?>
        <!--</div>-->
    </div>
    <?php //debug($results); ?>
    <br /><br />
    <?php /*echo $this->Html->link('Click here for completing submition of marks and closing the academic session for giving marks',
						array('action'=>'closeconfirm',$results[0]['Result']['academic_session_id']),array('class'=>'link-button')); */?>
<?php endif; ?>
</div>
<?php
for($i = 0; $i<20; $i++){
 
 $this->Js->get('#Land'.$i.'RsplotNo')->event('change',
	$this->Js->request(array(
		'controller'=>'Lands',
		'action'=>'checkduplicateplot'
		), array(
		'update'=>'#success.'.$i,
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
}
?>