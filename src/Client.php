<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary;

use JoeBocock\LaunchLibrary\Entity\ApiThrottle;
use JoeBocock\LaunchLibrary\Request\ApiThrottle\ApiThrottleRequest;

class Client extends BaseClient
{
    public function apiThrottle(): ApiThrottle
    {
        return $this->send(new ApiThrottleRequest(
            $this->url,
            $this->version
        ));
    }
}
