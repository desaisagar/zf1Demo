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
     * Get and save user data
     */
    public function saveAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_UserForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_User($form->getValues());
                $mapper  = new Application_Model_UserMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
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







