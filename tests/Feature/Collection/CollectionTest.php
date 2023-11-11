<?php

declare(strict_types=1);

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Collection\AgencyCollection;
use JoeBocock\LaunchLibrary\Collection\Collection;
use JoeBocock\LaunchLibrary\Request\Agency\Index;

it('resolves a specific collection instance', function () {
    $mock = new MockHandler([
        new Response(
            body: $pageOne = file_get_contents('tests/Fixture/Agency/IndexSmallPageOne.json')
        ),
        new Response(
            body: $pageTwo = file_get_contents('tests/Fixture/Agency/IndexSmallPageTwo.json')
        ),
    ]);

    $client = new Client(
        client: new GuzzleHttpClient(['handler' => HandlerStack::create($mock)])
    );

    expect($collection = $client->agency->index())->toBeInstanceOf(AgencyCollection::class);

    $collection->valid();

    $pageOne = json_decode($pageOne, true);
    $pageTwo = json_decode($pageTwo, true);

    expect(json_decode(json_encode($collection->current()), true))->toBe($pageOne['results'][0]);
    $params = $collection->request->getQueryParameters();
    expect(['limit' => $params['limit'], 'offset' => $params['offset']])->toBe(['limit' => '1', 'offset' => '1']);

    $collection->next();
    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe($pageOne['results'][1]);

    $collection->next();
    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe($pageTwo['results'][0]);
    $params = $collection->request->getQueryParameters();
    expect(['limit' => $params['limit'], 'offset' => $params['offset']])->toBe(['limit' => '2', 'offset' => '2']);

    $collection->next();
    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe($pageTwo['results'][1]);
});

it('has a key', function () {
    $class = new class(new Client(), new Index()) extends Collection {};

    expect($class->key())->toBe(0);

    $class->next();

    expect($class->key())->toBe(1);
});

it('can handle null next', function () {
    $mock = new MockHandler([
        new Response(
            body: file_get_contents('tests/Fixture/Agency/IndexNullNext.json')
        ),
    ]);

    $client = new Client(
        client: new GuzzleHttpClient(['handler' => HandlerStack::create($mock)])
    );

    expect($collection = $client->agency->index())->toBeInstanceOf(AgencyCollection::class);

    $collection->valid();
    $collection->next();
    $collection->valid();
});

it('can handle no results', function () {
    $mock = new MockHandler([
            new Response(
                body: json_encode([])
            ),
        ]);

    $client = new Client(
        client: new GuzzleHttpClient(['handler' => HandlerStack::create($mock)])
    );

    expect($collection = $client->agency->index())->toBeInstanceOf(AgencyCollection::class);
    expect($collection->valid())->toBe(false);
});
