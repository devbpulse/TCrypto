<?php
namespace TCrypto\Plugin;

/**
 * 
 * @author timoh <achmun0526@gmail.com>
 * @license Public Domain
 */
class TCompressPlugin implements PluginInterface
{
    public function saveAction($data)
    {
        if ($data === false)
        {
            return false;
        }
        
        return gzdeflate($data);
    }
    
    public function extractAction($data)
    {
        return gzinflate($data);
    }

    public function isEncryptionCompatible()
    {
        return false;
    }
}
