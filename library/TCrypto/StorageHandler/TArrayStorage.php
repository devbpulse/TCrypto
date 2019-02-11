<?php
namespace TCrypto\StorageHandler;

/**
 * TArrayStorage is used for mocking the storage implementation.
 * 
 * @author timoh <achmun0526@gmail.com>
 * @license Public Domain
 */
class TArrayStorage implements TStorageInterface
{
    protected $_data = array();

    /**
     * Returns the data.
     * 
     * @return string|false 
     */
    public function fetch()
    {
        return array_key_exists('storage', $this->_data) ? $this->_data['storage'] : false;
    }
    
    /**
     * 
     * @param string $dataString
     * @return boolean
     */
    public function save($dataString)
    {
        $this->_data['storage'] = $dataString;
        
        return true;
    }

    /**
     * 
     * @return boolean
     */
    public function remove()
    {
        $this->_data = array();
        
        return true;
    }
}
