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
 * Package locator interface.
 * 
 * @package Aura.Intl
 * 
 */
interface PackageLocatorInterface
{
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
    public function set($name, $locale, $spec);

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
    public function get($name, $locale);
}
