<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request\Config\AgencyType;

use JoeBocock\LaunchLibrary\Entity\Config\AgencyType;
use JoeBocock\LaunchLibrary\Request\Request;

class GetAgencyType extends Request
{
    /** @var string */
    public const PATH = '/config/agencytype/{id}/';

    private int $id;

    public function getPathParameters(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * @param array{
     *      id: int,
     *      name: string
     *  } $body
     */
    public function hydrate(array $body, array $headers = null): AgencyType
    {
        return new AgencyType(
            $body['id'],
            $body['name']
        );
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
