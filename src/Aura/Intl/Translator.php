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
 * Translator to translate the message
 * 
 * @package Aura.Intl
 * 
 */
class Translator implements TranslatorInterface
{
    /**
     *
     * @var string
     */
    protected $fallback;

    /**
     *
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     *
     * @var string
     */
    protected $locale;

    /**
     *
     * @var array
     */
    protected $messages = [];

    /**
     * 
     * constructor
     * 
     * @param string $locale
     * @param array $messages
     * @param FormatterInterface $formatter
     * @param TranslatorInterface $fallback
     */
    public function __construct(
        $locale,
        array $messages,
        FormatterInterface $formatter,
        TranslatorInterface $fallback = null
    ) {
        $this->locale    = $locale;
        $this->messages  = $messages;
        $this->formatter = $formatter;
        $this->fallback  = $fallback;
    }

    /**
     * 
     * Get the message
     * 
     * @param string $key
     * 
     * @return boolean
     * 
     */
    protected function getMessage($key)
    {
        if (isset($this->messages[$key])) {
            return $this->messages[$key];
        }

        if ($this->fallback) {
            // get the message from the fallback translator
            $message = $this->fallback->getMessage($key);
            // speed optimization: retain locally
            $this->messages[$key] = $message;
            // done!
            return $message;
        }

        // no local message, no fallback
        return false;
    }

    /**
     * 
     * Translate the key with the token values replaced
     * 
     * @param string $key
     * 
     * @param array $tokens_values
     * 
     * @return string
     * 
     */
    public function translate($key, array $tokens_values = [])
    {
        // get the message string
        $message = $this->getMessage($key);

        // do we have a message string?
        if (! $message) {
            // no, return the message key as-is
            return $key;
        }

        // are there token replacement values?
        if (! $tokens_values) {
            // no, return the message string as-is
            return $message;
        }

        // run message string through formatter to replace tokens with values
        return $this->formatter->format($this->locale, $message, $tokens_values);
    }
}
