<?php

declare(strict_types=1);

namespace Behat\Config;

interface ExtensionInterface extends ConfigInterface
{
    public function name(): string;

    public function profile(): string;
}
