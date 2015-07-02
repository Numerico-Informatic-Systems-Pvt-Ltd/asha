<?php
App::uses('AppController', 'Controller');
/**
 * ChainDeeds Controller
 *
 * @property ChainDeed $ChainDeed
 */
class ChainDeedsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChainDeed->recursive = 0;
		$this->set('chainDeeds', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ChainDeed->id = $id;
		if (!$this->ChainDeed->exists()) {
			throw new NotFoundException(__('Invalid chain deed'));
		}
		$this->set('chainDeed', $this->ChainDeed->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChainDeed->create();
			if ($this->ChainDeed->save($this->request->data)) {
				$this->Session->setFlash(__('The chain deed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chain deed could not be saved. Please, try again.'));
			}
		}
		$users = $this->ChainDeed->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ChainDeed->id = $id;
		if (!$this->ChainDeed->exists()) {
			throw new NotFoundException(__('Invalid chain deed'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChainDeed->save($this->request->data)) {
				$this->Session->setFlash(__('The chain deed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chain deed could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ChainDeed->read(null, $id);
		}
		$users = $this->ChainDeed->User->find('list');
		$this->set(compact('users'));
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
		$this->ChainDeed->id = $id;
		if (!$this->ChainDeed->exists()) {
			throw new NotFoundException(__('Invalid chain deed'));
		}
		if ($this->ChainDeed->delete()) {
			$this->Session->setFlash(__('Chain deed deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chain deed was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
