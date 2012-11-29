<?php

/**
 * Takes a string and prefix (if provided) and formats into a valid URI.
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright (c) 2012, Mike Hart
 * 
 * @package CmsBundle
 * @subpackage Page
 */

namespace Mh\CmsBundle\Classes\Page;

class MissingPayloadException extends \Exception
{
}

class URIGenerator
{
    /**
     * Holds the payload string.
     * 
     * @var string 
     */
    private $payload = "";
    
    /**
     * Holds the prefix string.
     * 
     * @var string 
     */
    private $prefix = "";
    
    /**
     * Holds the banned characters.
     * 
     * @var array 
     */
    private $bannedCharacters = array(
        "/", "\\", "\$", "!", "\"", "'", "&", "=", "?", " "
    );
    
    /**
     * Sets the payload.
     * 
     * @param string $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        
        return $this;
    }
    
    /**
     * Sets the prefix.
     * 
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        
        return $this;
    }
    
    /**
     * Cleans the payload against $this->banndCharacters. This is a destructive
     * method.
     * 
     * @return self
     */
    private function cleanPayload()
    {
        $this->payload = str_replace(
            $this->bannedCharacters, 
            "-", 
            $this->payload
        );
        
        return $this;
    }

    /**
     * Takes the prefix and payload and concatenates them, leaving the payload
     * set as the newly concatenated string. This method is destructive.
     * 
     * return self
     */
    private function concatenatePrefixAndPayload()
    {
        $uri = "";
        
        if (strlen($this->payload) == 0)
            throw new MissingPayloadException("Payload does not exist.");
        
        if (strlen($this->prefix) > 0)
            $uri = $this->prefix;
        
        $uri = $this->prefix . $this->payload . "/";
        
        $this->payload = $uri;
        
        return $this;
    }
        

    /**
     * Implements the following actions:
     * 
     * 1. Cleans the string.
     * 2. Concatenates the prefix (if any) and payload.
     * 3. Returns the newly created URI.
     * 
     * @return string Cleaned, concatenated uri string
     */
    public function process()
    {
        // Clean and concat.
        $this->cleanPayload()->concatenatePrefixAndPayload();
        
        // Return.
        return $this->payload;
    }
}
