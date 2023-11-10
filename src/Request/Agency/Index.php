<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request\Agency;

use JoeBocock\LaunchLibrary\Entity\Agency;
use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

class Index extends PaginatedRequest
{
    /** @var string */
    public const PATH = '/agencies/';

    /**
     * @param array{
     *  count: int,
     *  next: string|null,
     *  previous: string|null,
     *  results: array{
     *      id: int,
     *      url: string,
     *      name: string,
     *      featured: bool,
     *      type: string|null,
     *      country_code: string,
     *      abbrev: string,
     *      description: string|null,
     *      administrator: string|null,
     *      founding_year: string|null,
     *      launchers: string,
     *      spacecraft: string,
     *      parent: string|null,
     *      image_url: string|null,
     *      logo_url: string|null,
     *  }[]
     * } $body
     *
     * @return array<Agency>
     */
    public function hydrate(array $body, array $headers = null): array
    {
        $this->parsePagination($body['next']);

        $results = [];

        foreach ($body['results'] as $result) {
            $results[] = new Agency(
                $result['id'],
                $result['url'],
                $result['name'],
                $result['featured'],
                $result['type'],
                $result['country_code'],
                $result['abbrev'],
                $result['description'],
                $result['administrator'],
                $result['founding_year'],
                $result['launchers'],
                $result['spacecraft'],
                $result['parent'],
                $result['image_url'],
                $result['logo_url'],
            );
        }

        return $results;
    }
}
