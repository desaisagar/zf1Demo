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
        $users = new Application_Model_UserMapper();

        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($users->selectAll()));
        $paginator->setItemCountPerPage(2)
                    ->setCurrentPageNumber($this->getParam('page'), 1);

        $this->view->assign('paginator', $paginator);

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

    /**
     * Edit user data
     *
     * @throws Zend_Db_Table_Exception
     */
    public function editAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_UserForm();

        if ($request->isGet()) {
            $id = $request->getParam('id');
            $userMapper = new Application_Model_UserMapper();
            $editUser = $userMapper->find($id);
            $this->view->assign('userForm', $form->populate($editUser->toArray()));
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
            $id = $this->getRequest()->getParam('id');
            $userMapper = new Application_Model_UserMapper();
            $userMapper->delete($id);
        }
        return $this->_helper->redirector('index');
    }

}
