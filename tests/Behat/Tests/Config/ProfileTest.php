<?php

declare(strict_types=1);

namespace Behat\Tests\Config;

use Behat\Config\Extension;
use Behat\Config\Profile;
use PHPUnit\Framework\TestCase;

final class ProfileTest extends TestCase
{
    public function testProfileCanBeConvertedIntoAnArray(): void
    {
        $profile = new Profile('default');

        $this->assertIsArray($profile->toArray());
    }

    public function testItReturnsSettings(): void
    {
        $settings = [
            'extensions' => [
                'some_extension' => [],
            ],
        ];

        $profile = new Profile('default', $settings);

        $this->assertEquals($settings, $profile->toArray());
    }

    public function testAddingExtensions(): void
    {
        $profile = new Profile('default');
        $profile->withExtension(new Extension('Behat\MinkExtension', ['base_url' => 'https://127.0.0.1:8080']));
        $profile->withExtension(new Extension('FriendsOfBehat\MinkDebugExtension', ['directory' => 'etc/build']));

        $this->assertEquals([
            'extensions' => [
                'Behat\MinkExtension' => [
                    'base_url' => 'https://127.0.0.1:8080',
                ],
                'FriendsOfBehat\MinkDebugExtension' => [
                    'directory' => 'etc/build',
                ],
            ],
        ], $profile->toArray());
    }
}
