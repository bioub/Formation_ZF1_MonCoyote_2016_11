<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Mapper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Description of ContactControllerFactory
 *
 * @author romain
 */
class ContactMapperFactory implements FactoryInterface
{
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Zend\Db\Adapter\Adapter');
        $gateway = new \Zend\Db\TableGateway\TableGateway('contact', $adapter);
        return new \Application\Mapper\ContactMapper($gateway);
    }
}
