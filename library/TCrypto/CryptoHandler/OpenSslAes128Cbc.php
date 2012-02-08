<?php
namespace TCrypto\CryptoHandler;

/**
 * 
 * @author timoh <timoh6@gmail.com>
 * @license Public Domain
 */
class OpenSslAes128Cbc implements CryptoInterface
{
    
    public function __construct()
    {
        //
    }
    
    /**
     *
     * @param string $data
     * @param string $iv
     * @param string $key
     * @return string|false
     */
    public function encrypt($data, $iv, $key)
    {
        // Max. 2^32 blocks with a same key (not realistic in a web application).
        $cipherText = openssl_encrypt($data, 'AES-128-CBC', $key, true, $iv);
        unset($data, $iv, $key);

        return $cipherText;
    }
    
    /**
     *
     * @param string $data
     * @param string $iv
     * @param string $key
     * @return string|false 
     */
    public function decrypt($data, $iv, $key)
    {
        $plainText = openssl_decrypt($data, 'AES-128-CBC', $key, true, $iv);
        unset($data, $iv, $key);

        return $plainText;
    }
    
    /**
     * Returns the needed IV length in bytes.
     * 
     * @return int 
     */
    public function getIvLen()
    {
        // AES block size is 128 bits (16 bytes).
        return 16;
    }
    
    /**
     * Returns the needed key length in bytes.
     * 
     * @return int 
     */
    public function getKeyLen()
    {
        // 16 bytes for AES-128
        return 16;
    }
}

