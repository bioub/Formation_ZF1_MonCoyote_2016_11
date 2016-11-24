<?php

class Application_Model_Mapper_Contact
{

    /** @var Application_Model_DbTable_Contact */
    protected $dbTable;

    public function __construct(Application_Model_DbTable_Contact $dbTable)
    {
        $this->dbTable = $dbTable;
    }
    
    /**
     * @return Application_Model_Contact[] Tous les contacts
     */
    public function findAll()
    {
        $contacts = $this->dbTable->fetchAll()->toArray();
        $listContacts = [];
        
        foreach ($contacts as $contact) {
            $obj = new Application_Model_Contact();
            $obj->setId($contact['id'])
                ->setPrenom($contact['prenom'])
                ->setNom($contact['nom'])
                ->setEmail($contact['email'])
                ->setTelephone($contact['telephone']);
            
            $listContacts[] = $obj;
        }
        
        return $listContacts;
    }
    
    /**
     * @return Application_Model_Contact Le contact recherché
     */
    public function find($id)
    {
        $contact = $this->dbTable->fetchRow(['id = ?' => $id]);
        
        if (!$contact) {
            return null;
        }
        
        $obj = new Application_Model_Contact();
        $obj->setId($contact['id'])
            ->setPrenom($contact['prenom'])
            ->setNom($contact['nom'])
            ->setEmail($contact['email'])
            ->setTelephone($contact['telephone']);
            
        return $obj;
    }
    
    public function delete($id) {
        return $this->dbTable->delete(['id = ?' => $id]);
    }
    
    public function insert(Application_Model_Contact $contact) {
        $data = [];
        $data['prenom'] = $contact->getPrenom();
        $data['nom'] = $contact->getNom();
        $data['email'] = $contact->getEmail();
        $data['telephone'] = $contact->getTelephone();
        $id = $this->dbTable->insert($data);
        $contact->setId($id);
        
        return $id;
    }

}
