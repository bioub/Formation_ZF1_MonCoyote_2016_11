<?php

class ContactController extends Zend_Controller_Action
{
    /** @var Zend_Controller_Request_Http */
    protected $_request;
    
    /** @var Zend_Controller_Response_Http */
    protected $_response;
    
    /** @var Application_Model_Mapper_Contact */
    protected $mapper;

    public function init()
    {
        /* Initialize action controller here */
        $this->mapper = Zend_Registry::get('contactMapper');
    }

    public function indexAction()
    {
        /* EN SQL
        $sql = "SELECT count(id) FROM contact";
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $this->view->nbContacts = $dbAdapter->query($sql)->fetchAll()->toArray();
         */
        
        /* Avec Select (Objet)
        $select = new Zend_Db_Select();
        $select->from('contact')
                ->join('societe', 'societe_id = societe.id')
                ->limitPage(3, 50);
        $this->view->contacts = $select->query()->fetchAll()->toArray(); 
         */
        
        /* Avec DbTable (Design Pattern Table Gateway)
        $dbTable = new Application_Model_DbTable_Contact();
        $this->view->contacts = $dbTable->fetchAll()->toArray();
         */
                 
        $this->view->contacts = $this->mapper->findAll();
    }

    public function showAction()
    {
        $id = $this->_request->getParam('id');
        
        if (!$id) {
            throw new Zend_Controller_Router_Exception('No id', 404);
        }
        
        $contact = $this->mapper->find($id);
        
        if (!$contact) {
            throw new Zend_Controller_Router_Exception('No contact', 404);
        }
        
        $this->view->contact = $contact;
    }

    public function addAction()
    {
        $form = new Application_Form_Contact();
        
        if ($this->_request->isPost()) {
            
            $data = $this->_request->getPost();
            
            if ($form->isValid($data)) {
                $contact = new Application_Model_Contact();
                $contact->setPrenom($data['prenom'])
                        ->setNom($data['nom'])
                        ->setEmail($data['email'])
                        ->setTelephone($data['telephone']);
                
                $this->mapper->insert($contact);
                
                return $this->_helper->redirector->gotoRoute([
                    'controller' => 'contact'
                ], false, true);
            }
            
            
            
        }
        
        $this->view->formContact = $form;
    }

    public function modifyAction()
    {
        // action body
    }

    public function removeAction()
    {
        if ($this->_request->isPost()) {
            $confirm = $this->_request->getPost('confirm');
            
            if ($confirm === 'Oui') {
                $id = $this->_request->getParam('id');
                $this->mapper->delete($id);
            }
            
            return $this->_helper->redirector->gotoRoute([
                'controller' => 'contact'
            ], false, true);
        }
        
        $this->showAction();
    }


}









