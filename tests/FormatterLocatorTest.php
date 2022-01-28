<?php
namespace Aura\Intl;

class FormatterLocatorTest extends \PHPUnit\Framework\TestCase
{
    public function test__constructAndGet()
    {
        $formatters = new FormatterLocator([
            'mock' => function () {
                return new \Aura\Intl\MockFormatter;
            },
        ]);

        $expect = 'Aura\Intl\MockFormatter';
        $actual = $formatters->get('mock');
        $this->assertInstanceOf($expect, $actual);
    }

    public function testSetAndGet()
    {
        $formatters = new FormatterLocator;
        $formatters->set('mock', function () {
            return new \Aura\Intl\MockFormatter;
        });

        $expect = 'Aura\Intl\MockFormatter';
        $actual = $formatters->get('mock');
        $this->assertInstanceOf($expect, $actual);
    }

    public function testGet_noSuchFormatter()
    {
        $formatters = new FormatterLocator;
        $this->expectException('Aura\Intl\Exception\FormatterNotMapped');
        $formatters->get('noSuchFormatter');
    }
}
