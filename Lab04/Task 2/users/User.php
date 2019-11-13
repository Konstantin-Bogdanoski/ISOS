<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

class User
{
    private $name;
    private $phone;
    private $address;

    /**
     * User constructor.
     * @param $name
     * @param $phone
     * @param $address
     */
    public function __construct($name, $phone, $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function isValid()
    {
        return !preg_match('/[^A-Za-z] [^A-Za-z]$/', $this->getName())
            && !preg_match('/[0-9]7[0-9] [0-9]{3} [0-9]{3}$/', $this->getPhone())
            && !preg_match('/[^A-Za-z] [0-9]{5}/', $this->getAddress());
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }
}