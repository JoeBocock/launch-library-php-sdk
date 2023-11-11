<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use JoeBocock\LaunchLibrary\Entity\ApiThrottle;
use JoeBocock\LaunchLibrary\Request\ApiThrottle\GetApiThrottle;

class ApiThrottleClient extends SubClient
{
    public function get(): ApiThrottle
    {
        return $this->client->send(new GetApiThrottle(
            $this->client->url,
            $this->client->version
        ));
    }
}
