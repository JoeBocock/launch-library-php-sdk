<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client\Config;

use JoeBocock\LaunchLibrary\Client\SubClient;
use JoeBocock\LaunchLibrary\Collection\Config\AgencyTypeCollection;
use JoeBocock\LaunchLibrary\Entity\Config\AgencyType;
use JoeBocock\LaunchLibrary\Request\Config\AgencyType\GetAgencyType;
use JoeBocock\LaunchLibrary\Request\Config\AgencyType\ListAgencyType;

class AgencyTypeClient extends SubClient
{
    public function list(string $ordering = null, string $search = null): AgencyTypeCollection
    {
        $request = new ListAgencyType(
            $this->client->url,
            $this->client->version
        );

        if ($ordering) {
            $request->setOrdering($ordering);
        }

        if ($search) {
            $request->setSearch($search);
        }

        return new AgencyTypeCollection(
            $this->client,
            $request
        );
    }

    public function get(int $id): AgencyType|null
    {
        return $this->client->send(
            (new GetAgencyType(
                $this->client->url,
                $this->client->version
            ))->setId($id)
        );
    }
}
