<?php
/**
 * Class Application_Form_UserForm
 */
class Application_Form_UserForm extends Zend_Form
{
    /**
     * Validate the form
     *
     * @param array $data
     * @return bool
     */
    public function isValid($data)
    {
        $this->getElement('email')
            ->addValidators(
                [
                    'EmailAddress',
                    ['Db_NoRecordExists', false, [
                        'table' => 'users',
                        'field' => 'email',
                        'messages' => [
                            'recordFound' => 'Email already taken'
                        ],
                        'exclude'   => [
                            'field' => 'id',
                            'value' => $data['id']
                            ]
                        ]
                    ]
                ]
            );
        return parent::isValid($data);
    }

    /**
     * Initialize form (used by extending classes)
     *
     * @throws Zend_Form_Exception
     */
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->addElement('hidden', 'id', [
            'required' => false,
            'filters' => ['StringTrim']
        ]);

        $this->addElement('text', 'name', [
            'label' => 'Name:',
            'class' => 'form-control',
            'required' => true,
            'filters' => ['StringTrim']
        ]);

        $this->addElement('radio', 'gender', [
            'label' => 'Gender:',
            'class' => 'form-control',
            'required' => true,
            'multiOptions' => [
                'Male' => 'Male',
                'Female' => 'Female'
            ]
        ]);

        $this->addElement('text', 'email', [
            'label'      => 'Email address:',
            'class' => 'form-control',
            'required'   => true,
            'filters'    => ['StringTrim'],
            'validators' => [
                'EmailAddress',
                ['Db_NoRecordExists', false, [
                        'table' => 'users',
                        'field' => 'email',
                        'messages' => [
                            'recordFound' => 'Email already taken'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('text', 'mobileNumber', [
            'label' => 'Mobile Number:',
            'class' => 'form-control',
            'required' => false,
            'filters' => ['StringTrim'],
        ]);

        $this->addElement('text', 'dateOfBirth', [
            'label' => 'Date of birth:',
            'class' => 'form-control',
            'required' => false,
            'filters' => ['StringTrim'],
            'placeholder' => 'dd-mm-yyyy'
        ]);

        $this->addElement('select', 'designation', [
            'label' => 'Designation:',
            'class' => 'form-control',
            'required' => true,
            'multiOptions' => [
                '' => 'Please select designation',
                'Manager' => 'Manager',
                'Developer' => 'Developer',
                'Tester' => 'Tester'
            ]
        ]);

        $this->addElement('text', 'branch', [
            'label' => 'Branch:',
            'class' => 'form-control',
            'required' => true,
            'filters' => ['StringTrim']
        ]);

        $this->addElement('submit', 'submit', [
            'ignore' => true,
            'class' => 'btn btn-primary',
            'label' => 'Submit'
        ]);

        $this->addElement('hash', 'csrf', [
            'ignore' => true,
        ]);
    }
}
