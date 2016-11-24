<?php

namespace Application\Mapper;

use Application\Entity\Contact;
use Zend\Db\TableGateway\TableGateway;

class ContactMapper
{

    /** @var TableGateway */
    protected $gateway;

    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findAll()
    {
        $resultSet = $this->gateway->select()->toArray();
        
        $contacts = [];
        $hydrator = new \Zend\Hydrator\ClassMethods();
        
        foreach ($resultSet as $result) {
            $contact = new Contact();
            $hydrator->hydrate((array) $result, $contact);
            $contacts[] = $contact;
        }
        
        return $contacts;
    }
}
