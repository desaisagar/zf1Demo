<?php

class Application_Model_User
{

    protected $_id;
    protected $_name;
    protected $_gender;
    protected $_email;
    protected $_mobileNumber;
    protected $_dateOfBirth;
    protected $_designation;
    protected $_branch;
    protected $_createAt;
    protected $_updatedAt;

    /**
     * Application_Model_User constructor.
     *
     * @param array|null $options
     * @return void
     */
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Set options
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws Exception
     */
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        $this->$method($value);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        return $this->$method();
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->_mobileNumber;
    }

    /**
     * @param mixed $mobileNumber
     */
    public function setMobileNumber($mobileNumber): void
    {
        $this->_mobileNumber = $mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->_dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth): void
    {
        $this->_dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->_designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->_designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->_branch;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch): void
    {
        $this->_branch = $branch;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->_createAt;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt): void
    {
        $this->_createAt = $createAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->_updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->_updatedAt = $updatedAt;
    }

}

