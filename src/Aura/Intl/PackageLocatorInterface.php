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
namespace Aura\Intl\Catalog;

/**
 * 
 * Catalog Interface
 * 
 * @package Aura.Intl
 * 
 */
interface CatalogInterface
{
    public function set($name, $locale, $spec);
    public function get($name, $locale);
}
