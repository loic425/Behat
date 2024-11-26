<?php

namespace Behat\Tests\Config;

use Behat\Config\Config;
use Behat\Config\Extension;
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

    public function testAddingExtensions(): void
    {
        $config = new Config();
        $config->withExtension(new Extension('Behat\MinkExtension', ['base_url' => 'https://127.0.0.1:8080']));
        $config->withExtension(new Extension('FriendsOfBehat\MinkDebugExtension', ['directory' => 'etc/build']));

        $this->assertEquals([
            'default' => [
                'extensions' => [
                    'Behat\MinkExtension' => [
                        'base_url' => 'https://127.0.0.1:8080',
                    ],
                    'FriendsOfBehat\MinkDebugExtension' => [
                        'directory' => 'etc/build',
                    ],
                ],
            ]
        ], $config->toArray());
    }
}
