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
 * A ServiceLocator implementation for loading and retaining formatter objects.
 * 
 * @package Aura.Intl
 * 
 */
class FormatterLocator
{
    /**
     * 
     * A registry to retain formatter objects.
     * 
     * @var array
     * 
     */
    protected $registry;

    /**
     * 
     * Constructor.
     * 
     * @param array $registry An array of key-value pairs where the key is the
     * formatter name (doubles as a method name) and the value is the formatter
     * object. The value may also be a closure that returns a formatter object.
     * Note that is has to be a closure, not just any callable, because the
     * formatter object itself might be callable.
     * 
     */
    public function __construct(array $registry = [])
    {
        foreach ($registry as $name => $spec) {
            $this->set($name, $spec);
        }
    }

    /**
     * 
     * Sets a formatter into the registry by name.
     * 
     * @param string $name The formatter name; this doubles as a method name
     * when called from a template.
     * 
     * @param string $spec The formatter specification, typically a closure that
     * builds and returns a formatter object.
     * 
     * @return void
     * 
     */
    public function set($name, $spec)
    {
        $this->registry[$name] = $spec;
    }

    /**
     * 
     * Gets a formatter from the registry by name.
     * 
     * @param string $name The formatter to retrieve.
     * 
     * @return FormatterInterface A formatter object.
     * 
     */
    public function get($name)
    {
        if (! isset($this->registry[$name])) {
            throw new Exception("Formatter not mapped: '{$name}'.");
        }

        if ($this->registry[$name] instanceof \Closure) {
            $func = $this->registry[$name];
            $this->registry[$name] = $func();
        }

        return $this->registry[$name];
    }
}
