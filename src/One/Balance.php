<?php

namespace Silverstreet\One;

use Laravie\Parser\Xml\Document;
use Laravie\Parser\Xml\Reader;
use Silverstreet\Request;
use Silverstreet\Response;

class Balance extends Request
{
    /**
     * Check Silverstreet account balance.
     *
     * @return int
     */
    public function check(): int
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
     *
     * @param \Silverstreet\Response $response
     *
     * @return \Laravie\Parser\Xml\Document
     */
    protected function fromResponse(Response $response): Document
    {
        return (new Reader(new Document()))->extract($response->getBody());
    }
}
