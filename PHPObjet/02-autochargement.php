<?php

function __autoload($className) {
    $classPath = 'classes/' . str_replace('_', '/', $className) . '.php';
    include $classPath;
}

$romain = new MonCoyote_Entity_Contact('Romain', 'Bohdanowicz');

var_dump($romain->getPrenom());
