<?php

declare(strict_types=1);

namespace Behat\Config;

final class Extension implements ExtensionInterface
{
    public function __construct(
        private string $name,
        private array $settings = [],
        private string $profile = 'default',
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function profile(): string
    {
        return $this->profile;
    }

    public function toArray(): array
    {
        return $this->settings;
    }
}
