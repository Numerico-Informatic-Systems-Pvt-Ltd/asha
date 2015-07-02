<?php
App::uses('AppController', 'Controller');
/**
 * Kycs Controller
 *
 * @property Kyc $Kyc
 */
class KycsController extends AppController {


	public $components = array('paginator');
	
	public $paginate = array(
			'limit' => 25,
			'order' => array(
					'Kyc.id' => 'desc'
					)
			);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$this -> paginator -> settings = $this -> paginate ;
		
		$this->Kyc->recursive = 0;
		$this->set('kycs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Kyc->id = $id;
		if (!$this->Kyc->exists()) {
			throw new NotFoundException(__('Invalid kyc'));
		}
		$this->set('kyc', $this->Kyc->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//debug($this->request->data);
			$this->Kyc->create();
			if ($this->Kyc->save($this->request->data)) {
				$sql="update owners set varified=1 where id=".$this->request->data['Kyc']['owner_id'];
				$this->Kyc->query($sql);
				$this->Session->setFlash(__('The KYC details of plot owner has been saved and verified'));
				$this->redirect(array('controller'=>'owners','action' => 'search',$this->request->data['Kyc']['lacase_id']));
			} else {
				$this->Session->setFlash(__('The kyc could not be saved. Please, try again.'));
			}
		}
		//$owners = $this->Kyc->Owner->find('list');
		//$this->set(compact('owners'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = NULL) {
		$this->Kyc->id = $id;
		if (!$this->Kyc->exists()) {
			throw new NotFoundException(__('Invalid kyc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kyc->save($this->request->data)) {
				$this->Session->setFlash(__('The kyc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kyc could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Kyc->read(null, $id);
		}
		$owners = $this->Kyc->Owner->find('list');
		$this->set(compact('owners'));
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

		
		$this->Kyc->id = $id;
		
		if (!$this->Kyc->exists()) {
			throw new NotFoundException(__('Invalid kyc'));
		}
		
		$owner = $this->Kyc->find('first',array(
									'conditions'=>array('Kyc.id'=>$id)
								));

		if ($this->Kyc->delete()) {
			
		/* Set owner's verification status as 0) */						
				
		$this->Kyc->Owner->id = $owner['Owner']['id'];
		$this->Kyc->Owner->set('varified',0);					
		$this->Kyc->Owner->save();

			$this->Session->setFlash(__('Kyc deleted & status of owner account has been set to unverified. Please verify owner again.'));
			$this->redirect($this->referer());
		}
		
		$this->Session->setFlash(__('Kyc was not deleted'));
		// $this->redirect(array('action' => 'index'));
	}
}
