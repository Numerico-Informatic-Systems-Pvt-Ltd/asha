<?php
App::uses('AppController', 'Controller');
/**
 * AcquisitionedAreas Controller
 *
 * @property AcquisitionedArea $AcquisitionedArea
 */
class AcquisitionedAreasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AcquisitionedArea->recursive = 0;
		$this->set('acquisitionedAreas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AcquisitionedArea->id = $id;
		if (!$this->AcquisitionedArea->exists()) {
			throw new NotFoundException(__('Invalid acquisitioned area'));
		}
		$this->set('acquisitionedArea', $this->AcquisitionedArea->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AcquisitionedArea->create();
			if ($this->AcquisitionedArea->save($this->request->data)) {
				$this->Session->setFlash(__('The acquisitioned area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acquisitioned area could not be saved. Please, try again.'));
			}
		}
		$users = $this->AcquisitionedArea->User->find('list');
		$lands = $this->AcquisitionedArea->Land->find('list');
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
		$this->AcquisitionedArea->id = $id;
		if (!$this->AcquisitionedArea->exists()) {
			throw new NotFoundException(__('Invalid acquisitioned area'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AcquisitionedArea->save($this->request->data)) {
				$this->Session->setFlash(__('The acquisitioned area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acquisitioned area could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AcquisitionedArea->read(null, $id);
		}
		$users = $this->AcquisitionedArea->User->find('list');
		$lands = $this->AcquisitionedArea->Land->find('list');
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
		$this->AcquisitionedArea->id = $id;
		if (!$this->AcquisitionedArea->exists()) {
			throw new NotFoundException(__('Invalid acquisitioned area'));
		}
		if ($this->AcquisitionedArea->delete()) {
			$this->Session->setFlash(__('Acquisitioned area deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acquisitioned area was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
