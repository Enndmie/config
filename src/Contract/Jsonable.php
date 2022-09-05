<?php

declare(strict_types=1);

namespace Small\Utils\Contract;

interface Jsonable
{
    public function __toString(): string;
}
