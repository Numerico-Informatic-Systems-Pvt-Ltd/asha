<?php
App::uses('AppController', 'Controller');
/**
 * LandOwners Controller
 *
 * @property LandOwner $LandOwner
 */
class LandsOwnersController extends AppController {

/**
 * index method
 *
 * @return void
 */
 	public function getbylandid($land_id=null)
	{
		$owner=$this->LandOwner->findByLandId($land_id);
		return $owner;	}
	
	
	public function search()
	{
		$this->loadModel('Lacase');
		if ($this->request->is('post')) 
		{
			$lacase=$this->Lacase->find('first',array('Lacase.id'=>$this->request->data['Lacase']['search']));
			$land_id=array();
			foreach($lacase['Land'] as $lac)
			{
				$land_id[]=$lac['id'];
			}
			$owners=$this->LandOwner->find('all',array('conditions'=>array('LandOwner.land_id'=>$land_id)));
			debug($owners);
			$this->set('lacase',$lacase);
		}
		$lac=$this->Lacase->find('list',array('fields'=>'la_case_number'));
		$this->set('lac', $lac);
	}
	
	public function index() {
		$this->LandOwner->recursive = 0;
		$this->set('landOwners', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LandOwner->id = $id;
		if (!$this->LandOwner->exists()) {
			throw new NotFoundException(__('Invalid land owner'));
		}
		$this->set('landOwner', $this->LandOwner->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LandOwner->create();
			if ($this->LandOwner->save($this->request->data)) {
				$this->Session->setFlash(__('The land owner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The land owner could not be saved. Please, try again.'));
			}
		}
		$users = $this->LandOwner->User->find('list');
		$owners = $this->LandOwner->Owner->find('list');
		$lands = $this->LandOwner->Land->find('list');
		$this->set(compact('users', 'owners', 'lands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->LandOwner->id = $id;
		if (!$this->LandOwner->exists()) {
			throw new NotFoundException(__('Invalid land owner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LandOwner->save($this->request->data)) {
				$this->Session->setFlash(__('The land owner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The land owner could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->LandOwner->read(null, $id);
		}
		$users = $this->LandOwner->User->find('list');
		$owners = $this->LandOwner->Owner->find('list');
		$lands = $this->LandOwner->Land->find('list');
		$this->set(compact('users', 'owners', 'lands'));
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
		$this->LandOwner->id = $id;
		if (!$this->LandOwner->exists()) {
			throw new NotFoundException(__('Invalid land owner'));
		}
		if ($this->LandOwner->delete()) {
			$this->Session->setFlash(__('Land owner deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Land owner was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}