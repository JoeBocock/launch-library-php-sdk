<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request\Config\AgencyType;

use JoeBocock\LaunchLibrary\Entity\Config\AgencyType;
use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

class ListAgencyType extends PaginatedRequest
{
    /** @var string */
    public const PATH = '/config/agencytype/';

    private string|null $ordering = null;
    private string|null $search = null;

    public function getQueryParameters(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'ordering' => $this->ordering,
            'search' => $this->search,
        ];
    }

    /**
     * @param array{
     *  count: int,
     *  next: string|null,
     *  previous: string|null,
     *  results: null|array{
     *      id: int,
     *      name: string
     *  }[]
     * } $body
     *
     * @return array<AgencyType>
     */
    public function hydrate(array $body, array $headers = null): array
    {
        $this->parsePagination(isset($body['next']) ? $body['next'] : null);

        $results = [];

        if (isset($body['results'])) {
            foreach ($body['results'] as $result) {
                $results[] = new AgencyType(
                    $result['id'],
                    $result['name'],
                );
            }
        }

        return $results;
    }

    public function setOrdering(string $ordering): self
    {
        $this->ordering = $ordering;

        return $this;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }
}
