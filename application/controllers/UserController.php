<?php

class UserController extends Zend_Controller_Action
{

    /**
     * List of users
     *
     * @throws Exception
     */
    public function indexAction()
    {
        $userService = new Application_Service_User();
        $this->view->assign('paginator', $userService->findAll($this->getParam('page', 1)));
        $this->view->title = 'Employee List';
    }

    /**
     * Get and save user data
     */
    public function saveAction()
    {
        $form = new Application_Form_UserForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $userService = new Application_Service_User();
                $userService->save($form->getValues());
                return $this->_helper->redirector('index');
            }
        }
        $this->view->title = 'New Employee';
        $this->view->assign('userForm', $form);
    }

    /**
     * Edit user data
     *
     * @throws Zend_Db_Table_Exception
     */
    public function editAction()
    {
        $form = new Application_Form_UserForm();
        if ($this->getRequest()->isGet()) {
            $userService = new Application_Service_User();
            $user = $userService->findById($this->getRequest()->getParam('id'));
            $this->view->assign('userForm', $form->populate($user->toArray()));
        }
        $this->view->title = 'Edit Employee';
    }

    /**
     * Delete user record
     *
     * @return mixed
     * @throws Exception
     */
    public function deleteAction()
    {
        if ($this->getRequest()->isGet()) {
            $userService = new Application_Service_User();
            $userService->delete($this->getRequest()->getParam('id'));
        }
        return $this->_helper->redirector('index');
    }

}
