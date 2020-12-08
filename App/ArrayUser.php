<?php
require_once __DIR__ . '/PasKey.php';

class ArrayUser
{
    private $arr;

    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    //__________________ get
    /**
     * @param string $param password
     * @return mixed
     */
    public function getValue(string $param)
    {
        return $this->arr[$param];
    }

    public function getPassword($key)
    {
        $cr = new PasKey($key);
        $decode = $cr->dec($this->getValue('password'));


        $this->arr['password'] = $decode;
        return $this->arr;
    }

    //__________________ set
    /**
     * @param string $param password
     * @param string $value token
     */
    public function setValue(string $param, string $value)
    {
        $this->arr[$param] = $value;
    }

    /**
     * @param string $password пароль user
     * @param string $key ключ для encrypt
     */
    public function setPassword(string $password, string $key)
    {
        $cr = new PasKey($key);
        $this->setValue('password', $cr->enc($password));
    }
}
