<?php

class Application_Form_UserForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->addElement('hidden', 'id', array(
            'required' => false,
            'filters' => array('StringTrim')
        ));

        $this->addElement('text', 'name', array(
            'label' => 'Name:',
            'required' => true,
            'filters' => array('StringTrim')
        ));

//        $this->addElement('radio', 'gender', array(
//            'label' => 'Gender:',
//            'required' => true,
//            'options' => array('Male', 'Female')
//        ));

        $this->addElement('text', 'email', array(
            'label'      => 'Email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        $this->addElement('text', 'mobile_number', array(
            'label' => 'Mobile Number:',
            'required' => false,
            'filters' => array('StringTrim')
        ));

        $this->addElement('submit', 'submit', array(
            'ignore' => true,
            'label' => 'Submit'
        ));

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

