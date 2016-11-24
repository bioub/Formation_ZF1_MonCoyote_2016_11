<?php


spl_autoload_register(function ($className) {
    $classPath = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    
    if (file_exists($classPath)) {
        include $classPath;
    }
});

$romain = new MonCoyote_Entity_Contact('Romain', 'Bohdanowicz');

var_dump($romain->getPrenom());
