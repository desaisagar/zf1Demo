<?php

class Application_Form_UserForm extends Zend_Form
{

    /**
     * @param array $data
     * @return bool
     */
    public function isValid($data)
    {
        $this->getElement('email')
            ->addValidators(
                array(
                    'EmailAddress',
                    array('Db_NoRecordExists', false, array(
                        'table' => 'users',
                        'field' => 'email',
                        'messages' => array(
                            'recordFound' => 'Email already taken'
                        ),
                        'exclude'   => array(
                            'field' => 'id',
                            'value' => $data['id']
                            )
                        )
                    )
                )
            );
        return parent::isValid($data);
    }


    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->addElement('hidden', 'id', array(
            'required' => false,
            'filters' => array('StringTrim')
        ));

        $this->addElement('text', 'name', array(
            'label' => 'Name:',
            'class' => 'form-control',
            'required' => true,
            'filters' => array('StringTrim')
        ));

        $this->addElement('radio', 'gender', array(
            'label' => 'Gender:',
            'class' => 'form-control',
            'required' => true,
            'multiOptions' => array(
                'Male' => 'Male',
                'Female' => 'Female'
            )
        ));

        $this->addElement('text', 'email', array(
            'label'      => 'Email address:',
            'class' => 'form-control',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
                array('Db_NoRecordExists', false, array(
                        'table' => 'users',
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
            'class' => 'form-control',
            'required' => false,
            'filters' => array('StringTrim'),
        ));

        $this->addElement('text', 'dateOfBirth', array(
            'label' => 'Date of birth:',
            'class' => 'form-control',
            'required' => false,
            'filters' => array('StringTrim'),
            'placeholder' => 'dd-mm-yyyy'
        ));

        $this->addElement('select', 'designation', array(
            'label' => 'Designation:',
            'class' => 'form-control',
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
            'class' => 'form-control',
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

