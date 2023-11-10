<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Request\Request;

it('accepts query parameters', function () {
    $class = new class() extends Request {
        public function getQueryParameters(): array
        {
            return [
                'example' => 'test',
                'another' => 123,
            ];
        }

        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    expect($class->getUri()->getQuery())->toBe('example=test&another=123');
});
