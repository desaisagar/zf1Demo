<?php

class Application_Model_UserMapper
{

    /**
     * @var Zend_Db_Table_Abstract
     */
    protected $_dbTable;

    /**
     * Set user database table
     *
     * @param mixed $dbTable
     * @return Application_Model_UserMapper $this
     * @throws Exception
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * Get user database table
     *
     * @return Zend_Db_Table_Abstract
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable(Application_Model_DbTable_UserDbTable::class);
        }
        return $this->_dbTable;
    }

    /**
     * Save or update user record
     *
     * @param Application_Model_User $user
     * @throws Exception
     */
    public function save(Application_Model_User $user)
    {
        $data = [
            'name' => $user->getName(),
            'gender' => $user->getGender(),
            'email' => $user->getEmail(),
            'mobile_number' => $user->getMobileNumber() ?? null,
            'date_of_birth' => $user->getDateOfBirth(),
            'designation' => $user->getDesignation(),
            'branch' => $user->getBranch(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if (null === ($id = $user->getId())) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    /**
     * find all records of user
     *
     * @return array
     * @throws Exception
     */
    public function findAll()
    {
        $results = $this->getDbTable()->fetchAll();
        $users = [];
        foreach ($results as $row) {
            $users[] = $this->convertRowToObject($row);
        }
        return $users;
    }

    /**
     * Find single record of user by id
     *
     * @param int $id
     * @return Application_Model_User|void
     * @throws Zend_Db_Table_Exception
     */
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $user = $this->convertRowToObject($row);
        return $user;
    }

    /**
     * Delete user record by id
     *
     * @param int $id
     * @return int
     * @throws Exception
     */
    public function delete($id)
    {
        return $this->getDbTable()->delete($id);
    }

    /**
     * Convert table row to user object
     *
     * @param array $row
     * @return Application_Model_User
     */
    private function convertRowToObject($row)
    {
        if ($row instanceof Zend_Db_Table_Row) {
            $user = new Application_Model_User();
            $user->setId($row->id);
            $user->setName($row->name);
            $user->setGender($row->gender);
            $user->setEmail($row->email);
            $user->setMobileNumber($row->mobile_number);
            $user->setDateOfBirth($row->date_of_birth);
            $user->setDesignation($row->designation);
            $user->setBranch($row->branch);
            return $user;
        }
    }

}

