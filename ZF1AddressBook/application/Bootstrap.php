<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     *
     * @var Zend_Application_Resource_Db
     */
    protected $db;

    protected function _initHello()
    {
        return 'Hello';
    }

    protected function _initZFDebug()
    {
        // Pas besoin si composer
        // $autoloader = Zend_Loader_Autoloader::getInstance();
        // $autoloader->registerNamespace('ZFDebug');
        if (APPLICATION_ENV !== 'production') {
            $this->db = $this->getPluginResource('db');

            $options = array(
                'plugins' => array(
                    'Variables',
                    'Database' => array('adapter' => $this->db->getDbAdapter()),
                    'File' => array('basePath' => APPLICATION_PATH . '/../'),
                    'Exception'
                ),
            );
            $debug = new ZFDebug_Controller_Plugin_Debug($options);

            $this->bootstrap('frontController');
            $frontController = $this->getResource('frontController');
            $frontController->registerPlugin($debug);
        }
    }
    
    protected function _initRegistry() {
        $dbTable = new Application_Model_DbTable_Contact();
        $mapper = new Application_Model_Mapper_Contact($dbTable);
        
        Zend_Registry::set('contactMapper', $mapper);
    }

}
