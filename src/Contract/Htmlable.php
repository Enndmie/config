<?php

declare(strict_types=1);

namespace Small\Utils\Contract;

interface Htmlable
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml();
}
