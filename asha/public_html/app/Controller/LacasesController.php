<?php
App::uses('AppController', 'Controller');
/**
 * Lacases Controller
 *
 * @property Lacase $Lacase
 */
class LacasesController extends AppController {
	
	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Lacase.id' => 'desc'
        )
    );

/**
 * index method
 *
 * @return void
 */


/* function to prepare calculation sheet */
 	public function calculationsheet($id=null,$type=null) 
	{
				
		App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf.php'));
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
			
		$this->set('fpdf', new FPDF('L','cm','A3'));
		$this->set('data', 'Hello, PDF world');
		//$this->Classified->recursive = 0;
		
		$lacase=$this->Lacase->findById($id);
		
		$this->loadModel('Owner');
				
				$this->Owner->recursive=1;
				
				$this->Owner->bindModel(array('hasMany'=>array('LandsOwner')));
				 $owners=$this->Owner->find('all',array(
					'conditions'=>array('Owner.lacase_id'=>$id),
					'fields'=>array('Owner.id','Owner.name','Owner.parent',
					'Owner.relation','Owner.address','Owner.police_station',
						'Owner.varified','Owner.lacase_id')));
						
		$this->Lacase->PlotEstimate->recursive = -1;				
		$plotTotal = $this->Lacase->PlotEstimate->find('first',array(
											'conditions' => array('PlotEstimate.lacase_id' => $id,
																	'PlotEstimate.calculation_type'=>$type),
											'fields' => array('sum(value)','sum(eighty_paid)')
																  
											));
											
				$this->set('plotTotal',$plotTotal);
				
				$this->set('lacase',$lacase);
				$this->set('owners',$owners);
				$this->set('type',$type);
				$this->render('calculationsheet');
	}



