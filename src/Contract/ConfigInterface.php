<?php

declare(strict_types=1);

namespace DaBaiCai\Config\Contract;

interface ConfigInterface
{
    public function get(string $key, mixed $default = null);
}
