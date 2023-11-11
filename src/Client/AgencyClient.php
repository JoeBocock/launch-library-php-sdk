<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use JoeBocock\LaunchLibrary\Collection\AgencyListCollection;
use JoeBocock\LaunchLibrary\Request\Agency\ListAgency;

class AgencyClient extends SubClient
{
    /**
     * @param array<string>|null $countryCode
     */
    public function list(
        string $abbrev = null,
        string $abbrevContains = null,
        string $administrator = null,
        string $administratorContains = null,
        int $agencyType = null,
        int $attemptedLandings = null,
        int $attemptedLandingsGT = null,
        int $attemptedLandingsGTE = null,
        int $attemptedLandingsLT = null,
        int $attemptedLandingsLTE = null,
        int $consecutiveSuccessfulLandings = null,
        int $consecutiveSuccessfulLandingsGT = null,
        int $consecutiveSuccessfulLandingsGTE = null,
        int $consecutiveSuccessfulLandingsLT = null,
        int $consecutiveSuccessfulLandingsLTE = null,
        int $consecutiveSuccessfulLaunches = null,
        int $consecutiveSuccessfulLaunchesGT = null,
        int $consecutiveSuccessfulLaunchesGTE = null,
        int $consecutiveSuccessfulLaunchesLT = null,
        int $consecutiveSuccessfulLaunchesLTE = null,
        array $countryCode = null,
        string $description = null,
        string $descriptionContains = null,
        int $failedLandings = null,
        int $failedLandingsGT = null,
        int $failedLandingsGTE = null,
        int $failedLandingsLT = null,
        int $failedLandingsLTE = null,
        int $failedLaunches = null,
        int $failedLaunchesGT = null,
        int $failedLaunchesGTE = null,
        int $failedLaunchesLT = null,
        int $failedLaunchesLTE = null,
        bool $featured = null,
        string $foundingYear = null,
        string $foundingYearContains = null,
        int $id = null,
        int $idGT = null,
        int $idGTE = null,
        int $idLT = null,
        int $idLTE = null,
        string $name = null,
        string $nameContains = null,
        string $ordering = null,
        int $parent = null,
        int $pendingLaunches = null,
        int $pendingLaunchesGT = null,
        int $pendingLaunchesGTE = null,
        int $pendingLaunchesLT = null,
        int $pendingLaunchesLTE = null,
        string $search = null,
        bool $spacecraft = null,
        int $successfulLandings = null,
        int $successfulLandingsGT = null,
        int $successfulLandingsGTE = null,
        int $successfulLandingsLT = null,
        int $successfulLandingsLTE = null,
        int $successfulLaunches = null,
        int $successfulLaunchesGT = null,
        int $successfulLaunchesGTE = null,
        int $successfulLaunchesLT = null,
        int $successfulLaunchesLTE = null,
        int $totalLaunchCount = null,
        int $totalLaunchCountGT = null,
        int $totalLaunchCountGTE = null,
        int $totalLaunchCountLT = null,
        int $totalLaunchCountLTE = null,
    ): AgencyListCollection {
        $request = new ListAgency(
            $this->client->url,
            $this->client->version
        );

        if ($abbrev) {
            $request->setAbbrev($abbrev);
        }

        if ($abbrevContains) {
            $request->setAbbrevContains($abbrevContains);
        }

        if ($administrator) {
            $request->setAdministrator($administrator);
        }

        if ($administratorContains) {
            $request->setAdministratorContains($administratorContains);
        }

        if ($agencyType) {
            $request->setAgencyType($agencyType);
        }

        if ($attemptedLandings) {
            $request->setAttemptedLandings($attemptedLandings);
        }

        if ($attemptedLandingsGT) {
            $request->setAttemptedLandingsGT($attemptedLandingsGT);
        }

        if ($attemptedLandingsGTE) {
            $request->setAttemptedLandingsGTE($attemptedLandingsGTE);
        }

        if ($attemptedLandingsLT) {
            $request->setAttemptedLandingsLT($attemptedLandingsLT);
        }

        if ($attemptedLandingsLTE) {
            $request->setAttemptedLandingsLTE($attemptedLandingsLTE);
        }

        if ($consecutiveSuccessfulLandings) {
            $request->setConsecutiveSuccessfulLandings($consecutiveSuccessfulLandings);
        }

        if ($consecutiveSuccessfulLandingsGT) {
            $request->setConsecutiveSuccessfulLandingsGT($consecutiveSuccessfulLandingsGT);
        }

        if ($consecutiveSuccessfulLandingsGTE) {
            $request->setConsecutiveSuccessfulLandingsGTE($consecutiveSuccessfulLandingsGTE);
        }

        if ($consecutiveSuccessfulLandingsLT) {
            $request->setConsecutiveSuccessfulLandingsLT($consecutiveSuccessfulLandingsLT);
        }

        if ($consecutiveSuccessfulLandingsLTE) {
            $request->setConsecutiveSuccessfulLandingsLTE($consecutiveSuccessfulLandingsLTE);
        }

        if ($consecutiveSuccessfulLaunches) {
            $request->setConsecutiveSuccessfulLaunches($consecutiveSuccessfulLaunches);
        }

        if ($consecutiveSuccessfulLaunchesGT) {
            $request->setConsecutiveSuccessfulLaunchesGT($consecutiveSuccessfulLaunchesGT);
        }

        if ($consecutiveSuccessfulLaunchesGTE) {
            $request->setConsecutiveSuccessfulLaunchesGTE($consecutiveSuccessfulLaunchesGTE);
        }

        if ($consecutiveSuccessfulLaunchesLT) {
            $request->setConsecutiveSuccessfulLaunchesLT($consecutiveSuccessfulLaunchesLT);
        }

        if ($consecutiveSuccessfulLaunchesLTE) {
            $request->setConsecutiveSuccessfulLaunchesLTE($consecutiveSuccessfulLaunchesLTE);
        }

        if ($countryCode) {
            $request->setCountryCode($countryCode);
        }

        if ($description) {
            $request->setDescription($description);
        }

        if ($descriptionContains) {
            $request->setDescriptionContains($descriptionContains);
        }

        if ($failedLandings) {
            $request->setFailedLandings($failedLandings);
        }

        if ($failedLandingsGT) {
            $request->setFailedLandingsGT($failedLandingsGT);
        }

        if ($failedLandingsGTE) {
            $request->setFailedLandingsGTE($failedLandingsGTE);
        }

        if ($failedLandingsLT) {
            $request->setFailedLandingsLT($failedLandingsLT);
        }

        if ($failedLandingsLTE) {
            $request->setFailedLandingsLTE($failedLandingsLTE);
        }

        if ($failedLaunches) {
            $request->setFailedLaunches($failedLaunches);
        }

        if ($failedLaunchesGT) {
            $request->setFailedLaunchesGT($failedLaunchesGT);
        }

        if ($failedLaunchesGTE) {
            $request->setFailedLaunchesGTE($failedLaunchesGTE);
        }

        if ($failedLaunchesLT) {
            $request->setFailedLaunchesLT($failedLaunchesLT);
        }

        if ($failedLaunchesLTE) {
            $request->setFailedLaunchesLTE($failedLaunchesLTE);
        }

        if ($featured !== null) {
            $request->setFeatured($featured);
        }

        if ($foundingYear) {
            $request->setFoundingYear($foundingYear);
        }

        if ($foundingYearContains) {
            $request->setFoundingYearContains($foundingYearContains);
        }

        if ($id) {
            $request->setId($id);
        }

        if ($idGT) {
            $request->setIdGT($idGT);
        }

        if ($idGTE) {
            $request->setIdGTE($idGTE);
        }

        if ($idLT) {
            $request->setIdLT($idLT);
        }

        if ($idLTE) {
            $request->setIdLTE($idLTE);
        }

        if ($name) {
            $request->setName($name);
        }

        if ($nameContains) {
            $request->setNameContains($nameContains);
        }

        if ($ordering) {
            $request->setOrdering($ordering);
        }

        if ($parent) {
            $request->setParent($parent);
        }

        if ($pendingLaunches) {
            $request->setPendingLaunches($pendingLaunches);
        }

        if ($pendingLaunchesGT) {
            $request->setPendingLaunchesGT($pendingLaunchesGT);
        }

        if ($pendingLaunchesGTE) {
            $request->setPendingLaunchesGTE($pendingLaunchesGTE);
        }

        if ($pendingLaunchesLT) {
            $request->setPendingLaunchesLT($pendingLaunchesLT);
        }

        if ($pendingLaunchesLTE) {
            $request->setPendingLaunchesLTE($pendingLaunchesLTE);
        }

        if ($search) {
            $request->setSearch($search);
        }

        if ($spacecraft !== null) {
            $request->setSpacecraft($spacecraft);
        }

        if ($successfulLandings) {
            $request->setSuccessfulLandings($successfulLandings);
        }

        if ($successfulLandingsGT) {
            $request->setSuccessfulLandingsGT($successfulLandingsGT);
        }

        if ($successfulLandingsGTE) {
            $request->setSuccessfulLandingsGTE($successfulLandingsGTE);
        }

        if ($successfulLandingsLT) {
            $request->setSuccessfulLandingsLT($successfulLandingsLT);
        }

        if ($successfulLandingsLTE) {
            $request->setSuccessfulLandingsLTE($successfulLandingsLTE);
        }

        if ($successfulLaunches) {
            $request->setSuccessfulLaunches($successfulLaunches);
        }

        if ($successfulLaunchesGT) {
            $request->setSuccessfulLaunchesGT($successfulLaunchesGT);
        }

        if ($successfulLaunchesGTE) {
            $request->setSuccessfulLaunchesGTE($successfulLaunchesGTE);
        }

        if ($successfulLaunchesLT) {
            $request->setSuccessfulLaunchesLT($successfulLaunchesLT);
        }

        if ($successfulLaunchesLTE) {
            $request->setSuccessfulLaunchesLTE($successfulLaunchesLTE);
        }

        if ($totalLaunchCount) {
            $request->setTotalLaunchCount($totalLaunchCount);
        }

        if ($totalLaunchCountGT) {
            $request->setTotalLaunchCountGT($totalLaunchCountGT);
        }

        if ($totalLaunchCountGTE) {
            $request->setTotalLaunchCountGTE($totalLaunchCountGTE);
        }

        if ($totalLaunchCountLT) {
            $request->setTotalLaunchCountLT($totalLaunchCountLT);
        }

        if ($totalLaunchCountLTE) {
            $request->setTotalLaunchCountLTE($totalLaunchCountLTE);
        }

        return new AgencyListCollection(
            $this->client,
            $request,
        );
    }
}
