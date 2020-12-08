<?php

const METHOD = 'aes-128-cbc';
const NUMBER = '0123456789012345';

class PasKey
{
    private $key;
    private $method;
    private $number;

    /**
     * @param string $key ключ для encrypt
     * @param string $method
     * @param string $number
     */

    public function __construct(string $key, string $method = METHOD, string $number = NUMBER)
    {
        $this->key = $key;
        $this->method = $method;
        $this->number = $number;
    }

    //    public function setKey()
    //    {
    //        $this->key = $key;
    //        return self::$key;
    //    }

    /**
     * @param string $str
     * @return string
     */

    public function enc(string $str)
    {
        $enc = openssl_encrypt($str, $this->method, $this->key, false, $this->number);
        return base64_encode($enc);
    }

    public function dec(string $enc_str)
    {
        $decode = base64_decode($enc_str);
        return openssl_decrypt($decode, $this->method, $this->key, false, $this->number);
    }
}
