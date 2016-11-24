<?php

class ContactControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testIndexActionIsAccessible()
    {
        $this->dispatch('/contact');
        $this->assertResponseCode(200);
        $this->assertController('contact');
        $this->assertAction('index');
    }
    
    public function testIndexActionWithZendDb()
    {
        $this->dispatch('/contact');
        $this->assertQueryCount('table.table > tr', 5);
    }
    
    public function testIndexActionWithMock()
    {
        $contacts = [
            (new Application_Model_Contact)->setId(1)->setPrenom('A')->setNom('B'),
            (new Application_Model_Contact)->setId(2)->setPrenom('C')->setNom('D'),
        ];
        
        $mock = $this->getMockBuilder('Application_Model_Mapper_Contact')
                     ->disableOriginalConstructor()
                     ->getMock();
        
        $mock->expects($this->once())
                ->method('findAll')
                ->willReturn($contacts);
        
        Zend_Registry::set('contactMapper', $mock);
        
        $this->dispatch('/contact');
        $this->assertQueryCount('table.table > tr', 2);
    }
}

