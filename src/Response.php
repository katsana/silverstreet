<?php

namespace Silverstreet;

use DomainException;
use Laravie\Codex\Response as BaseResponse;

class Response extends BaseResponse
{
    /**
     * Convert response body to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        throw new DomainException('Unable to convert response to array!');
    }
}
