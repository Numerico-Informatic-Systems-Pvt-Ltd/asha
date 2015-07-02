<?php
App::uses('AppController', 'Controller');
/**

 * Lands Controller
 *
 * @property Land $Land
 * @property PaginatorComponent $Paginator
 */
class LandsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	 public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Land.id' => 'desc'
        )
    );



/* Solatium Bargadar */
public function solatiumbargadar($land_id=null)

	{
		if($land_id!=null)
		{
			$lands=$this->Land->find('first',array('conditions'=>array(
										'Land.id'=>$land_id)));/* Check if records exists in database */
			$this->loadModel('PlotEstimate');
			$plotEstimate = $this->PlotEstimate->find('first',array(
										'conditions'=>array(
										'PlotEstimate.land_id' =>  $lands['Land']['id'],
										'PlotEstimate.calculation_type' => 'Total Barga'
										),
										'fields'=>array('PlotEstimate.id')));
			if(!empty($plotEstimate)){
				echo '<script>window.confirm("All estimates for this plot have been prepared.");</script>';
				$this->Session->setFlash("Estimate for plot: ".$lands['Land']['rsplot_no']." already made.");
				$this->redirect(array(
							'controller'=>'lands','action'=>'solatium'));	
			}
			$this->set('lands',$lands);
			$this->loadModel('Lacase');	
			$this->Lacase->recursive = -1;
			$lacase = $this->Lacase->findById($lands['Land']['lacase_id']);
			$this->set('lacase',$lacase);
			
			$this->loadModel('Classification');
			
			$classification = $this->Classification->find('first',
									array('conditions'=>array(
									'Classification.lacase_id' => $lands['Land']['lacase_id'],
									'Classification.name' => 'JAL'
									)));
			
			$this->set('classification',$classification);
			
			$countOwners = $this->Land->LandsOwner->find('count',array(
												'conditions' => array(
													'LandsOwner.barga_share >' => 0,
													'LandsOwner.land_id' => $land_id,
													'LandsOwner.bargadar' => 'Y')
												));	
			 $this->set('countOwners',$countOwners);

		}
		
		
	}
	public function updateestimatebargadar()
	{
		if ($this->request->is('post')) {
			
			$this->loadModel('Estimate');
			$i=0;
			$lacase_id = $this->request->data['Land']['0']['lacase_id'];
			foreach($this->request->data['Land'] as $land)
			{	
				if($i == 0)
				{
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $lacase_id,
								'calculation_type'=>'Total Barga',
								'barga_percentage' => $land['barga_percentage'],
								'shared_area'=>$land['area'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->loadModel('PlotEstimate');
					$this->PlotEstimate->create();
					$this->PlotEstimate->save($data);
					$this->Session->write('PlotEstimateID',$this->PlotEstimate->getInsertID());
					$i=101;
					
				}
				else
				{
					if(isset($land['id'])):
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $lacase_id,
								'plot_estimate_id' => $this->Session->read('PlotEstimateID'),
								'owner_id'=>$land['owner'],
								'calculation_type'=>'tree',
								'calculation_type'=>'barga',
								'barga_percentage'=>$land['barga_percentage'],	
								'shared_area'=>$land['area_clone'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->Estimate->create();
					$this->Estimate->save($data);
					endif;
				}
				
				$i++;
			}
			$this->Session->setFlash(__('Estimate for this plot has been prepared.'));
			$this->redirect(array('controller'=>'lands','action' => 'solatium',
										$this->request->data['Land'][0]['id']));
			$this->redirect(array('controller'=>'estimates','action' => 'index'));
		}
		
	}

/* End of solatium for bargadar */

	public function updateestimate()
	{
		if ($this->request->is('post')) {
			$this->loadModel('Estimate');
			$i=0;
			$lacase_id = $this->request->data['Land']['0']['lacase_id'];
			foreach($this->request->data['Land'] as $land)
			{
				if($i == 0)
				{
					
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $lacase_id,
								'calculation_type'=>'Total Land',
								'shared_area'=>$land['area'],
								'old_rate'=>$land[1],
								
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->loadModel('PlotEstimate');
					$this->PlotEstimate->create();
					$this->PlotEstimate->save($data);
					$this->Session->write('PlotEstimateID',$this->PlotEstimate->getInsertID());
					$i=101;
				}
				else
				{
					if(isset($land)):
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $lacase_id,
								'owner_id'=>$land['owner'],
								'plot_estimate_id' => $this->Session->read('PlotEstimateID'),
								'calculation_type'=>'land',
								'shared_area'=>$land['area_clone'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->Estimate->create();
					$this->Estimate->save($data);
					endif;
				}
				$i++;
			}
			$this->Session->setFlash(__('The Land Share Value Calculation has been saved.'));
		$this->redirect(array('controller'=>'lands','action' => 'solatiumtree',$this->request->data['Land'][0]['id']));
		}
		
	}
	public function solatiumtree($land_id=null)
	{
		if($land_id!=null)
		{
			$lands=$this->Land->find('first',array('conditions'=>array(
										'Land.id'=>$land_id)));/* Check if records exists in database */
			$this->loadModel('PlotEstimate');
			$plotEstimate = $this->PlotEstimate->find('first',array(
										'conditions'=>array(
										'PlotEstimate.land_id' =>  $lands['Land']['id'],
										'PlotEstimate.calculation_type' => 'Total Tree'
										)));
			if(!empty($plotEstimate)){
				echo '<script>window.confirm("Tree estimate already made. 
							Do you want to continue for tree estimate?");</script>';
				$this->Session->setFlash("Tree estimate already made.");
				$this->redirect(array(
							'controller'=>'lands','action'=>'solatiumstructure',$lands['Land']['id']));	
			}
			$this->set('lands',$lands);
			$this->loadModel('Lacase');	
			$this->Lacase->recursive = -1;
			$lacase = $this->Lacase->findById($lands['Land']['lacase_id']);
			$this->set('lacase',$lacase);
			 $countOwners = $this->Land->LandsOwner->find('count',array(
												'conditions' => array(
													'LandsOwner.tree_share >' => 0,
													'LandsOwner.land_id' => $land_id,
													'LandsOwner.bargadar' => 'N')
												));	
			 $this->set('countOwners',$countOwners);
		}
	}
	public function updateestimatetree()
	{
		if ($this->request->is('post')) {
			$this->loadModel('Estimate');
			$i=0;
			foreach($this->request->data['Land'] as $land)
			{
				if($i == 0)
				{
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'calculation_type'=>'Total Tree',
								'shared_area'=>$land['area'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					
					$this->loadModel('PlotEstimate');
					$this->PlotEstimate->create();
					$this->PlotEstimate->save($data);
					$this->Session->write('PlotEstimateID',$this->PlotEstimate->getInsertID());
					$i=101;
				}
				else
				{
					if(isset($land)):
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'plot_estimate_id' => $this->Session->read('PlotEstimateID'),
								'owner_id'=>$land['owner'],
								'calculation_type'=>'tree',
								'shared_area'=>$land['area_clone'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->Estimate->create();
					$this->Estimate->save($data);
					endif;
				}
				$i++;
			}
			$this->Session->setFlash(__('The Tree Share Value Calculation has been saved.'));
			$this->redirect(array('controller'=>'lands','action' => 'solatiumstructure',$this->request->data['Land'][0]['id']));
		}
		
	}
	public function solatiumstructure($land_id=null)
	{
		if($land_id!=null)
		{
			$lands=$this->Land->find('first',array('conditions'=>array(
										'Land.id'=>$land_id)));
			
			$this->loadModel('PlotEstimate');
			$plotEstimate = $this->PlotEstimate->find('first',array(
										'conditions'=>array(
										'PlotEstimate.land_id' =>  $lands['Land']['id'],
										'PlotEstimate.calculation_type' => 'Total Structure'
										)));
			if(!empty($plotEstimate)){
				echo '<script>
				window.confirm("Structure estimate already made.
						 Do you want to continue for tree estimate?");</script>';
				$this->Session->setFlash("Structure estimate already made.");
				$this->redirect(array(
							'controller'=>'lands','action'=>'solatiumpanbaroz',$lands['Land']['id']));	
			}

			$this->set('lands',$lands);
			$this->loadModel('Lacase');	
			$this->Lacase->recursive = -1;
			$lacase = $this->Lacase->findById($lands['Land']['lacase_id']);
  		    $this->set('lacase',$lacase);
			 
			 $countOwners = $this->Land->LandsOwner->find('count',array(
												'conditions' => array(
													'LandsOwner.structure_share >' => 0,
													'LandsOwner.land_id' => $land_id,
													'LandsOwner.bargadar' => 'N')
												));	
			 $this->set('countOwners',$countOwners);
		}
		
		
	}
	public function updateestimatestructure()
	{
		if ($this->request->is('post')) {
			$this->loadModel('Estimate');
			$i=0;
			foreach($this->request->data['Land'] as $land)
			{
				if($i == 0)
				{
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'calculation_type'=>'Total Structure',
								'shared_area'=>$land['area'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->loadModel('PlotEstimate');
					$this->PlotEstimate->create();
					$this->PlotEstimate->save($data);
					$this->Session->write('PlotEstimateID',$this->PlotEstimate->getInsertID());
					$i=101;
				}
				else
				{
					if(isset($land)):
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'plot_estimate_id' => $this->Session->read('PlotEstimateID'),
								'owner_id'=>$land['owner'],
								'calculation_type'=>'structure',
								'shared_area'=>$land['area_clone'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->Estimate->create();
					$this->Estimate->save($data);
					endif;
				}
				$i++;
			}
			$this->Session->setFlash(__('The Structure Share Value Calculation has been saved.'));
			$this->redirect(array('controller'=>'lands','action' => 'solatiumpanbaroz',$this->request->data['Land'][0]['id']));
		}
	}

	public function solatiumpanbaroz($land_id=null)
	{
		if($land_id!=null)
		{
			$lands=$this->Land->find('first',array('conditions'=>array(
										'Land.id'=>$land_id)));
			
			$this->loadModel('PlotEstimate');
			$plotEstimate = $this->PlotEstimate->find('first',array(
										'conditions'=>array(
										'PlotEstimate.land_id' =>  $lands['Land']['id'],
										'PlotEstimate.calculation_type' => 'Total Panbaroz'
										)));
			if(!empty($plotEstimate)){
				echo '<script>
				window.confirm("Estimate for PAN BAROZ has been prepared.);</script>';
				$this->Session->setFlash("Estimate for plot PAN BAROZ has been prepared.");
				$this->redirect(array(
							'controller'=>'lands','action'=>'solatiumbargadar',$lands['Land']['id']));	
			}
			$this->set('lands',$lands);
			$this->loadModel('Lacase');	
			$this->Lacase->recursive = -1;
			$lacase = $this->Lacase->findById($lands['Land']['lacase_id']);
  		    $countOwners = $this->Land->LandsOwner->find('count',array(
												'conditions' => array(
													'LandsOwner.tree_share >' => 0,
													'LandsOwner.land_id' => $land_id,
													'LandsOwner.bargadar' => 'N')
												));	
			 $this->set('countOwners',$countOwners);

			 $this->set('lacase',$lacase);
		}
		
		
	}
	public function updateestimatepanbaroz()
	{
		
		if ($this->request->is('post')) {
			$this->loadModel('Estimate');
			$i=0;
			foreach($this->request->data['Land'] as $land)
			{
				if($i == 0)
				{
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'calculation_type'=>'Total Panbaroz',
								'shared_area'=>$land['area'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					
					$this->loadModel('PlotEstimate');
					$this->PlotEstimate->create();
					$this->PlotEstimate->save($data);
					$this->Session->write('PlotEstimateID',$this->PlotEstimate->getInsertID());
					$i=101;
				}
				else
				{
					if(isset($land)):
					$data=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land['id'],
								'lacase_id' => $land['lacase_id'],
								'plot_estimate_id' => $this->Session->read('PlotEstimateID'),
								'owner_id'=>$land['owner'],
								'calculation_type'=>'panbaroz',
								'shared_area'=>$land['area_clone'],
								'old_rate'=>$land[1],
								'old_value'=>$land[2],
								'eighty_paid'=>$land[3],
								'old_eighty'=>$land[5],
								'oldtree_eighty'=>$land[7],
								'interest1'=>$land[9],
								'interest2'=>$land[10],
								'newrate'=>$land[11],
								'newvalue'=>$land[12],
								'newvalue_trees'=>$land[13],
								'newvalue_tree_eighty'=>$land[14],
								'interest3'=>$land[15],
								'solatium'=>$land[16],
								'value'=>$land[17],
								'active'=>1
							);
					$this->Estimate->create();
					$this->Estimate->save($data);
					endif;
				}
				$i++;
			}
			$this->Session->setFlash(__('The Pan-Baroz Share Value Calculation has been saved.'));
			$this->redirect(array('controller'=>'lands',
			 					'action' => 'solatiumbargadar',$this->request->data['Land'][0]['id']));
		}
	}
	public function checkduplicateplot() {
		
		$this->layout = 'ajax';
		$test = 'hi';
		$this->set('test',$test);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Land->unBindModel(array('hasOne'=>array('PlotEstimate')),false);
		
	 	$this->Paginator->settings = $this->paginate;
		$this->Land->recursive = 0;
		$this->set('lands', $this->Paginator->paginate());
		$this->set('lacases',$this->Land->Lacase->find('list'));
	}
	public function search_by_lacase($lacase_id = NULL) {
		
		if($this->request->is('post')):
			$lacase_id = $this->request->data['Land']['lacase_id'];
		endif;
		
		if(sizeof($lacase_id)):
		 	$this->Paginator->settings = $this->paginate;
			$this->Land->recursive = 0;
			$this->set('lands', $this->Paginator->paginate(array('Land.lacase_id'=>$lacase_id,
																 'PlotEstimate.calculation_type' 
																 				=> 'Total Land')));
			$this->set('lacase_id',$lacase_id);
			
		endif;	
		
			$this->set('lacases',$this->Land->Lacase->find('list'));
			$this->render('index');
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null)
	{
		if (!$this->Land->exists($id)) 
		{
			throw new NotFoundException(__('Invalid land'));
		}
		$options = array('conditions' => array('Land.' . $this->Land->primaryKey => $id));
		$this->set('land', $this->Land->find('first', $options));
	}	
	public function viewplot()
	{	
		$this->Land->recursive = -1;
		$owners=$this->Land->find('all',array('conditions'=>array(
		'Land.lacase_id'=>$this->request->data['Owner']['lacase_id']),'fields'=>array('id','rsplot_no')));
		$this->set('owners',$owners);
		$this->layout='ajax';
	}
	
	public function viewplotbylacase()
	{
		$this->Land->recursive = 0;
		$this->Land->unBindModel(array('hasOne'=>array('PlotEstimate')));
		$owners=$this->Land->find('all',array('conditions'=>array(
		'Land.lacase_id'=>$this->request->data['Land']['caseno']),'fields'=>array('id','rsplot_no')));
		$this->set('owners',$owners);
		$this->layout='ajax';
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
	{
		if ($this->request->is('post')) 
		{
			$this->Land->create();
			if ($this->Land->save($this->request->data)) 
			{
				$this->Session->setFlash(__('The land has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The land could not be saved. Please, try again.'));
			}
		}
		
		$offices = $this->Land->Office->find('list');
		$users = $this->Land->User->find('list');
		$lacases = $this->Land->Lacase->find('list');
		$acquisitionedAreas = $this->Land->AcquisitionedArea->find('list');
		$landValues = $this->Land->LandValue->find('list');
		$this->set(compact('offices', 'users', 'lacases', 'acquisitionedAreas', 'landValues'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editplot($id = null) 
	{
		$this->Land->id=$id;
		if (!$this->Land->exists($id)) 
		{
			throw new NotFoundException(__('Invalid land'));
		}
		if ($this->request->is('post')|| $this->request->is('put')) 
		{
			if ($this->Land->save($this->request->data)) {
				$this->Session->setFlash(__('The land has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The land could not be saved. Please, try again.'));
			}
		} 
		else
		{
			$options = array('conditions' => array('Land.' . $this->Land->primaryKey => $id));
			$this->request->data = $this->Land->find('first', $options);
		}
		$users = $this->Land->User->find('list');
		$lacases = $this->Land->Lacase->find('list');
		$acquisitionedAreas = $this->Land->AcquisitionedArea->find('list');
		$this->set(compact('users', 'lacases', 'acquisitionedAreas'));
	}//basic edit function
	
	public function edit() {
		
			if ($this->request->is('post'))
			{
				
				$lands = $this->request->data['Land'];
				$i=0;
				$this->loadModel('Estimate');
				foreach ($lands as $land):
					$data = array(
								'lacase_id' =>$land['lacase_id'],
								'rsplot_no' => $land['rsplot_no'],
								'classification_id' =>$land['classification_id'],
								'status' => $land['portion'],
								'portion' => $land['portion'],
								'khatian_no' => $land['khatian_no'],
								'mouja' => $land['mouja'],
								'jl_no' => $land['jl_no'],
								'dag_no' => $land['dag_no'],
								'police_station' => $land['police_station'],
								'acquisitioned_areas_value' => $land['acquisitioned_areas_value'],
								'total_barga_effected_area' => $land['total_barga_effected_area'],
								'tree_area' => $land['tree_area'],
								'structure_area' => $land['structure_area'],
								'pan_baroz_area' => $land['pan_baroz_area']
								);
					if($land['rsplot_no']!='')
					{
						$this->Land->create();
						$this->Land->save($data);
						$land_id=$this->Land->getLastInsertID();
						$data1=array('user_id'=>$this->Session->read('UserAuth.User.id'),
								'land_id'=>$land_id);
						
						$this->Estimate->create();
						$this->Estimate->save($data1);
						$this->loadModel('AcquisitionedArea');						
						$acquisitionedAreaData = $this->AcquisitionedArea->find('first',
											array('conditions'=>array('AcquisitionedArea.land_id'=>$land_id)));
						if(!$acquisitionedAreaData) :
							$this->request->data['AcquisitionedArea']['land_id'] = $land_id;
							$this->request->data['AcquisitionedArea']['total'] 
										= $land['acquisitioned_areas_value'];
							$this->AcquisitionedArea->create();
							$this->AcquisitionedArea->save($this->request->data);		
						else:
							$this->AcquisitionedArea->id=$acquisitionedAreaData['AcquisitionedArea']['id'];
							$this->request->data['AcquisitionedArea']['land_id'] = $land_id;
							$this->AcquisitionedArea->save($this->request->data);		
						endif;
					}
					
				$i++;
				endforeach;
				$this->Session->setFlash(__('The data have been saved'));
					$this->redirect(array('action' => 'index'));
			}
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null)
	{	
		$this->Land->id = $id;
		if (!$this->Land->exists()) {
			throw new NotFoundException(__('Invalid land'));
		}
		//$this->request->onlyAllow('post', 'delete');
		
		if ($this->Land->delete()) {
			$this->Session->setFlash(__('The land has been deleted.'));
		} else {
			$this->Session->setFlash(__('The land could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	 
	public function solatium()
	{
		
		$this->Paginator->settings = $this->paginate;
	
		if ($this->request->is('post')) 
		{
			$lands=$this->Land->find('first',array('conditions'=>array(
										'Land.lacase_id'=>$this->request->data['Land']['caseno'],
										'Land.id'=>$this->request->data['Land']['rsplotno'])));
			
			/* Check if records exists in database */
			$this->loadModel('PlotEstimate');
			$plotEstimate = $this->PlotEstimate->find('first',array(
										'conditions'=>array(
										'PlotEstimate.land_id' =>  $lands['Land']['id'],
										'PlotEstimate.calculation_type' => 'Total Land'
										)));
			if(!empty($plotEstimate)){
				echo '<script>window.confirm("Lands estimate already made.
							 Do you want to continue for tree estimate?");</script>';
				$this->Session->setFlash("Lands estimate already made.");
				$this->redirect(array('controller'=>'lands','action'=>'solatiumtree',$lands['Land']['id']));	
			}
	
			$this->set('lands',$lands);
			$this->loadModel('Lacase');	
			$this->Lacase->recursive = -1;
			$lacase = $this->Lacase->findById($this->request->data['Land']['caseno']);
			$this->set('lacase',$lacase);
					
			 $land_id = $this->request->data['Land']['rsplotno'];	
			 $countOwners = $this->Land->LandsOwner->find('count',array(
												'conditions' => array(
													'LandsOwner.shared_area >' => 0,
													'LandsOwner.land_id' => $land_id,
													'LandsOwner.bargadar' => 'N')
												));	
												
												
			 $this->set('countOwners',$countOwners);

		}
		$this->loadModel('Lacase');
		$caseno=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('caseno',$caseno);
		$classifications = $this->Land->Classification->find('list');
		$this->set('classifications',$classifications);
		
	}
	
	public function update($id = null) {
		
		
			if ($this->request->is('post') || $this->request->is('put'))
			{
				$estimates = $this->request->data['Land'];
				$this->loadModel('Estimate');
				foreach ($estimates as $estimate):
				if($estimate['3_check'] > $estimate[3])
				{
					$sql1="update land_owners set paid=0 where land_id=".$estimate['id'];
					$this->Estimate->query($sql1);
					$sql=$this->Estimate->query("update estimates set old_rate='".$estimate[1]."',
					old_value='".$estimate[2]."',eighty_paid='".$estimate[3]."',
					tree_value='".$estimate[4]."',old_eighty='".$estimate[5]."',
					oldtree_eighty='".$estimate[7]."',interest1='".$estimate[9]."',
					interest2='".$estimate[10]."',newrate='".$estimate[11]."',
					newvalue='".$estimate[12]."',newvalue_trees='".$estimate[13]."',
					newvalue_tree_eighty='".$estimate[14]."',interest3='".$estimate[15]."',
					 value='".$estimate[17]."',solatium='".$estimate[16]."' where land_id=".$estimate['id']);
				}
				else
				{
					$sql1="update land_owners set paid=1 where land_id=".$estimate['id'];
					$this->Estimate->query($sql1);
					$sql=$this->Estimate->query("update estimates set old_rate='".$estimate[1]."',
					old_value='".$estimate[2]."',eighty_paid='".$estimate[3]."',
					tree_value='".$estimate[4]."',old_eighty='".$estimate[5]."',
					oldtree_eighty='".$estimate[7]."',interest1='".$estimate[9]."',
					interest2='".$estimate[10]."',newrate='".$estimate[11]."',
					newvalue='".$estimate[12]."',newvalue_trees='".$estimate[13]."',
					newvalue_tree_eighty='".$estimate[14]."',interest3='".$estimate[15]."',
					 value='".$estimate[17]."',solatium='".$estimate[16]."' where land_id=".$estimate['id']);
				}
				
				endforeach;
				$this->Session->setFlash(__('The estimates have been saved'));
				$this->redirect(array('controller'=>'estimates','action' => 'index'));				
			}
		$this->autoRender = false;
		$this->render('index');	
	}
	
	public function lac()
	{
		if ($this->request->is('post')) 
		{
			
			$this->loadModel('Lacase');
			$lacase=$this->Lacase->find('first',array('conditions'=>array('Lacase.id'
							=>$this->request->data['Land']['lac_no'])));
			$this->set('lacase',$lacase);
			$classifications = $this->Land->Classification->find('list',array(
										'conditions'=>array('Classification.lacase_id'
							=>$this->request->data['Land']['lac_no'])));
			$this->set('classifications',$classifications);	
		}		
			
		$this->loadModel('Lacase');	
		$lac_no=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('lac_no',$lac_no);
   }
   
   public function cal()
   {
		if ($this->request->is('post')) 
		{
			$la=$this->Land->find('all',array('condition',
										array('Land.lacase_id'=>$this->request->data['Land']['lac_no']),
											'fields'=>array('rsplot_no')));	
			$this->set('la',$la);	
		
		}		
		
		$this->loadModel('Lacase');	
		$lac_no=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('lac_no',$lac_no);
   }
   
   public function insert()
   {
	  if ($this->request->is('post'))
	  {
				
				$lands = $this->request->data['Land'];
				$i=0;
				$this->loadModel('AcquisitionedArea');
				foreach ($lands as $land):
					if($land['total'] != 0)
					{
						$check=$this->AcquisitionedArea->find('count',
									array('conditions'=>array('AcquisitionedArea.land_id'=>$land['land_id'])));
						if($check > 0)
						{
							$id=$this->AcquisitionedArea->find('first',array('conditions'
									=>array('AcquisitionedArea.land_id'=>$land['land_id'])));
							$this->AcquisitionedArea->id=$id;
							$this->AcquisitionedArea->save($land);
							$this->Land->query("UPDATE lands SET acquisitioned_areas_value =". 
									$land['total']." WHERE id =". $land['land_id']);
							
						}
						else
						{
							$this->AcquisitionedArea->create();
							$this->AcquisitionedArea->save($land);
							$this->Land->query("UPDATE lands SET acquisitioned_areas_value =".
									$land['total']." WHERE id =". $land['land_id']);
						}
				}
				endforeach;
				$this->Session->setFlash(__('The data have been saved'));
					$this->redirect(array('action' => 'cal'));
			}
		
	  }
}