<?php

declare(strict_types=1);

namespace Behat\Config;

use Behat\Testwork\Suite\Suite;

final class Config implements ConfigInterface
{
    public function __construct(
        private array $settings = []
    ) {
    }

    public function withSuite(Suite $suite, string $profile = 'default'): self
    {
        $this->settings[$profile]['suites'][$suite->getName()] = $suite->getSettings();

        return $this;
    }

    public function toArray(): array
    {
        return $this->settings;
    }
}
