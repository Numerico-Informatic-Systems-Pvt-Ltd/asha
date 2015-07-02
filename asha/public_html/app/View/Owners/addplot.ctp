<?php 
if(!isset($land_id)):
?>
<div class="owners form">
<?php echo $this->Form->create('Owner'); ?>
<h3>Form to Add Owners Plotwise for an L.A. Case</h3>

<?php
 $this->Js->get('#OwnerLacaseId')->event('change',
	$this->Js->request(array(
		'controller'=>'lands',
		'action'=>'viewplot'
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
<?php
//$type=array();
$opt=array(''=>'select');
foreach($lac as $key=>$value)
{
	$opt[$key]=$value;
}
?>
<?php
echo $this->Form->input('lacase_id',array('label'=>'Select LA Case No','options'=>$opt));?>
<?php echo'<div id="success">';
echo '</div>'; ?>


 
</div>
<div class="actions">
<ul>
	<li><?php echo $this->Html->link('Verify Owner',array('action'=>'search')); ?></li>
   	<li><?php echo $this->Html->link('List All Owners',array('action'=>'index')); ?></li>
</ul>
</div>
<?php
else:
?>
<!--<div class="owners form">-->
<?php 
echo $this->Form->create('Owner',array('action'=>'addowner',
										'onsubmit'=>"return checktotal()")); 
												?>

<div class="topFrame">
                        
<h1 style="padding:6px; font-size:20px;"><b>LA Case Number ::</b>  <?php echo $lacase['Lacase']['la_case_number']?></h1>
<b>Project name ::  </b><?php echo $lacase['Lacase']['project']?>
<br />
<b>Year of L.A.Case ::</b>  <?php echo $lacase['Lacase']['year_of_lacase']?>

<br />
<b>Plot number ::</b>  <?php echo $replot['Land']['rsplot_no'];?>
<br />
<b>Total Land Share [Previous Share + Current Form Share]:: </b>
					<?php 
						if($present_total_share['0']['0']['present_total_share'])
						{
							$present_land_share=$present_total_share['0']['0']['present_total_share'];
						}
						else
						{
							$present_land_share=0;
						}
					echo '<span id="PresentTotalShare">'.$present_land_share.'</span>
					+ <span id="PresentTotalFormShare">0</span> = <b><span id="PresentShare">'.
					$present_total_share['0']['0']['present_total_share']
					.'</span></b>'; ?>
<br />
<b>Total Tree Share [Previous Share + Current Form Share]:: </b>                  
                    <?php 
						if($present_tree_share['0']['0']['present_tree_share'])
						{
							$tree_share=$present_tree_share['0']['0']['present_tree_share'];
						}
						else
						{
							$tree_share=0;
						}
					echo '<span id="PresentTreeTotalShare">'.$tree_share.'</span>
					+ <span id="PresentTreeTotalFormShare">0</span> = <b><span id="PresentTreeShare">'.
					$present_tree_share['0']['0']['present_tree_share']
					.'</span></b>'; ?>

<br />
<b>Total Structure Share [Previous Share + Current Form Share]:: </b>
                    <?php 
						if($present_structure_share['0']['0']['present_structure_share'])
						{
							$structure_share=$present_structure_share['0']['0']['present_structure_share'];
						}
						else
						{
							$structure_share=0;
						}
					echo '<span id="PresentStructureTotalShare">'.$structure_share.'</span>
					+ <span id="PresentStructureTotalFormShare">0</span> = <b><span id="PresentStructureShare">'.
					$present_structure_share['0']['0']['present_structure_share']
					.'</span></b>'; ?>
<br />
<b>Total Pan-Baroz Share [Previous Share + Current Form Share]:: </b>
                    
                    <?php 
						if($present_pan_baroz_share['0']['0']['present_pan_baroz_share'])
						{
							$pan_baroz_share=$present_pan_baroz_share['0']['0']['present_pan_baroz_share'];
						}
						else
						{
							$pan_baroz_share=0;
						}
					echo '<span id="PresentPanBarozTotalShare">'.$pan_baroz_share.'</span>
					+ <span id="PresentPanBarozTotalFormShare">0</span> = <b><span id="PresentPanBarozShare">'.
					$present_pan_baroz_share['0']['0']['present_pan_baroz_share']
					.'</span></b>'; ?>
<br />
<b>Total Barga Share [Previous Share + Current Form Share]:: </b>
                    
                    <?php 
						if($present_barga_share['0']['0']['present_barga_share'])
						{
							$barga_share=$present_barga_share['0']['0']['present_barga_share'];
						}
						else
						{
							$barga_share=0;
						}
					echo '<span id="PresentBargaTotalShare">'.$barga_share.'</span>
					+ <span id="PresentBargaTotalFormShare">0</span> = <b><span id="PresentBargaShare">'.
					$present_barga_share['0']['0']['present_barga_share']
					.'</span></b>'; ?>
					
                    <?php // We are using this hidden field to enforce entry of barga share if the has
								// barga affected area ?>
                    <input type="hidden" id="total_barga_effected_area" 
                    		value = "<?=$replot['Land']['total_barga_effected_area'] ;?>" />                  
</div>
<?php
$opt=array('S/O'=>'S/O','D/O'=>'D/O','W/O'=>'W/O');
$optp=array('Full'=>'Full','N'=>'N','S'=>'S','E'=>'E','W'=>'W','NE'=>'NE','NW'=>'NW',
				'SE'=>'SE','SW'=>'SW','Middle'=>'Middle');
$optBargadar = array('N'=>'N','Y'=>'Y');
?>
<div id="TotalShare">
</div>
<div style="height:160px;"></div>
<table>
<tr>
<th>Plot No</th>
<th>Name</th>
<th>Relation</th>
<th>Guardian Name</th>
<th>Bargadar</th>
<th>Address</th>
<th>Land Share</th>
<th>Tree Share</th>
<th>Structure Share</th>
<th>Pan-baroz Share</th>
<th>Barga Share</th>
<th>Police Station</th>
<th>Portion</th>
</tr>

            <?php 
for($i=0;$i<20;$i++)
{
?>
<tr>
<td><?php echo $replot['Land']['rsplot_no']; ?></td>
<?php echo $this->Form->input('owner.'.$i.'.lacase_id',array('type'=>'hidden','value'=>$lacase['Lacase']['id'])); ?>
<?php echo $this->Form->input('owner.'.$i.'.user_id',array('label'=>false,'value'=>$this->Session->read('UserAuth.User.id'),'type'=>'hidden')); ?>
<?php echo $this->Form->input('owner.'.$i.'.land_id',array('label'=>false,'value'=>$land_id,'type'=>'hidden')); ?>
<td width = 30%><?php echo $this->Form->input('owner.'.$i.'.name',array('label'=>false,'required'=>false)); ?></td>
<td><?php echo $this->Form->input('owner.'.$i.'.relation',array('label'=>false,'options'=>$opt));?></td>

<td  width = 30%><?php echo $this->Form->input('owner.'.$i.'.parent',array('label'=>false,'required'=>false,
										'onfocus'=>"copyValueParent($i)",'required'=>false));?></td>
<td><?php echo $this->Form->input('owner.'.$i.'.bargadar',array('label'=>false,'options'=>$optBargadar,
																'onblur'=>'toggleBargaShare(this,'.$i.')'));?> 
                                                                
</td>
                                        
<td width = 20%><?php echo $this->Form->input('owner.'.$i.'.address',array('type'=>'text','label'=>false,'required'=>false,
										'onfocus'=>"copyValueAddress($i)",'required'=>false)); ?></td>
<td><?php echo $this->Form->input('owner.'.$i.'.share',array('label'=>false,
										'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)',
										'required'=>false,'value'=>0.000,'class'=>'smalltext'));?> </td>
<td><?php if($replot['Land']['tree_area'] > 0) 
		echo $this->Form->input('owner.'.$i.'.treeshare',array('label'=>false,
					'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0));
			else
				echo $this->Form->input('owner.'.$i.'.treeshare',array('label'=>false,
				'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0,'readonly'=>true));?> 
</td>
<td><?php  if($replot['Land']['structure_area'] > 0)
			echo $this->Form->input('owner.'.$i.'.structureshare',array('label'=>false,
					'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0));
			else
				echo $this->Form->input('owner.'.$i.'.structureshare',array('label'=>false,
					'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0,'readonly'=>true));?></td>
<td ><?php if($replot['Land']['pan_baroz_area'] > 0)
			echo $this->Form->input('owner.'.$i.'.panbarozshare',array('label'=>false,
					'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0));
			else
				echo $this->Form->input('owner.'.$i.'.panbarozshare',array('label'=>false,
					'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)','required'=>false,'value'=>0,'readonly'=>true));?> </td>

<td><?php echo $this->Form->input('owner.'.$i.'.bargashare',array('label'=>false,
										'readonly'=>'readonly',
										'onblur'=>"showTotalShare($i)",'onkeyup'=>'checkvalue(this)',
										'required'=>false,'value'=>0.000));?>

</td>                                        
<td  width = 20%><?php echo $this->Form->input('owner.'.$i.'.police_station',array('label'=>false,
					'onfocus'=>"copyValuePoliceStation($i)",'required'=>false)); ?></td>

<?php echo $this->Form->input('owner.'.$i.'.varified',array('type'=>'hidden','value'=>'0')); ?>
<td><?php echo $this->Form->input('owner.'.$i.'.portion',array('label'=>false,'options'=>$optp));?> </td>
</tr>


<?php
}
?>
</table>
<div class="podbar">
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--</div>-->
<?php
endif;
?>