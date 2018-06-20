<?php

/**
 * Class UserTest
 *
 * Tests for user service
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test create user
     */
    public function testCreateUser()
    {
        $userService = new Application_Service_User();
        $userMapperMock = $this->getMock(
            Application_Model_UserMapper::class,
            array ('save')
        );
        $userMapperMock->expects($this->any())
            ->method('save');
        $result = $userService->save($this->getUserData());
        $this->assertGreaterThan(0, $result);
    }

    /**
     * test list all users
     */
    public function testFindAllUser()
    {
        $userService = new Application_Service_User();
        $userMapperMock = $this->getMock(
            Application_Model_UserMapper::class,
            array ('selectAll')
        );
        $userMapperMock->expects($this->any())
            ->method('selectAll');
        $result = $userService->findAll(1);
        $this->assertInstanceOf(Zend_Paginator::class, $result);
    }

    /**
     * test find user by id
     */
    public function testFindUserById()
    {
        $userTable = new Application_Model_DbTable_UserDbTable();
        $id = $userTable->fetchRow(1)->id;
        $userService = new Application_Service_User();
        $userMapperMock = $this->getMock(
            Application_Model_UserMapper::class,
            array ('find')
        );
        $userMapperMock->expects($this->any())
            ->method('find');
        $result = $userService->findById($id);
        $this->assertInstanceOf(Application_Model_User::class, $result);
    }

    /**
     * test delete user
     */
    public function testDeleteUserById()
    {
        $userTable = new Application_Model_DbTable_UserDbTable();
        $id = $userTable->fetchRow(1)->id;
        $userService = new Application_Service_User();
        $userMapperMock = $this->getMock(
            Application_Model_UserMapper::class,
            array ('delete')
        );
        $userMapperMock->expects($this->any())
            ->method('delete');
        $result = $userService->delete($id);
        $this->assertInternalType('int', $result);
    }

    /**
     * Get user data
     *
     * @return array
     */
    private function getUserData()
    {
        return [
            'name' => 'Sagar Desai',
            'gender' => 'Male',
            'email' => 'test@easternenterprise.com',
            'mobileNumber' => '9568596575',
            'dateOfBirth' => '31-10-1990',
            'designation' => 'Developer',
            'branch' => 'PHP'
        ];
    }

}