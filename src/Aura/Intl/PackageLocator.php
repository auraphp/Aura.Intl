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
class PackageLocator implements PackageLocatorInterface
{
    /**
     * 
     * A registry of packages.
     * 
     * Unlike many other registries, this one is two layers deep. The first
     * key is a package name, the second key is a locale code, and the value
     * is the package information for that name and locale.
     * 
     * @var array
     * 
     */
    protected $registry = [];

    /**
     * 
     * Constructor.
     * 
     * @param array $registry A registry of packages.
     * 
     * @see $registry
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
     * Sets a Package object.
     * 
     * @param string $name The package name.
     * 
     * @param string $locale The locale for the package.
     * 
     * @param Package|callable $spec The package object, or a callable to 
     * create and return one.
     * 
     * @return void
     * 
     */
    public function set($name, $locale, $spec)
    {
        $this->registry[$name][$locale] = $spec;
    }

    /**
     * 
     * Gets a Package object.
     * 
     * @param string $name The package name.
     * 
     * @param string $locale The locale for the package.
     * 
     * @return Package
     * 
     */
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
