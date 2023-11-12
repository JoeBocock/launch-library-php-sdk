<?php

declare(strict_types=1);

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Collection\AgencyListCollection;
use JoeBocock\LaunchLibrary\Collection\Collection;
use JoeBocock\LaunchLibrary\Collection\Config\AgencyTypeCollection;
use JoeBocock\LaunchLibrary\Request\Agency\ListAgency;
use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

it('can paginate', function () {
    $mock = new MockHandler([
        new Response(
            body: json_encode($pageOne = [
                'count' => 2,
                'next' => 'https://example.local?limit=1&offset=1',
                'previous' => null,
                'results' => [
                    ['id' => 1],
                    ['id' => 2],
                ],
            ])
        ),
        new Response(
            body: json_encode($pageTwo = [
                'count' => 2,
                'next' => 'https://example.local?limit=2&offset=2',
                'previous' => null,
                'results' => [
                    ['id' => 3],
                    ['id' => 4],
                ],
            ])
        ),
    ]);

    $client = new Client(
        client: new GuzzleHttpClient(['handler' => HandlerStack::create($mock)])
    );

    $request = new class() extends PaginatedRequest {
        public function hydrate(array $body, array $headers = null): array
        {
            $this->parsePagination(isset($body['next']) ? $body['next'] : null);

            $results = [];

            foreach ($body['results'] as $result) {
                $results[] = [
                    'id' => $result['id'],
                ];
            }

            return $results;
        }
    };

    $collection = new class($client, $request, []) extends Collection {};

    $collection->valid();

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
    $class = new class(new Client(), new ListAgency()) extends Collection {};

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

    expect($collection = $client->agency->list())->toBeInstanceOf(AgencyListCollection::class);

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

    expect($collection = $client->agency->list())->toBeInstanceOf(AgencyListCollection::class);
    expect($collection->valid())->toBe(false);
});

it('resolves to an instance', function (string $fixturePath, callable $callback, string $collectionClass) {
    $mock = new MockHandler([
        new Response(
            body: $data = file_get_contents($fixturePath)
        ),
    ]);

    $data = json_decode($data, true);

    $client = new Client(
        client: new GuzzleHttpClient(['handler' => HandlerStack::create($mock)])
    );

    $collection = $callback($client);

    expect($collection)->toBeInstanceOf($collectionClass);

    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe($data['results'][0]);

    $collection->next();
    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe($data['results'][1]);
})->with([
    ['tests/Fixture/Config/AgencyType/Index.json', fn (Client $client) => $client->config->agencyType->list(), AgencyTypeCollection::class],
]);
