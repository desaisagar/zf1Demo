<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * List of users
     *
     * @throws Exception
     */
    public function indexAction()
    {
        $users = new Application_Model_UserMapper();
        $this->view->assign('users', $users->findAll());

        $this->view->title = 'Employee List';
    }

    /**
     * Save
     */
    public function saveAction()
    {
        $form = new Application_Form_UserForm();
        $this->view->title = 'New Employee';
        $this->view->assign('userForm', $form);
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}







