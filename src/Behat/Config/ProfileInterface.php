<?php

declare(strict_types=1);

namespace Behat\Config;

interface ProfileInterface extends ConfigInterface
{
    public function name(): string;
}
