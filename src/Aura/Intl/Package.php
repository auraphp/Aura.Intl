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
    /**
     * 
     * Message keys and translations in this package.
     * 
     * @var array
     * 
     */
    protected $messages;

    /**
     * 
     * The name of a fallback package to use when a message key does not
     * exist.
     * 
     * @var string
     * 
     */
    protected $fallback;

    /**
     * 
     * The name of the formatter to use when formatting translated messages.
     * 
     * @var string
     * 
     */
    protected $formatter;

    /**
     * 
     * Constructor.
     * 
     * @param string $formatter The name of the formatter to use.
     * 
     * @param string $fallback The name of the fallback package to use.
     * 
     * @param array $messages The messages in this package.
     * 
     */
    public function __construct(
        $formatter      = 'basic',
        $fallback       = null,
        array $messages = []
    ) {
        $this->formatter = $formatter;
        $this->fallback  = $fallback;
        $this->messages  = $messages;
    }

    /**
     * 
     * Sets the messages for this package.
     * 
     * @param array $messages The messages for this package.
     * 
     * @return void
     * 
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * 
     * Gets the messages for this package.
     * 
     * @return array
     * 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * 
     * Sets the formatter name for this package.
     * 
     * @param string $formatter The formatter name for this package.
     * 
     * @return void
     * 
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * 
     * Gets the formatter name for this package.
     * 
     * @return string
     * 
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * 
     * Sets the fallback package name.
     * 
     * @param string $fallback The fallback package name.
     * 
     * @return void
     * 
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
    }

    /**
     * 
     * Gets the fallback package name.
     * 
     * @return string
     * 
     */
    public function getFallback()
    {
        return $this->fallback;
    }
}
