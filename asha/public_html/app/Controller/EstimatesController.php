<?php
App::uses('AppController', 'Controller');
/**
 * Estimates Controller
 *
 * @property Estimate $Estimate
 */
class EstimatesController extends AppController {
	
 	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Estimate.id' => 'desc'
        )
    );

/**
 * index method
 *
 * @return void
 */
 
 	public function get_grand_total($lacase_id = null,$type='Total Land') {
	if(empty($lacase_id)):
		$this->Session->setFlash('Invalid LACASE ID');
		$this->redirect($this->referer());
	endif;	
	
	$type = str_replace("Total ","",$type);
	
	return $this->Estimate->find('first',array(
							'conditions'=>array(
											'Estimate.lacase_id'=>$lacase_id,
											'Estimate.calculation_type' => $type),
							'fields'=>array('sum(interest1) as interest1',
											'sum(interest2) as interest2',
											'sum(interest3) as interest3',
											'sum(old_eighty) as old_eighty',
											'sum(newvalue) as newvalue',
											'sum(solatium) as solatium',
											'sum(eighty_paid) as eighty_paid',
											'sum(value) as value'
							)));
												
	}
	
 	public function get_by_plot_estimate($plot_estimate_id,$type="Total Land"){
		
	$type = str_replace("Total ","",$type);
		
	$this->Estimate->unBindModel(array('belongsTo'=>array('User','Land')));
	return $this->Estimate->find('all',
									array('conditions' => array(
										'Estimate.plot_estimate_id' => $plot_estimate_id,
										'Estimate.calculation_type' => $type)
								));		
	}
	
 	public function get_by_owner_lacase_id($owner_id,$lacase_id){
			
	$grandTotal = $this->Estimate->find('all',
					array(
						'fields' => array('SUM(Estimate.value)   AS gTotal'),
						'conditions' => array('Estimate.owner_id' => $owner_id,
											  'Estimate.lacase_id' => $lacase_id)
						 ));
						 			
	return $grandTotal;		  
		
	}
 	public function getbylandid($land_id=null,$owner_id=null)
	{
		$estvalue=$this->Estimate->find('all',array(
				'conditions'=>array('Estimate.land_id'=>$land_id,'Estimate.owner_id'=>$owner_id)));
		return $estvalue;
	}
	public function index() {
	    $this->Paginator->settings = $this->paginate;
		$this->Estimate->recursive = 0;
		$this->set('estimates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Estimate->id = $id;
		if (!$this->Estimate->exists()) {
			throw new NotFoundException(__('Invalid estimate'));
		}
		$this->set('estimate', $this->Estimate->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estimate->create();
			if ($this->Estimate->save($this->request->data)) {
				$this->Session->setFlash(__('The estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estimate could not be saved. Please, try again.'));
			}
		}
		$users = $this->Estimate->User->find('list');
		$lands = $this->Estimate->Land->find('list');
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
		$this->Estimate->id = $id;
		if (!$this->Estimate->exists()) {
			throw new NotFoundException(__('Invalid estimate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estimate->save($this->request->data)) {
				$this->Session->setFlash(__('The estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estimate could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Estimate->read(null, $id);
		}
		$users = $this->Estimate->User->find('list');
		$lands = $this->Estimate->Land->find('list');
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
		$this->Estimate->id = $id;
		if (!$this->Estimate->exists()) {
			throw new NotFoundException(__('Invalid estimate'));
		}
		if ($this->Estimate->delete()) {
			$this->Session->setFlash(__('Estimate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Estimate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/*Delete by Land ID */
	
	public function deletebyland($land_id) {
		debug($land_id);
		if(empty($land_id))
		{
				throw new NotFoundException(__('Invalid Request for Delete Estimate'));
		}
	/*	if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
	*/	
	/*	$this->Estimate->id = $id;
		if (!$this->Estimate->exists()) {
			throw new NotFoundException(__('Invalid estimate'));
		}
	*/
		if ($this->Estimate->deleteAll(array('Estimate.land_id'=>$land_id))) {
			
			$this->Session->setFlash(__('Estimates Deleted'));
				//debug('id1');
			$this->loadModel('PlotEstimate');
			if ($this->PlotEstimate->deleteAll(array('PlotEstimate.land_id'=>$land_id))) 
			{
				$this->Session->setFlash(__('Plot Estimates Deleted'));	
				//debug('id2');
			}
			 $this->redirect(array('controller'=>'lands','action'=>'index'));
		}
		
		$this->Session->setFlash(__('Estimate was not deleted'));
		$this->redirect(array('controller'=>'lands','action' => 'index'));
	}
	
	
}
