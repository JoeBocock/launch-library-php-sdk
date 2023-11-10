<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request\ApiThrottle;

use JoeBocock\LaunchLibrary\Entity\ApiThrottle;
use JoeBocock\LaunchLibrary\Request\Request;

class Get extends Request
{
    /** @var string */
    public const PATH = '/api-throttle/';

    /**
     * @param array{
     *  your_request_limit: int,
     *  limit_frequency_secs: int,
     *  current_use: int,
     *  next_use_secs: int,
     *  ident: string
     * } $body
     */
    public function hydrate(array $body, array $headers = null): ApiThrottle
    {
        return new ApiThrottle(
            $body['your_request_limit'],
            $body['limit_frequency_secs'],
            $body['current_use'],
            $body['next_use_secs'],
            $body['ident'],
        );
    }
}
