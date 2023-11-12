<?php

declare(strict_types=1);

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Collection\AgencyListCollection;

it('has values that can be set', function () {
    $client = new Client(
        client: mockClient('tests/Fixture/Agency/Index.json')
    );

    expect($collection = $client->agency->list(
        abbrev: 'test',
        abbrevContains: 'test',
        administrator: 'test',
        administratorContains: 'test',
        agencyType: 1,
        attemptedLandings: 1,
        attemptedLandingsGT: 1,
        attemptedLandingsGTE: 1,
        attemptedLandingsLT: 1,
        attemptedLandingsLTE: 1,
        consecutiveSuccessfulLandings: 1,
        consecutiveSuccessfulLandingsGT: 1,
        consecutiveSuccessfulLandingsGTE: 1,
        consecutiveSuccessfulLandingsLT: 1,
        consecutiveSuccessfulLandingsLTE: 1,
        consecutiveSuccessfulLaunches: 1,
        consecutiveSuccessfulLaunchesGT: 1,
        consecutiveSuccessfulLaunchesGTE: 1,
        consecutiveSuccessfulLaunchesLT: 1,
        consecutiveSuccessfulLaunchesLTE: 1,
        countryCode: ['test'],
        description: 'test',
        descriptionContains: 'test',
        failedLandings: 1,
        failedLandingsGT: 1,
        failedLandingsGTE: 1,
        failedLandingsLT: 1,
        failedLandingsLTE: 1,
        failedLaunches: 1,
        failedLaunchesGT: 1,
        failedLaunchesGTE: 1,
        failedLaunchesLT: 1,
        failedLaunchesLTE: 1,
        featured: true,
        foundingYear: 'test',
        foundingYearContains: 'test',
        id: 1,
        idGT: 1,
        idGTE: 1,
        idLT: 1,
        idLTE: 1,
        name: 'test',
        nameContains: 'test',
        ordering: 'test',
        parent: 1,
        pendingLaunches: 1,
        pendingLaunchesGT: 1,
        pendingLaunchesGTE: 1,
        pendingLaunchesLT: 1,
        pendingLaunchesLTE: 1,
        search: 'test',
        spacecraft: true,
        successfulLandings: 1,
        successfulLandingsGT: 1,
        successfulLandingsGTE: 1,
        successfulLandingsLT: 1,
        successfulLandingsLTE: 1,
        successfulLaunches: 1,
        successfulLaunchesGT: 1,
        successfulLaunchesGTE: 1,
        successfulLaunchesLT: 1,
        successfulLaunchesLTE: 1,
        totalLaunchCount: 1,
        totalLaunchCountGT: 1,
        totalLaunchCountGTE: 1,
        totalLaunchCountLT: 1,
        totalLaunchCountLTE: 1,
    ))->toBeInstanceOf(AgencyListCollection::class);

    $collection->valid();

    expect(json_decode(json_encode($collection->current()), true))->toBe([
        'id' => 225,
        'url' => 'https://lldev.thespacedevs.com/2.2.0/agencies/225/',
        'name' => '1worldspace',
        'featured' => false,
        'type' => 'Commercial',
        'country_code' => 'USA',
        'abbrev' => '1WSP',
        'description' => 'A now nonexistent satellite radio network company that operated two satellites to bring coverage with 62 stations to most of the Eastern Hemisphere. They went bankrupt in 2008. There has been a plan to relaunch the company, but it was announced in 2011, and nothing has been done since.',
        'administrator' => null,
        'founding_year' => '1960',
        'launchers' => '',
        'spacecraft' => 'AfriStar | AsiaStar',
        'parent' => null,
        'image_url' => null,
        'logo_url' => null,
    ]);
});
