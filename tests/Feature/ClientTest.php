<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Request\Request;

it('handles 404s', function () {
    $client = new Client(
        client: mockClientWithStatus(404)
    );

    $class = new class() extends Request {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    expect($client->send($class))->toBeNull();
});

it('handles non-200 responses', function () {
    $client = new Client(
        client: mockClientWithStatus(500)
    );

    $class = new class() extends Request {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    $client->send($class);
})->throws(\Exception::class, 'Responded with a non-200 (500) status code.');

it('handles request exceptions', function () {
    $client = new Client(
        client: mockRequestExceptionClient()
    );

    $class = new class() extends Request {
        public function hydrate(array $body, array $headers = null): array
        {
            return [];
        }
    };

    $client->send($class);
})->throws(\Exception::class, 'Error');