/* `End of Function Calculation Sheet */

	public function application($id=null,$bargadar='N')
	{

		App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf.php'));
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->set('fpdf', new FPDF('P','cm','A4'));
		$this->set('data', 'Hello, PDF world');
		$lacase=$this->Lacase->findById($id);
		$this->loadModel('Owner');
				$this->Owner->recursive=1;
				$this->Owner->bindModel(array('hasMany'=>array('LandsOwner')));
				$owners=$this->Owner->find('all',array(
					'conditions'=>array('Owner.lacase_id'=>$id,'Owner.bargadar' => $bargadar),
					'order' => array('Owner.name' => 'ASC'),
					'fields'=>array('Owner.id','Owner.name','Owner.parent','Owner.relation',
						'Owner.address','Owner.police_station',
						'Owner.varified','Owner.lacase_id')));
				$this->set('lacase',$lacase);
				$this->set('owners',$owners);
		$this->render('application');
	}

 	public function cc($id=null,$bargadar='N') 
	{
		App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf.php'));
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->set('fpdf', new FPDF('P','cm','A4'));
		$this->set('data', 'Hello, PDF world');
		$lacase=$this->Lacase->findById($id);
		$this->loadModel('Owner');
				$this->Owner->recursive=1;
				$this->Owner->bindModel(array('hasMany'=>array('LandsOwner')));
				$owners=$this->Owner->find('all',array(
					'conditions'=>array('Owner.lacase_id'=>$id,'Owner.bargadar'=>$bargadar),
					'order'=>array('Owner.name'=>'ASC'),
					'fields'=>array('Owner.id','Owner.name','Owner.parent','Owner.relation',
								'Owner.address','Owner.police_station',
						'Owner.varified','Owner.lacase_id')));						
				$this->set('lacase',$lacase);
				$this->set('owners',$owners);	
		 $this->render('cc');
		
	}

	public function application13($id=null) 
	{
	
	App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf_13.php'));
	App::import('Vendor', 'CurrencyToWords', array('file' => 'print/numbertoword.php'));

	$this->layout = 'pdf'; //this will use the pdf.ctp layout
		
	$this->set('fpdf', new FPDF('P','cm','A4'));
	$this->set('c2w', new CurrencyToWords());
	$this->set('data', 'Hello, PDF world');
	//$this->Classified->recursive = 0;
	$lacase=$this->Lacase->findById($id);
	$this->set('lacase',$lacase);
	//debug($lacase);
	
	/* SQL by Prasenjit Mukherjee */
	
	/* EDIT BY Prasenjit & Siddhartha */
	
	/* Query to find Estimate of LAND for FORM 13 */
	$sql = "SELECT  
				sum(value) as value,
				sum(acquisitioned_areas_value),
				old_rate,
				sum(old_value),
				sum(eighty_paid),
				sum(old_eighty),
				newrate,
				sum(newvalue),
				sum(newvalue_tree_eighty),
				name
		FROM
				( SELECT `lands`.acquisitioned_areas_value,classifications.name,lands.id 	
				  FROM `lands`,`classifications` 
				  WHERE `lands`.classification_id =`classifications`.id 
				  AND `lands`.lacase_id = ".$id."
				  ORDER by name) as 	
				  LandClassification,
				( SELECT 				
					old_rate,
					sum(value) as value,
					sum(old_value) as old_value,
					sum(eighty_paid) as eighty_paid,
					sum(old_eighty) as old_eighty,
					newrate,
					sum(newvalue) as newvalue,
					sum(newvalue_tree_eighty) as newvalue_tree_eighty,
					land_id,
					lacase_id
			  FROM				`estimates`
			  WHERE				`estimates`.calculation_type = 'land'
			  AND `estimates`.lacase_id = ".$id."
			  GROUP BY 			land_id) As Estimate
			  WHERE LandClassification.id = Estimate.land_id 
			  AND Estimate.lacase_id = ".$id."
			  GROUP BY name			ORDER BY name ASC";
			  
				
	$landclassifications = $this->Lacase->query($sql);
	
	/* Find total of land */
	$sqlTotal = str_replace("GROUP BY name","",$sql);
		
	
	/* Find Estimate for TREE */
	$sqlTree = str_replace("calculation_type = 'land'",
								"calculation_type = 'tree'",$sqlTotal);
	$resultTree = $this->Lacase->query($sqlTree);	
	$resultTree[0]['LandClassification']['name'] = 'Tree';
	
	$landclassifications[] = $resultTree[0];


	/* Find Estimate for STRUCTURE */
	$sqlStructure = str_replace("calculation_type = 'land'",
								"calculation_type = 'structure'",$sqlTotal);
	
	$resultStructure = $this->Lacase->query($sqlStructure);	
	
	$resultStructure[0]['LandClassification']['name'] = 'Structure';
		$landclassifications[] = $resultStructure[0];

	/* Find Estimate for Panbaroz */
	$sqlPanbaroz = str_replace("calculation_type = 'land'",
								"calculation_type = 'panbaroz'",$sqlTotal);
	$resultPanbaroz = $this->Lacase->query($sqlPanbaroz);	
	
	$resultPanbaroz[0]['LandClassification']['name'] = 'Panbaroz';	
	$landclassifications[] = $resultPanbaroz[0];
	
	$sqlTotal = str_replace("`estimates`.calculation_type = 'land'
			 						 AND"," ",$sqlTotal);
	$total_of_lands = $this->Lacase->query($sqlTotal);
	
	$total_of_lands[0]['Estimate']['old_rate'] = ' '; 
	$total_of_lands[0]['Estimate']['newrate'] = ' ';
	$total_of_lands[0]['LandClassification']['name'] = 'Total';
	$this->set('total_of_lands',$total_of_lands);
	
	
	/* FIND TOTAL OF INTEREST AND SOLATIUM FOR OTHER LANDS */
	
	$est_barga=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.lacase_id'=>$id,'Estimate.calculation_type'=>'barga'),
							'fields'=>array(							
							'sum(value)')));	



	/* Done finding total interest */
	/*$lands = $this->Lacase->Land->find('all',array(
							'conditions'=>array('Land.lacase_id'=>$lacase['Lacase']['id']),
							'fields'=>array('Classification.id',
											'Classification.name',
											'sum(Land.acquisitioned_areas_value)',
											'Classification.old_value',
											'Classification.new_value'),
							'group'=>array('Land.classification_id')));
 
	$this->set('lands',$lands);
	*/
	
	$this->set('landclassifications',$landclassifications);				
	
	$estmates=array();
			
	$est_barga=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.lacase_id'=>$id,'Estimate.calculation_type'=>'barga'),
							'fields'=>array(							
							'sum(value)')));	

	$this->set('est_barga',$est_barga);
	
	/*		$this->set($est_barga);
			$this->set('estimates',$estimates);
			$this->set('estimates_tree',$estimates_tree);
			$this->set('estimates_structure',$estimates_structure);
			$this->set('estimates_panbaroz',$estimates_panbaroz);   
			
	*/
	
	/* $plotEstimate = $this->Lacase->PlotEstimate->find('all',array(
										'conditions'=>array('PlotEstimate.lacase_id' => $id,
															'PlotEstimate.calculation_type <>' => 'Total Barga'),
										'fields'=>array('sum(interest1)',
														'sum(interest2)',
														'sum(interest3)',
														'sum(solatium)',
														'sum(value)')	
										));
	*/
	 $this->loadModel('Estimate');
	 
	 $plotEstimate = $this->Estimate->find('all',array(
										'conditions'=>array('Estimate.lacase_id' => $id,
															'Estimate.calculation_type <>' => 'Total Barga'),
										'fields'=>array('sum(interest1)',
														'sum(interest2)',
														'sum(interest3)',
														'sum(solatium)',
														'sum(value)')	
										));
	
	$this->set('plotEstimate',$plotEstimate);
	
	$this->render('application13');
}
 	public function search()
	{
		if ($this->request->is('post')) {
			//debug($this->request->data);
			#$lacase=$this->Lacase->find('first',array('Lacase.id'=>$this->request->data['Lacase']['search']));
			$lacase=$this->Lacase->findById($this->request->data['Lacase']['search']);
			$this->loadModel('Owner');
			$this->Owner->recursive=1;
			
			//$this->Owner->unBindModel(array('belongsTo'=>array('User')));
			$this->Owner->bindModel(array('hasMany'=>array('LandsOwner')));
			//$this->Owner->bindModel(array('hasMany'=>array('Land')));
			
			$owners=$this->Owner->find('all',array(
				'conditions'=>array('Owner.lacase_id'=>$this->request->data['Lacase']['search']),
				'fields'=>array('Owner.id','Owner.name','Owner.parent','Owner.relation','Owner.address','Owner.police_station',
					'Owner.varified','Owner.lacase_id')));
			//$owners=$this->Owner->find('all',array('conditions'=>array('Owner.id'=>$owners)));
			//debug($owners);
			$this->set('lacase',$this->request->data['Lacase']['search']);
			$this->set('owners',$owners);
			/*$this->set('lacase',$lacase);
			//debug($lacase);
			$sql="select Owner.name,Owner.parent,LandsOwner.land_id from owners as Owner,land_owners as LandsOwner,lands as Land,
			lacases as Lacase
			where Owner.id=LandsOwner.owner_id and LandsOwner.land_id=Land.id and Land.lacase_id=Lacase.id and Lacase.id=6
			order by Owner.name asc";
			$awards=$this->Lacase->query($sql);
			//debug($awards);
			$lands=$this->Lacase->Land->find('all',array(
							'conditions'=>array('Land.lacase_id'=>$lacase['Lacase']['id']),
							'group'=>'Land.id'));
			debug($lands);*/
		}
		//$this->loadModel('Lacase');
	$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
	$this->set('lac', $lac);
		
	}
	
	
	public function reportsearch()
	{
		if ($this->request->is('post')) {
			//debug($this->request->data);
			#$lacase=$this->Lacase->find('first',array('Lacase.id'=>$this->request->data['Lacase']['search']));
			$lacase=$this->Lacase->findById($this->request->data['Lacase']['search']);
			$this->set('lacase',$lacase);
			//debug($lacase);
			//$this->Lacase->Land->recursive=-1;
			$lands=$this->Lacase->Land->find('all',array(
							'conditions'=>array('Land.lacase_id'=>$lacase['Lacase']['id']),
							'fields'=>array('Classification.id',
											'Classification.name',
											'sum(Land.acquisitioned_areas_value)',
											'Classification.old_value',
											'Classification.new_value'),
							'group'=>array('Land.classification_id')));
			//debug($lands);
			$this->set('lands',$lands);
			$estmates=$estmates_tree=$estmates_structure=$estmates_panbaroz=array();
			foreach($lands as $land)
			{
				$l_ids=$this->Lacase->Land->find('list',array(
								'conditions'=>array('Land.classification_id'=>$land['Classification']['id'])));
				//debug($l_ids);
				$est=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.land_id'=>$l_ids,'Estimate.calculation_type'=>'land'),
							'fields'=>array(
							'sum(Estimate.eighty_paid)',
							'sum(interest1)',
							'sum(interest2)',
							'sum(interest3)',
							'sum(solatium)',
							'sum(value)')));
				$est_tree=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.land_id'=>$l_ids,'Estimate.calculation_type'=>'tree'),
							'fields'=>array(
							'sum(old_value)',
							'sum(Estimate.eighty_paid)',
							'sum(interest1)',
							'sum(interest2)',
							'sum(interest3)',
							'sum(solatium)',
							'sum(value)')));
				$est_structure=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.land_id'=>$l_ids,'Estimate.calculation_type'=>'structure'),
							'fields'=>array(
							'sum(old_value)',
							'sum(Estimate.eighty_paid)',
							'sum(interest1)',
							'sum(interest2)',
							'sum(interest3)',
							'sum(solatium)',
							'sum(value)')));
				$est_panbaroz=$this->Lacase->Land->Estimate->find('all',array(
							'conditions'=>array('Estimate.land_id'=>$l_ids,'Estimate.calculation_type'=>'panbaroz'),
							'fields'=>array(
							'sum(old_value)',
							'sum(Estimate.eighty_paid)',
							'sum(interest1)',
							'sum(interest2)',
							'sum(interest3)',
							'sum(solatium)',
							'sum(value)')));
				//debug($est);
				$estimates[]=$est;
				$estimates_tree[]=$est_tree;
				$estimates_structure[]=$est_structure;
				$estimates_panbaroz[]=$est_panbaroz;
			}
			//debug($estimates);
			$this->set('estimates',$estimates);
			$this->set('estimates_tree',$estimates_tree);
			$this->set('estimates_structure',$estimates_structure);
			$this->set('estimates_panbaroz',$estimates_panbaroz);
		}
		//$this->loadModel('Lacase');
		$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('lac', $lac);
	}
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->Lacase->recursive = 0;
		$this->set('lacases', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Lacase->id = $id;
		if (!$this->Lacase->exists()) {
			throw new NotFoundException(__('Invalid lacase'));
		}
		$this->set('lacase', $this->Lacase->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Lacase']['la_case_number']=str_replace("/"," of ",$this->request->data['Lacase']['la_case_number']);
			$this->Lacase->create();
			if ($this->Lacase->save($this->request->data)) {
				$this->Session->setFlash(__('The LA case has been saved. You may edit it at any later point of time.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The LA Case could not be saved. Please, try again.'));
			}
		}
		$offices = $this->Lacase->Office->find('list');
		$users = $this->Lacase->User->find('list');
		$this->set(compact('offices', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Lacase->id = $id;
		if (!$this->Lacase->exists()) {
			throw new NotFoundException(__('Invalid lacase'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lacase->save($this->request->data)) {
				$this->Session->setFlash(__('The lacase has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lacase could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Lacase->read(null, $id);
		}
		$offices = $this->Lacase->Office->find('list');
		$users = $this->Lacase->User->find('list');
		$this->set(compact('offices', 'users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Lacase->id = $id;
		if (!$this->Lacase->exists()) {
			throw new NotFoundException(__('Invalid lacase'));
		}
		if ($this->Lacase->delete()) {
			$this->Session->setFlash(__('Lacase deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Lacase was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
