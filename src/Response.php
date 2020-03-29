<?php

namespace Silverstreet;

use DomainException;

class Response extends \Laravie\Codex\Response
{
    /**
     * Convert response body to array.
     */
    public function toArray(): array
    {
        throw new DomainException('Unable to convert response to array!');
    }
}
