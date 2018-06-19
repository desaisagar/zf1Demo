<?php

class Application_Service_User
{

    /**
     * @var Application_Model_UserMapper
     */
    protected $_userMapper;

    /**
     * Application_Service_User constructor.
     */
    public function __construct()
    {
        $this->_userMapper = new Application_Model_UserMapper();
    }

    /**
     * Find all records with pagination
     *
     * @param int $page
     * @return Zend_Paginator
     */
    public function findAll($page = 1)
    {
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($this->_userMapper->selectAll()));
        $paginator->setItemCountPerPage(2)
            ->setCurrentPageNumber($page);
        return $paginator;
    }

    /**
     * Save or update user information
     *
     * @param array $data
     * @return Application_Model_User
     * @throws Exception
     */
    public function save($data)
    {
        $user = new Application_Model_User($data);
        return $this->_userMapper->save($user);
    }

    /**
     * Find user by id
     *
     * @param int $id
     * @return Application_Model_User|void
     * @throws Zend_Db_Table_Exception
     */
    public function findById($id)
    {
        return $this->_userMapper->find($id);
    }

    /**
     * Delete user by id
     *
     * @param int $id
     * @return int
     * @throws Exception
     */
    public function delete($id)
    {
        return $this->_userMapper->delete($id);
    }

}