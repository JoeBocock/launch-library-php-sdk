<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

it('provides query params by default', function () {
    $class = new class() extends PaginatedRequest {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    expect(array_keys($class->getQueryParameters()))->toBe([
        'limit',
        'offset',
    ]);
});

it('parses pagination from a next link', function () {
    $class = new class() extends PaginatedRequest {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    $class->parsePagination($link = 'https://example.local?limit=123&offset=321');

    expect($class->getNext())->toBe($link);
    expect($class->getQueryParameters())->toBe([
        'limit' => '123',
        'offset' => '321',
    ]);
});

it('stops if next is null', function () {
    $class = new class() extends PaginatedRequest {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    $class->parsePagination(null);

    expect($class->getNext())->toBe(null);
});
