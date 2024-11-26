<?php

declare(strict_types=1);

namespace Behat\Config;

final class Config implements ConfigInterface
{
    public function __construct(
        private array $settings = []
    ) {
    }

    public function withExtension(ExtensionInterface $extension): self
    {
        $this->settings[$extension->profile()]['extensions'][$extension->name()] = $extension->toArray();

        return $this;
    }

    public function toArray(): array
    {
        return $this->settings;
    }
}
