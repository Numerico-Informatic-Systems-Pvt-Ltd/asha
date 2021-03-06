<?php
App::uses('AppController', 'Controller');
/**
 * Owners Controller
 *
 * @property Owner $Owner
 */
class OwnersController extends AppController {
	
	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 30,
        'order' => array(
            'Owner.id' => 'desc'
        )
    );


/**
 * index method
 *
 * @return void
 */
 	public function search($lacase_id=null)
	{

		if ($this->request->is('post') || 
							!empty($lacase_id)) {
			
			if(empty($lacase_id))
				$lacase_id = $this->request->data['Lacase']['search'];
				
			$this->Owner->recursive=1;
			
			$this->Owner->unBindModel(array(
					'hasMany'=>array('Estimate')
					));
			
			$this->paginate=array('order'=>array('Owner.id'=>'DESC'));
			$this->set('owners', $this->paginate(array('Owner.lacase_id'=>$lacase_id)));
			$this->set('lacase_id',$lacase_id);
		}
		
		$this->loadModel('Lacase');
		$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('lac', $lac);
	}
	
	
	public function verify($owner_id=null,$lacase_id=null)
	{
		$this->Owner->id = $owner_id;
		$this->request->data['Owner']['varified']=1;
		if($this->Owner->save($this->request->data))
		{
			$this->Session->setFlash(__('The owner has been varified'));
			$this->redirect(array('action'=>'search',$lacase_id));
		}
	}
	
	public function search_by_name($lacase_id = NULL, $q = NULL) {

		$q_input = $q;
		
		$this->Paginator->settings = $this->paginate;
		
		$this->Owner->recursive = 0; 
		$this->paginate=array('order'=>array('Owner.name'=>'ASC'));

		if ($this->request->is('post')) {
						
				if(!empty($this->request->data['Owner']['q']))
					$q = '%'.$this->request->data['Owner']['q'].'%';
				else
					{
					$q = '%';
					}
						
				$this->set('owners', $this->Paginator->paginate('Owner',array(
											"Owner.name LIKE" => $q,
											"Owner.lacase_id" => 
												$this->request->data['Owner']['lacase_id'])
							));
		
		} else {
			
			if(!empty($q)) 
				$q = '%'.$q.'%';
			else
				$q = '%';
			$this->set('owners', $this->Paginator->paginate('Owner',array(
										"Owner.name LIKE" => $q,
										"Owner.lacase_id" => $lacase_id)
						));

		}
		
		if(isset($this->request->data['Owner']['q']))
			$this->set('q',$this->request->data['Owner']['q']);
		else
			$this->set('q',$q_input);
		
		if(!empty($lacases))
			$this->request->data['Owner']['lacase_id'] = $lacases;

		$lacases = $this->Owner->Lacase->find('list');
		$this->set(compact('lacases',$lacases));		
		
	}
	
	public function index() {

		$this->Paginator->settings = $this->paginate;

		$this->Owner->recursive = 0;
		$this->paginate=array('order'=>array('Owner.id'=>'DESC'));
		$this->set('owners', $this->paginate());
		
		$lacases = $this->Owner->Lacase->find('list');
		$this->set(compact('lacases',$lacases));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Owner->id = $id;
		if (!$this->Owner->exists()) {
			throw new NotFoundException(__('Invalid owner'));
		}
		$this->set('owner', $this->Owner->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
 public function getwonerbyid($id=null)
 {
	 if($id != null)
	 {
		 $owner=$this->Owner->findById($id);
		 return $owner;
	 }
 }
 public function addplot()
 {
	 if($this->request->is('post'))
	 {

		 						
		 $this->set('land_id',$this->request->data['Owner']['rsplotno']);
		 
	 	 $this->loadModel('Lacase');
		 
		 $this->Lacase->recursive = -1;
 		 $lacase = $this->Lacase->find('first',
		 						array('conditions'=>
									array(
										'Lacase.id'=>$this->request->data['Owner']['lacase_id']))
									);	
		 $this->set('lacase',$lacase);
		 
		 $this->loadModel('Land');
		 $replot=$this->Land->find('first',array(
		 'conditions'=>array('Land.id'=>$this->request->data['Owner']['rsplotno'])));
		
		$sql = "SELECT sum(`lands_owners`.`shared_area`) AS `present_total_share` FROM `lands_owners`,`lands`  WHERE 
		 			`lands_owners`.`land_id` = `lands`.`id` 
						AND 
					`lands`.`rsplot_no` = '".$replot['Land']['rsplot_no']."'";
		$present_total_share = $this->Owner->query($sql);
		
		$sql1 = "SELECT sum(`lands_owners`.`tree_share`) AS `present_tree_share` FROM `lands_owners`,`lands`  WHERE 
		 			`lands_owners`.`land_id` = `lands`.`id` 
						AND 
					`lands`.`rsplot_no` = '".$replot['Land']['rsplot_no']."'";
		$present_tree_share = $this->Owner->query($sql1);
		
		$sql2 = "SELECT sum(`lands_owners`.`structure_share`) AS `present_structure_share` FROM `lands_owners`,`lands`  WHERE 
		 			`lands_owners`.`land_id` = `lands`.`id` 
						AND 
					`lands`.`rsplot_no` = '".$replot['Land']['rsplot_no']."'";
		$present_structure_share = $this->Owner->query($sql2);
		
		$sql3 = "SELECT sum(`lands_owners`.`pan_baroz_share`) AS `present_pan_baroz_share` FROM `lands_owners`,`lands`  WHERE 
		 			`lands_owners`.`land_id` = `lands`.`id` 
						AND 
					`lands`.`rsplot_no` = '".$replot['Land']['rsplot_no']."'";
		$present_pan_baroz_share = $this->Owner->query($sql3);

		$sql4 = "SELECT sum(`lands_owners`.`barga_share`) AS `present_barga_share` FROM `lands_owners`,`lands`  WHERE 
		 			`lands_owners`.`land_id` = `lands`.`id` 
						AND 
					`lands`.`rsplot_no` = '".$replot['Land']['rsplot_no']."'";
		$present_barga_share = $this->Owner->query($sql4);

		$this->set('replot',$replot);
		$this->set('present_total_share',$present_total_share);
		$this->set('present_tree_share',$present_tree_share);
		$this->set('present_structure_share',$present_structure_share);
		$this->set('present_pan_baroz_share',$present_pan_baroz_share);
		$this->set('present_barga_share',$present_barga_share);
	
	 }

	$this->loadModel('Lacase');
	$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
	$this->set('lac', $lac);
	
 }
 public function addowner()
 {
	//debug($this->params);
	
	$lacase_id = $this->request->data['owner']['0']['lacase_id'];
	 
	if($this->request->is('post'))
	 {
		 $this->loadModel('LandsOwner');
		 
		 $owners=$this->request->data['owner'];
		 
		 foreach($owners as $owner)
		 {
			 if($owner['name']!=null && $owner['parent']!=null)
			 {
			
			$this->Owner->recursive = -1;
			 $existing_owner = $this->Owner->find('first',array(
			 										'conditions'=>array(
															'Owner.name'=>$owner['name'],	
															'Owner.parent'=>$owner['parent']
														)));
															 
			 if($existing_owner):

				 	$this->Owner->id = $existing_owner['Owner']['id']; 
				
			 else:
			
					$this->Owner->create();	 
			 endif;
			 
			// $this->Owner->create();
			 
			 if($this->Owner->save($owner))
			 
			 {
				 
				 if($existing_owner):
					 $owner_id = $existing_owner['Owner']['id']; 
				 else:
					 $owner_id=$this->Owner->getLastInsertID();
				 endif;	 
				 
				 $data=array('user_id'=>$owner['user_id'],
				 			 'owner_id'=>$owner_id,
				 			 'land_id'=>$owner['land_id'],
							 'lacase_id' => $lacase_id,
							 'shared_area'=>$owner['share'],
							 'tree_share'=>$owner['treeshare'],
							 'structure_share'=>$owner['structureshare'],
							 'pan_baroz_share'=>$owner['panbarozshare'],
							 'barga_share' =>$owner['bargashare'],
							 'portion'=>$owner['portion'],
							 'police_station'=>$owner['police_station'],
							 'bargadar' => $owner['bargadar'],
							 'active'=>'1');
				$this->LandsOwner->create();
				$this->LandsOwner->save($data);
				//debug($data);	 
			}
			}
		 }
		 $this->Session->setFlash(__('The owners has been saved'));
		 $this->redirect(array('action'=>'addplot'));
	 }
 }
 public function viewowners()
 {
	 $this->loadModel('Lacase');
	$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
	$this->set('lac', $lac);
	 if($this->request->is('post'))
	 {
	//debug($this->request->data);
	if($this->request->data['Owner']['rsplotno']=="viewall")
	{
		$this->loadModel('Land');
		$lands=$this->Land->findByLacaseId($this->request->data['Owner']['lacase_id']);
		//debug($lands);
	}
	 //$replot=$this->Land->find('first',array(
		 //'conditions'=>array('Land.id'=>$this->request->data['Owner']['rsplotno']),
		 //'fields'=>array('rsplot_no')));
		 debug($this->request->data['Owner']['rsplotno']);
	}
 }
	public function add() {
		if ($this->request->is('post')) {
			$this->Owner->create();
			if ($this->Owner->save($this->request->data)) {
				$this->Session->setFlash(__('The owner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The owner could not be saved. Please, try again.'));
			}
		}
		$users = $this->Owner->User->find('list');
		$lands = $this->Owner->Land->find('list');
		$this->set(compact('users', 'lands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Owner->id = $id;
		if (!$this->Owner->exists()) {
			throw new NotFoundException(__('Invalid owner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Owner->save($this->request->data)) {
				$this->Session->setFlash(__('The owner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The owner could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Owner->read(null, $id);
		}
		$users = $this->Owner->User->find('list');
		$lands = $this->Owner->Land->find('list');
		$this->set(compact('users', 'lands'));
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
		$this->Owner->id = $id;
		if (!$this->Owner->exists()) {
			throw new NotFoundException(__('Invalid owner'));
		}
		if ($this->Owner->delete()) {
			$this->Session->setFlash(__('Owner deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Owner was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
