<?php
App::uses('AppController', 'Controller');
/**
 * LandValues Controller
 *
 * @property LandValue $LandValue
 */
class LandValuesController extends AppController {

/**
 * index method
 *
 * @return void
 */
 	public function getbylandid($land_id=null)
	{
		$landvalue=$this->LandValue->findByLandId($land_id);
		return $landvalue;
	}

	public function index() {
		$this->LandValue->recursive = 0;
		$this->set('landValues', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LandValue->id = $id;
		if (!$this->LandValue->exists()) {
			throw new NotFoundException(__('Invalid land value'));
		}
		$this->set('landValue', $this->LandValue->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LandValue->create();
			if ($this->LandValue->save($this->request->data)) {
				$this->Session->setFlash(__('The land value has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The land value could not be saved. Please, try again.'));
			}
		}
		$users = $this->LandValue->User->find('list');
		$lands = $this->LandValue->Land->find('list');
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
		$this->LandValue->id = $id;
		if (!$this->LandValue->exists()) {
			throw new NotFoundException(__('Invalid land value'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LandValue->save($this->request->data)) {
				$this->Session->setFlash(__('The land value has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The land value could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->LandValue->read(null, $id);
		}
		$users = $this->LandValue->User->find('list');
		$lands = $this->LandValue->Land->find('list');
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
		$this->LandValue->id = $id;
		if (!$this->LandValue->exists()) {
			throw new NotFoundException(__('Invalid land value'));
		}
		if ($this->LandValue->delete()) {
			$this->Session->setFlash(__('Land value deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Land value was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
