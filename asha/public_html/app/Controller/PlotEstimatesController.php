<?php
App::uses('AppController', 'Controller');
/**
 * PlotEstimates Controller
 *
 * @property PlotEstimate $PlotEstimate
 */
class PlotEstimatesController extends AppController {


		public function get_by_lacase_id($lacase_id = null,$type='Total Land') {
		
		$this->PlotEstimate->recursive = 1;
		
		//$this->PlotEstimate->unBindModel(array('belongsTo'=>array('User')));
		
		$this->PlotEstimate->Land->bindModel(array(
									'belongsTo'=>array('Classification')							
									),false);
		
		$this->PlotEstimate->unBindModel(array(
									'belongsTo' => array('User'),
									'hasMany' => array('Estimate')
									));
		$this->LoadModel('Land');
		
		$this->Land->unBindModel(array('hasMany'=>array('AcquisitionedArea','Estimate','LandsOwner',
									'LandValue','TransLandOwner')));
				
		return $this->Land->find('all',array(
							'conditions'=> array('Land.Lacase_id'=>$lacase_id,
												 'PlotEstimate.calculation_type' => $type),
							'fields'=>array('Land.id','Land.rsplot_no','Classification.name','PlotEstimate.*')
						));	
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlotEstimate->recursive = 0;
		$this->set('plotEstimates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PlotEstimate->id = $id;
		if (!$this->PlotEstimate->exists()) {
			throw new NotFoundException(__('Invalid plot estimate'));
		}
		$this->set('plotEstimate', $this->PlotEstimate->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlotEstimate->create();
			if ($this->PlotEstimate->save($this->request->data)) {
				$this->Session->setFlash(__('The plot estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plot estimate could not be saved. Please, try again.'));
			}
		}
		$users = $this->PlotEstimate->User->find('list');
		$lands = $this->PlotEstimate->Land->find('list');
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
		$this->PlotEstimate->id = $id;
		if (!$this->PlotEstimate->exists()) {
			throw new NotFoundException(__('Invalid plot estimate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlotEstimate->save($this->request->data)) {
				$this->Session->setFlash(__('The plot estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plot estimate could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PlotEstimate->read(null, $id);
		}
		$users = $this->PlotEstimate->User->find('list');
		$lands = $this->PlotEstimate->Land->find('list');
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
		$this->PlotEstimate->id = $id;
		if (!$this->PlotEstimate->exists()) {
			throw new NotFoundException(__('Invalid plot estimate'));
		}
		if ($this->PlotEstimate->delete()) {
			$this->Session->setFlash(__('Plot estimate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Plot estimate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
