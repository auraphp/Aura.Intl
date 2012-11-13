<?php
/**
 * 
 * This file is part of the Aura Project for PHP.
 * 
 * @package Aura.Intl
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Intl;

/**
 * 
 * Message Catalog
 * 
 * @package Aura.Intl
 * 
 */
class Package
{
    protected $messages;
    
    protected $fallback;
    
    protected $formatter;
    
    public function __construct(
        $formatter      = 'basic',
        $fallback       = null,
        array $messages = []
    ) {
        $this->formatter = $formatter;
        $this->fallback  = $fallback;
        $this->messages  = $messages;
    }
    
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }
    
    public function getMessages()
    {
        return $this->messages;
    }
    
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }
    
    public function getFormatter()
    {
        return $this->formatter;
    }
    
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
    }
    
    public function getFallback()
    {
        return $this->fallback;
    }
}
