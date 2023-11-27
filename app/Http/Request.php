<?php

namespace App\Http;

use Slim\Http\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

class Request extends ServerRequest
{
    public function __construct(ServerRequestInterface $request)
    {
        parent::__construct($request);
    }

    public function only(...$keys)
    {
        $keys = (array) $keys;

        return array_intersect_key(
            array_merge($this->getParsedBody() ?? [], $this->getQueryParams()),
            array_flip($keys)
        );
    }
}
