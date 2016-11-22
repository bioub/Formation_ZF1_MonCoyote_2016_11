<?php

function __autoload($className) {
    $classPath = 'classes/' . str_replace('_', '/', $className) . '.php';
    include $classPath;
}