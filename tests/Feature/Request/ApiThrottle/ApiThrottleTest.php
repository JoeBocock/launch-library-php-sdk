<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Entity\ApiThrottle;

it('fetches api throttle information', function () {
    $client = new Client(
        client: mockSuccessfulClient('tests/Fixture/ApiThrottle/ApiThrottle.json')
    );

    expect($client->apiThrottle())->toBeInstanceOf(ApiThrottle::class);
});

it('can be encoded', function () {
    $client = new Client(
        client: mockSuccessfulClient('tests/Fixture/ApiThrottle/ApiThrottle.json')
    );

    $apiThrottle = json_decode(json_encode($client->apiThrottle()));

    expect($apiThrottle)->toHaveKeys([
        'your_request_limit',
        'limit_frequency_secs',
        'current_use',
        'next_use_secs',
        'ident',
    ]);
});
