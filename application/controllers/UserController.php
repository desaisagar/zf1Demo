<?php
/**
 * Class UserController
 */
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
    public function createAction()
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
        $id = $this->getRequest()->getParam('id');
        $form = new Application_Form_UserForm();
        if ($id) {
            $userService = new Application_Service_User();
            $user = $userService->findById($id);
            $this->view->assign('userForm', $form->populate($user->toArray()));
        } else {
            return $this->_helper->redirector('index');
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
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $userService = new Application_Service_User();
            $userService->delete($id);
        }

        return $this->_helper->redirector('index');
    }

    /**
     * Show details of user
     *
     * @throws Zend_Db_Table_Exception
     */
    public function showAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $userService = new Application_Service_User();
            $user = $userService->findById($id);
            $this->view->assign('user', $user);
        } else {
            return $this->_helper->redirector('index');
        }
        $this->view->title = 'View Employee Details';
    }
}
