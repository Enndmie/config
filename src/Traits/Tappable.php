<?php

declare(strict_types=1);

namespace Small\Utils\Traits;

use function Small\Utils\tap;

/**
 * Most of the methods in this file come from illuminate
 * thanks Laravel Team provide such a useful class.
 */
trait Tappable
{
    /**
     * Call the given Closure with this instance then return the instance.
     *
     * @param null|callable $callback
     * @return mixed
     */
    public function tap($callback = null)
    {
        return tap($this, $callback);
    }
}
