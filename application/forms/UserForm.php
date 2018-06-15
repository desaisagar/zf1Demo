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

        $this->addElement('radio', 'gender', array(
            'label' => 'Gender:',
            'required' => true,
            'multiOptions' => array(
                'Male' => 'Male',
                'Female' => 'Female'
            )
        ));

        $this->addElement('text', 'email', array(
            'label'      => 'Email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
                array('Db_NoRecordExists', true, array(
                        'table' => 'user',
                        'field' => 'email',
                        'messages' => array(
                            'recordFound' => 'Email already taken'
                        )
                    )
                )
            )
        ));

        $this->addElement('text', 'mobileNumber', array(
            'label' => 'Mobile Number:',
            'required' => false,
            'filters' => array('StringTrim')
        ));

        $this->addElement('text', 'dateOfBirth', array(
            'label' => 'Date of birth:',
            'required' => false,
            'filters' => array('StringTrim'),
            'placeholder' => 'dd/mm/yyyy'
        ));

        $this->addElement('select', 'designation', array(
            'label' => 'Designation:',
            'required' => true,
            'multiOptions' => array(
                '' => 'Please select designation',
                'Manager' => 'Manager',
                'Developer' => 'Developer',
                'Tester' => 'Tester'
            )
        ));

        $this->addElement('text', 'branch', array(
            'label' => 'Branch:',
            'required' => true,
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

