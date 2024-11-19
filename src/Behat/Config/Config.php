<?php

declare(strict_types=1);

namespace Behat\Config;

final class Config implements ConfigInterface
{
    public function __construct(
        private array $settings = []
    ) {
    }

    public function withSuite(SuiteConfigInterface $suite): self
    {
        $this->settings[$suite->profile()]['suites'][$suite->name()] = $suite->toArray();

        return $this;
    }

    public function toArray(): array
    {
        return $this->settings;
    }
}
