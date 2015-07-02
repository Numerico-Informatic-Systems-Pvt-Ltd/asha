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
 	public function application($id=null) {
	App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf.php'));
	$this->layout = 'pdf'; //this will use the pdf.ctp layout
		
	$this->set('fpdf', new FPDF('P','cm','A4'));
	$this->set('data', 'Hello, PDF world');
	//$this->Classified->recursive = 0;
	$lacase=$this->Lacase->find('first',array('Lacase.id'=>$id));
	$this->set('lacase',$lacase);
	$this->render('application');
}
public function application13($id=null) {
	App::import('Vendor', 'Fpdf', array('file' => 'print/fpdf_13.php'));
	$this->layout = 'pdf'; //this will use the pdf.ctp layout
		
	$this->set('fpdf', new FPDF('P','cm','A4'));
	$this->set('data', 'Hello, PDF world');
	//$this->Classified->recursive = 0;
	$lacase=$this->Lacase->findById($id);
	$this->set('lacase',$lacase);
	$this->render('application13');
}
 	public function search()
	{
		if ($this->request->is('post')) {
			//debug($this->request->data);
			#$lacase=$this->Lacase->find('first',array('Lacase.id'=>$this->request->data['Lacase']['search']));
			$lacase=$this->Lacase->findById($this->request->data['Lacase']['search']);
			$this->set('lacase',$lacase);
			debug($lacase);
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
			foreach($lacase['Land'] as $lands)
			{
				$land=$this->Lacase->Land->findById($lands['id']);
				//debug($land);
			}
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
