<?php
namespace Aura\Intl;

class TranslatorLocatorFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function test__newInstance()
    {
        $factory = new TranslatorLocatorFactory();
        $this->assertInstanceOf('Aura\Intl\TranslatorLocator', $factory->newInstance());
    }
}
