<?php
App::uses('AppController', 'Controller');
/**
 * Classifications Controller
 *
 * @property Classification $Classification
 * @property PaginatorComponent $Paginator
 */
class ClassificationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
 	public function getclassificationbyid($c_id=null)
	{
		if($c_id != null)
		{
			$classification=$this->Classification->findById($c_id);
			return $classification;
		}
	}
	
	public function list_by_lacase_id($lacase_id = NULL) {
		
		
		// $this->Classification->unBindModel(array('belongsTo'=>array('Lacase')));
		
		$classifications = $this->Classification->find('all',
														array(
															'conditions'=>array(
																'Classification.lacase_id' => $lacase_id)
														));
		return $classifications;
	}
	
	public function index() {
		//$this->Classification->recursive = 0;
		
		if ($this->request->is('post')) {
			$lacase_id = $this->request->data['Classification']['lacase_id'];

			$this->set('classifications', $this->Paginator->paginate(array(
										'Classification.lacase_id' => $lacase_id)));
		} else {
			$this->set('classifications', $this->Paginator->paginate());
		}
		$lacases=$this->Classification->Lacase->find('list');
		$this->set(compact('lacases'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Classification->exists($id)) {
			throw new NotFoundException(__('Invalid classification'));
		}
		$options = array('conditions' => array('Classification.' . $this->Classification->primaryKey => $id));
		$this->set('classification', $this->Classification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$lacase_id = $this->request->data['Classification']['lacase_id'];
			
			$this->Classification->create();
			
			if ($this->Classification->save($this->request->data)) {
				
				$this->Session->setFlash(__('The classification has been saved'));
				
				$this->set('lacase_id',$lacase_id);
				
				// return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The classification could not be saved. Please, try again.'));
			}
		}
		
		$lacases=$this->Classification->Lacase->find('list');
		$this->set(compact('lacases'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Classification->exists($id)) {
			throw new NotFoundException(__('Invalid classification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Classification->save($this->request->data)) {
				$this->Session->setFlash(__('The classification has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Classification.' . $this->Classification->primaryKey => $id));
			$this->request->data = $this->Classification->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Classification->id = $id;
		if (!$this->Classification->exists()) {
			throw new NotFoundException(__('Invalid classification'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Classification->delete()) {
			$this->Session->setFlash(__('Classification deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Classification was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
