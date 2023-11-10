<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use JoeBocock\LaunchLibrary\Collection\AgencyCollection;
use JoeBocock\LaunchLibrary\Request\Agency\Index;

class AgencyClient extends SubClient
{
    public function index(): AgencyCollection
    {
        return new AgencyCollection(
            $this->client,
            new Index(
                $this->client->url,
                $this->client->version
            ),
        );
    }
}
