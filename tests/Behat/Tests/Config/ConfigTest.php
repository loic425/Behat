<?php

namespace Behat\Tests\Config;

use Behat\Config\Config;
use Behat\Config\Suite;
use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase
{
    public function testConfigCanBeConvertedIntoAnArray(): void
    {
        $config = new Config();

        $this->assertIsArray($config->toArray());
    }

    public function testItReturnsSettings(): void
    {
        $settings = [
            'default' => [
                'gherkin' => [
                    'filters' => [
                        'tags' => '~@php8'
                    ],
                ],
            ],
        ];

        $config = new Config($settings);

        $this->assertEquals($settings, $config->toArray());
    }

    public function testAddingSuites(): void
    {
        $config = new Config();
        $config->withSuite(new Suite('first', ['contexts' => ['FirstContext']]));
        $config->withSuite(new Suite('first', ['contexts' => ['FirstContext']]));

        $this->assertEquals([
            'default' => [
                'suites' => [
                    'first' => [
                        'contexts' => ['FirstContext'],
                    ],
                ],
            ]
        ], $config->toArray());
    }
}
