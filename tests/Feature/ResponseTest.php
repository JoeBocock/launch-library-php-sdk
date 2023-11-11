<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Collection\AgencyCollection;
use JoeBocock\LaunchLibrary\Entity\ApiThrottle;

it('returns the correct instance', function (string $fixturePath, callable $callback, string $class) {
    $client = new Client(
        client: mockClient($fixturePath)
    );

    expect($callback($client))->toBeInstanceOf($class);
})->with([
    ['tests/Fixture/ApiThrottle/Get.json', fn (Client $client) => $client->apiThrottle->get(), ApiThrottle::class],
    ['tests/Fixture/Agency/Index.json', fn (Client $client) => $client->agency->index(), AgencyCollection::class],
]);

it('can be encoded', function (string $fixturePath, callable $callback) {
    $contents = json_decode(file_get_contents($fixturePath), true);

    $client = new Client(
        client: mockClient($fixturePath)
    );

    $apiThrottle = json_decode(json_encode($callback($client)));

    expect($apiThrottle)->toHaveKeys(array_keys($contents));
})->with([
    ['tests/Fixture/ApiThrottle/Get.json', fn (Client $client) => $client->apiThrottle->get()],
]);
