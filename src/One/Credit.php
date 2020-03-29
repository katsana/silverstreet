<?php

namespace Silverstreet\One;

use Laravie\Parser\Xml\Document;
use Laravie\Parser\Xml\Reader;
use Silverstreet\Request;
use Silverstreet\Response;

class Credit extends Request
{
    /**
     * Check Silverstreet account available credit balance.
     */
    public function available(): int
    {
        $xml = $this->fromResponse(
            $this->send('POST', 'creditcheck.php', $this->getApiHeaders(), $this->getApiBody())
        );

        $data = $xml->parse([
            'balance' => ['uses' => 'balance', 'default' => 0],
        ]);

        return (int) $data['balance'];
    }

    /**
     * Convert Response to XML document for parsing.
     */
    protected function fromResponse(Response $response): Document
    {
        return (new Reader(new Document()))->extract($response->getBody());
    }
}
