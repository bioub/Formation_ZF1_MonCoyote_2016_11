<?php

require_once './classes/Contact.php';

$romain = new Contact('Romain', 'Bohdanowicz');
$autre = new Contact('Eric', 'Martin');

// prenom n'est pas accessible car protégée
// var_dump($romain->prenom);

$autre->setPrenom('Jean');
var_dump($autre->getPrenom()); // Jean
var_dump($romain->getPrenom());
var_dump($romain->hello());
