<?php
/**
 * Class Application_Model_UserMapper
 */
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
     * @return int|mixed
     * @throws Exception
     */
    public function save(Application_Model_User $user)
    {
        $data = [
            'name' => $user->getName(),
            'gender' => $user->getGender(),
            'email' => $user->getEmail(),
            'mobile_number' => $user->getMobileNumber() ?? null,
            'date_of_birth' => $user->getDateOfBirth() ? date('Y-m-d', strtotime($user->getDateOfBirth())) : null,
            'designation' => $user->getDesignation(),
            'branch' => $user->getBranch(),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $id = $user->getId();
        if ('' === $id || null === $id) {
            return $this->getDbTable()->insert($data);
        } else {
            return $this->getDbTable()->update($data, array('id = ?' => $id));
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
     * @return Zend_Db_Select
     */
    public function selectAll()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectUsers = new Zend_Db_Select($db);
        $selectUsers->from('users');
        return $selectUsers;
    }

    /**
     * Find single record of user by id
     *
     * @param int $id
     * @return Application_Model_User|void
     * @throws Exception
     */
    public function find($id)
    {
        if ($id) {
            $result = $this->getDbTable()->find($id);
            if (0 == count($result)) {
                return;
            }
            $row = $result->current();
            $user = $this->convertRowToObject($row);
            return $user;
        }
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
        if ($id) {
            return $this->getDbTable()->delete(array('id = ?' => $id));
        }
    }

    /**
     * Convert table row to user object
     *
     * @param Zend_Db_Table_Row $row
     * @return Application_Model_User
     */
    private function convertRowToObject(Zend_Db_Table_Row $row)
    {
        if ($row instanceof Zend_Db_Table_Row) {
            $user = new Application_Model_User();
            $user->setId($row->id)
                ->setName($row->name)
                ->setGender($row->gender)
                ->setEmail($row->email)
                ->setMobileNumber($row->mobile_number)
                ->setDateOfBirth($row->date_of_birth)
                ->setDesignation($row->designation)
                ->setBranch($row->branch);

            return $user;
        }
    }
}
