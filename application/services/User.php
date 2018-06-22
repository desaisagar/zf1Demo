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
     * @return int|mixed
     * @throws Exception
     */
    public function save($data)
    {
        $user = new Application_Model_User($data);
        $result = $this->_userMapper->save($user);
        if ($result) {
            $this->sendEmail($data);
        }
        /** @var Zend_Log $logger */
        $logger = Zend_Registry::get('logger');
        $logger->log('New user with email ' . $data['email'] . ' created.', Zend_Log::INFO);
        return $result;
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

    /**
     * Send email to user
     *
     * @param array $data
     * @return void
     */
    private function sendEmail($data)
    {
        $mailOptions = Zend_Registry::get('mail');
        $server = $mailOptions['server'];
        unset($mailOptions['server']);
        $transport = new Zend_Mail_Transport_Smtp($server, $mailOptions);
        $mail = new Zend_Mail();
        $mail->setFrom('noreply@noreply.com', 'Eastern Enterprise')
            ->setSubject('Your account has been created')
            ->setBodyHtml('Hi ' . $data['name'] . ',<br /><br /> Your account has been created successfully. <br /><br /> Thanks!')
            ->addTo($data['email'])
            ->send($transport);
    }

}