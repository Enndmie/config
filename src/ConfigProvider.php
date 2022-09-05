<?php

declare(strict_types=1);

namespace DaBaiCai\Config;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'bindings' => [
                'DaBaiCai\Config\Contract\ConfigInterface' => 'DaBaiCai\Config\Repository',
            ],
        ];
    }
}
