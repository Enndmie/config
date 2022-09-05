<?php

declare(strict_types=1);

namespace Small\Utils\Packer;

use Small\Utils\Contract\PackerInterface;

use function serialize;
use function unserialize;

class PhpSerializePacker implements PackerInterface
{
    public function pack($data): string
    {
        return serialize($data);
    }

    public function unpack(string $data)
    {
        return unserialize($data);
    }
}
