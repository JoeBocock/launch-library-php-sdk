<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client\Config;

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Client\SubClient;

class ConfigClient extends SubClient
{
    public AgencyTypeClient $agencyType;

    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->agencyType = new AgencyTypeClient($client);
    }
}
