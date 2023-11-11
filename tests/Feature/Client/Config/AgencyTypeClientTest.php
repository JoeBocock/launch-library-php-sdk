<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Collection\Config\AgencyTypeCollection;

it('has values that can be set', function () {
    $client = new Client(
        client: mockClient('tests/Fixture/Config/AgencyType/Index.json')
    );

    expect($collection = $client->config->agencyType->list(
        ordering: 'test',
        search: 'test'
    ))->toBeInstanceOf(AgencyTypeCollection::class);

    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe([
        'id' => 1,
        'name' => 'Government',
    ]);
});
