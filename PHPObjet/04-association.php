<?php

require_once './autoload.php';

$bill = new MonCoyote_Entity_Contact();
$bill->setPrenom('Bill')
     ->setNom('Gates');

$microsoft = new MonCoyote_Entity_Societe();
$microsoft->setNom('Microsoft');

// soit sur une page contact :
// $bill->setSociete($microsoft);

// soit sur une page societe :
$microsoft->addContact($bill);