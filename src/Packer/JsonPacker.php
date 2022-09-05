<?php

declare(strict_types=1);

namespace Small\Utils\Packer;

use Small\Utils\Contract\PackerInterface;

use function json_decode;
use function json_encode;

class JsonPacker implements PackerInterface
{
    public function pack($data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function unpack(string $data)
    {
        return json_decode($data, true);
    }
}
