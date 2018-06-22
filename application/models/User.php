<?php
/**
 * Class Application_Model_User
 */
class Application_Model_User
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_gender;

    /**
     * @var string
     */
    protected $_email;

    /**
     * @var string
     */
    protected $_mobileNumber;

    /**
     * @var string
     */
    protected $_dateOfBirth;

    /**
     * @var string
     */
    protected $_designation;

    /**
     * @var string
     */
    protected $_branch;

    /**
     * @var string
     */
    protected $_createAt;

    /**
     * @var string
     */
    protected $_updatedAt;

    /**
     * Application_Model_User constructor.
     *
     * @param array|null $options The options
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
     * @param array $options The options
     * @return Application_Model_User $this
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
     * Setter for user
     *
     * @param string $name The name of property
     * @param mixed $value The value of property
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
     * Getter for user
     *
     * @param string $name The user name
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
     * Get id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set id
     *
     * @param int|null $id The user id or null
     * @return Application_Model_User
     */
    public function setId($id): Application_Model_User
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * Set name
     *
     * @param string $name The user name
     * @return Application_Model_User
     */
    public function setName($name): Application_Model_User
    {
        $this->_name = $name;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender(): string
    {
        return $this->_gender;
    }

    /**
     * Set gender
     *
     * @param string $gender The user gender
     * @return Application_Model_User
     */
    public function setGender($gender): Application_Model_User
    {
        $this->_gender = $gender;

        return $this;
    }

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * Set email address
     *
     * @param mixed $email The user email address
     * @return Application_Model_User
     */
    public function setEmail($email): Application_Model_User
    {
        $this->_email = $email;

        return $this;
    }

    /**
     * Get mobile number
     *
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->_mobileNumber;
    }

    /**
     * Set mobile number
     *
     * @param string $mobileNumber The user mobile number
     * @return Application_Model_User
     */
    public function setMobileNumber($mobileNumber): Application_Model_User
    {
        $this->_mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get date of birth
     *
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->_dateOfBirth;
    }

    /**
     * Set date of birth
     *
     * @param string $dateOfBirth The user date of birth
     * @return Application_Model_User
     */
    public function setDateOfBirth($dateOfBirth): Application_Model_User
    {
        $this->_dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->_designation;
    }

    /**
     * Set designation
     *
     * @param string $designation The user designation
     * @return Application_Model_User
     */
    public function setDesignation($designation): Application_Model_User
    {
        $this->_designation = $designation;

        return $this;
    }

    /**
     * Get branch
     *
     * @return string
     */
    public function getBranch(): string
    {
        return $this->_branch;
    }

    /**
     * Set branch
     *
     * @param string $branch The user branch
     * @return Application_Model_User
     */
    public function setBranch($branch): Application_Model_User
    {
        $this->_branch = $branch;

        return $this;
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreateAt(): string
    {
        return $this->_createAt;
    }

    /**
     * Set created at
     *
     * @param string $createAt The user created date time
     * @return Application_Model_User
     */
    public function setCreateAt($createAt): Application_Model_User
    {
        $this->_createAt = $createAt;

        return $this;
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->_updatedAt;
    }

    /**
     * Set updated at
     *
     * @param string $updatedAt The user updated date time
     * @return Application_Model_User
     */
    public function setUpdatedAt($updatedAt): Application_Model_User
    {
        $this->_updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Object to array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->_id,
            'name' => $this->_name,
            'gender' => $this->_gender,
            'email' => $this->_email,
            'mobileNumber' => $this->_mobileNumber,
            'dateOfBirth' => $this->_dateOfBirth,
            'designation' => $this->_designation,
            'branch' => $this->_branch
        ];
    }
}
