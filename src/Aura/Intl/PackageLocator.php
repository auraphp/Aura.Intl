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
 * A ServiceLocator implementation for loading and retaining translator objects.
 * 
 * @package Aura.Intl
 * 
 */
class PackageLocator
{
    /**
     *
     * @var array
     */
    protected $registry = [];

    /**
     * 
     * Constructor
     * 
     * @param array $registry
     * 
     */
    public function __construct(array $registry = [])
    {
        foreach ($registry as $name => $locales) {
            foreach ($locales as $locale => $spec) {
                $this->set($name, $locale, $spec);
            }
        }
    }

    /**
     * 
     * set the package specification
     * 
     * @param string $name
     * 
     * @param string $locale
     * 
     * @param array|callable $spec
     * 
     */
    public function set($name, $locale, $spec)
    {
        $this->registry[$name][$locale] = $spec;
    }
    
    public function get($name, $locale)
    {
        if (! isset($this->registry[$name][$locale])) {
            throw new Exception("Package '$name' with locale '$locale' is not registered.");
        }
        
        if ($this->registry[$name][$locale] instanceof \Closure) {
            $func = $this->registry[$name][$locale];
            $this->registry[$name][$locale] = $func();
        }
        
        return $this->registry[$name][$locale];
    }
}
