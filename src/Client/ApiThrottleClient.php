<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use JoeBocock\LaunchLibrary\Entity\ApiThrottle;
use JoeBocock\LaunchLibrary\Request\ApiThrottle\Get;

class ApiThrottleClient extends BaseClient
{
    public function get(): ApiThrottle
    {
        return $this->send(new Get(
            $this->url,
            $this->version
        ));
    }
}
