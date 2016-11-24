<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        // Début Prénom
        $element = new Zend_Form_Element_Text('prenom');
        $element->setLabel('Prénom');
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $validator->setMessage('Le prénom ne doit pas dépasser %max% caractères', Zend_Validate_StringLength::TOO_LONG);
        $element->addValidator($validator);
        
        $this->addElement($element);
        // Fin Prénom
        
        // Début Nom
        $element = new Zend_Form_Element_Text('nom');
        $element->setLabel('Nom');
        $element->setRequired();
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $this->addElement($element);
        // Fin Nom
        
        $element = new Zend_Form_Element_Text('email');
        $element->setLabel('Email');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('telephone');
        $element->setLabel('Téléphone');
        $this->addElement($element);
    }


}

