<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request\Agency;

use JoeBocock\LaunchLibrary\Entity\AgencyIndex;
use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

class ListAgency extends PaginatedRequest
{
    /** @var string */
    public const PATH = '/agencies/';

    private string|null $abbrev = null;
    private string|null $abbrevContains = null;
    private string|null $administrator = null;
    private string|null $administratorContains = null;
    private int|null $agencyType = null;
    private int|null $attemptedLandings = null;
    private int|null $attemptedLandingsGT = null;
    private int|null $attemptedLandingsGTE = null;
    private int|null $attemptedLandingsLT = null;
    private int|null $attemptedLandingsLTE = null;
    private int|null $consecutiveSuccessfulLandings = null;
    private int|null $consecutiveSuccessfulLandingsGT = null;
    private int|null $consecutiveSuccessfulLandingsGTE = null;
    private int|null $consecutiveSuccessfulLandingsLT = null;
    private int|null $consecutiveSuccessfulLandingsLTE = null;
    private int|null $consecutiveSuccessfulLaunches = null;
    private int|null $consecutiveSuccessfulLaunchesGT = null;
    private int|null $consecutiveSuccessfulLaunchesGTE = null;
    private int|null $consecutiveSuccessfulLaunchesLT = null;
    private int|null $consecutiveSuccessfulLaunchesLTE = null;
    /** @var array<string>|null */
    private array|null $countryCode = null;
    private string|null $description = null;
    private string|null $descriptionContains = null;
    private int|null $failedLandings = null;
    private int|null $failedLandingsGT = null;
    private int|null $failedLandingsGTE = null;
    private int|null $failedLandingsLT = null;
    private int|null $failedLandingsLTE = null;
    private int|null $failedLaunches = null;
    private int|null $failedLaunchesGT = null;
    private int|null $failedLaunchesGTE = null;
    private int|null $failedLaunchesLT = null;
    private int|null $failedLaunchesLTE = null;
    private bool|null $featured = null;
    private string|null $foundingYear = null;
    private string|null $foundingYearContains = null;
    private int|null $id = null;
    private int|null $idGT = null;
    private int|null $idGTE = null;
    private int|null $idLT = null;
    private int|null $idLTE = null;
    private string|null $name = null;
    private string|null $nameContains = null;
    private string|null $ordering = null;
    private int|null $parent = null;
    private int|null $pendingLaunches = null;
    private int|null $pendingLaunchesGT = null;
    private int|null $pendingLaunchesGTE = null;
    private int|null $pendingLaunchesLT = null;
    private int|null $pendingLaunchesLTE = null;
    private string|null $search = null;
    private bool|null $spacecraft = null;
    private int|null $successfulLandings = null;
    private int|null $successfulLandingsGT = null;
    private int|null $successfulLandingsGTE = null;
    private int|null $successfulLandingsLT = null;
    private int|null $successfulLandingsLTE = null;
    private int|null $successfulLaunches = null;
    private int|null $successfulLaunchesGT = null;
    private int|null $successfulLaunchesGTE = null;
    private int|null $successfulLaunchesLT = null;
    private int|null $successfulLaunchesLTE = null;
    private int|null $totalLaunchCount = null;
    private int|null $totalLaunchCountGT = null;
    private int|null $totalLaunchCountGTE = null;
    private int|null $totalLaunchCountLT = null;
    private int|null $totalLaunchCountLTE = null;

    public function getQueryParameters(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'abbrev' => $this->abbrev,
            'abbrev__contains' => $this->abbrevContains,
            'administrator' => $this->administrator,
            'administrator__contains' => $this->administratorContains,
            'agency_type' => $this->agencyType,
            'attempted_landings' => $this->attemptedLandings,
            'attempted_landings__gt' => $this->attemptedLandingsGT,
            'attempted_landings__gte' => $this->attemptedLandingsGTE,
            'attempted_landings__lt' => $this->attemptedLandingsLT,
            'attempted_landings__lte' => $this->attemptedLandingsLTE,
            'consecutive_successful_landings' => $this->consecutiveSuccessfulLandings,
            'consecutive_successful_landings__gt' => $this->consecutiveSuccessfulLandingsGT,
            'consecutive_successful_landings__gte' => $this->consecutiveSuccessfulLandingsGTE,
            'consecutive_successful_landings__lt' => $this->consecutiveSuccessfulLandingsLT,
            'consecutive_successful_landings__lte' => $this->consecutiveSuccessfulLandingsLTE,
            'consecutive_successful_launches' => $this->consecutiveSuccessfulLaunches,
            'consecutive_successful_launches__gt' => $this->consecutiveSuccessfulLaunchesGT,
            'consecutive_successful_launches__gte' => $this->consecutiveSuccessfulLaunchesGTE,
            'consecutive_successful_launches__lt' => $this->consecutiveSuccessfulLaunchesLT,
            'consecutive_successful_launches__lte' => $this->consecutiveSuccessfulLaunchesLTE,
            'country_code' => $this->countryCode ? implode(',', $this->countryCode) : null,
            'description' => $this->description,
            'description__contains' => $this->descriptionContains,
            'failed_landings' => $this->failedLandings,
            'failed_landings__gt' => $this->failedLandingsGT,
            'failed_landings__gte' => $this->failedLandingsGTE,
            'failed_landings__lt' => $this->failedLandingsLT,
            'failed_landings__lte' => $this->failedLandingsLTE,
            'failed_launches' => $this->failedLaunches,
            'failed_launches__gt' => $this->failedLaunchesGT,
            'failed_launches__gte' => $this->failedLaunchesGTE,
            'failed_launches__lt' => $this->failedLaunchesLT,
            'failed_launches__lte' => $this->failedLaunchesLTE,
            'featured' => $this->featured,
            'founding_year' => $this->foundingYear,
            'founding_year__contains' => $this->foundingYearContains,
            'id' => $this->id,
            'id__gt' => $this->idGT,
            'id__gte' => $this->idGTE,
            'id__lt' => $this->idLT,
            'id__lte' => $this->idLTE,
            'name' => $this->name,
            'name__contains' => $this->nameContains,
            'ordering' => $this->ordering,
            'parent' => $this->parent,
            'pending_launches' => $this->pendingLaunches,
            'pending_launches__gt' => $this->pendingLaunchesGT,
            'pending_launches__gte' => $this->pendingLaunchesGTE,
            'pending_launches__lt' => $this->pendingLaunchesLT,
            'pending_launches__lte' => $this->pendingLaunchesLTE,
            'search' => $this->search,
            'spacecraft' => $this->spacecraft,
            'successful_landings' => $this->successfulLandings,
            'successful_landings__gt' => $this->successfulLandingsGT,
            'successful_landings__gte' => $this->successfulLandingsGTE,
            'successful_landings__lt' => $this->successfulLandingsLT,
            'successful_landings__lte' => $this->successfulLandingsLTE,
            'successful_launches' => $this->successfulLaunches,
            'successful_launches__gt' => $this->successfulLaunchesGT,
            'successful_launches__gte' => $this->successfulLaunchesGTE,
            'successful_launches__lt' => $this->successfulLaunchesLT,
            'successful_launches__lte' => $this->successfulLaunchesLTE,
            'total_launch_count' => $this->totalLaunchCount,
            'total_launch_count__gt' => $this->totalLaunchCountGT,
            'total_launch_count__gte' => $this->totalLaunchCountGTE,
            'total_launch_count__lt' => $this->totalLaunchCountLT,
            'total_launch_count__lte' => $this->totalLaunchCountLTE,
        ];
    }

    /**
     * @param array{
     *  count: int,
     *  next: string|null,
     *  previous: string|null,
     *  results: null|array{
     *      id: int,
     *      url: string,
     *      name: string,
     *      featured: bool,
     *      type: string|null,
     *      country_code: string,
     *      abbrev: string,
     *      description: string|null,
     *      administrator: string|null,
     *      founding_year: string|null,
     *      launchers: string,
     *      spacecraft: string,
     *      parent: string|null,
     *      image_url: string|null,
     *      logo_url: string|null,
     *  }[]
     * } $body
     *
     * @return array<AgencyIndex>
     */
    public function hydrate(array $body, array $headers = null): array
    {
        $this->parsePagination(isset($body['next']) ? $body['next'] : null);

        $results = [];

        if (isset($body['results'])) {
            foreach ($body['results'] as $result) {
                $results[] = new AgencyIndex(
                    $result['id'],
                    $result['url'],
                    $result['name'],
                    $result['featured'],
                    $result['type'],
                    $result['country_code'],
                    $result['abbrev'],
                    $result['description'],
                    $result['administrator'],
                    $result['founding_year'],
                    $result['launchers'],
                    $result['spacecraft'],
                    $result['parent'],
                    $result['image_url'],
                    $result['logo_url'],
                );
            }
        }

        return $results;
    }

    public function setAbbrev(string $abbrev): self
    {
        $this->abbrev = $abbrev;

        return $this;
    }

    public function setAbbrevContains(string $abbrevContains): self
    {
        $this->abbrevContains = $abbrevContains;

        return $this;
    }

    public function setAdministrator(string $administrator): self
    {
        $this->administrator = $administrator;

        return $this;
    }

    public function setAdministratorContains(string $administratorContains): self
    {
        $this->administratorContains = $administratorContains;

        return $this;
    }

    public function setAgencyType(int $agencyType): self
    {
        $this->agencyType = $agencyType;

        return $this;
    }

    public function setAttemptedLandings(int $attemptedLandings): self
    {
        $this->attemptedLandings = $attemptedLandings;

        return $this;
    }

    public function setAttemptedLandingsGT(int $attemptedLandingsGT): self
    {
        $this->attemptedLandingsGT = $attemptedLandingsGT;

        return $this;
    }

    public function setAttemptedLandingsGTE(int $attemptedLandingsGTE): self
    {
        $this->attemptedLandingsGTE = $attemptedLandingsGTE;

        return $this;
    }

    public function setAttemptedLandingsLT(int $attemptedLandingsLT): self
    {
        $this->attemptedLandingsLT = $attemptedLandingsLT;

        return $this;
    }

    public function setAttemptedLandingsLTE(int $attemptedLandingsLTE): self
    {
        $this->attemptedLandingsLTE = $attemptedLandingsLTE;

        return $this;
    }

    public function setConsecutiveSuccessfulLandings(int $consecutiveSuccessfulLandings): self
    {
        $this->consecutiveSuccessfulLandings = $consecutiveSuccessfulLandings;

        return $this;
    }

    public function setConsecutiveSuccessfulLandingsGT(int $consecutiveSuccessfulLandingsGT): self
    {
        $this->consecutiveSuccessfulLandingsGT = $consecutiveSuccessfulLandingsGT;

        return $this;
    }

    public function setConsecutiveSuccessfulLandingsGTE(int $consecutiveSuccessfulLandingsGTE): self
    {
        $this->consecutiveSuccessfulLandingsGTE = $consecutiveSuccessfulLandingsGTE;

        return $this;
    }

    public function setConsecutiveSuccessfulLandingsLT(int $consecutiveSuccessfulLandingsLT): self
    {
        $this->consecutiveSuccessfulLandingsLT = $consecutiveSuccessfulLandingsLT;

        return $this;
    }

    public function setConsecutiveSuccessfulLandingsLTE(int $consecutiveSuccessfulLandingsLTE): self
    {
        $this->consecutiveSuccessfulLandingsLTE = $consecutiveSuccessfulLandingsLTE;

        return $this;
    }

    public function setConsecutiveSuccessfulLaunches(int $consecutiveSuccessfulLaunches): self
    {
        $this->consecutiveSuccessfulLaunches = $consecutiveSuccessfulLaunches;

        return $this;
    }

    public function setConsecutiveSuccessfulLaunchesGT(int $consecutiveSuccessfulLaunchesGT): self
    {
        $this->consecutiveSuccessfulLaunchesGT = $consecutiveSuccessfulLaunchesGT;

        return $this;
    }

    public function setConsecutiveSuccessfulLaunchesGTE(int $consecutiveSuccessfulLaunchesGTE): self
    {
        $this->consecutiveSuccessfulLaunchesGTE = $consecutiveSuccessfulLaunchesGTE;

        return $this;
    }

    public function setConsecutiveSuccessfulLaunchesLT(int $consecutiveSuccessfulLaunchesLT): self
    {
        $this->consecutiveSuccessfulLaunchesLT = $consecutiveSuccessfulLaunchesLT;

        return $this;
    }

    public function setConsecutiveSuccessfulLaunchesLTE(int $consecutiveSuccessfulLaunchesLTE): self
    {
        $this->consecutiveSuccessfulLaunchesLTE = $consecutiveSuccessfulLaunchesLTE;

        return $this;
    }

    /**
     * @param array<string> $countryCode
     */
    public function setCountryCode(array $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setDescriptionContains(string $descriptionContains): self
    {
        $this->descriptionContains = $descriptionContains;

        return $this;
    }

    public function setFailedLandings(int $failedLandings): self
    {
        $this->failedLandings = $failedLandings;

        return $this;
    }

    public function setFailedLandingsGT(int $failedLandingsGT): self
    {
        $this->failedLandingsGT = $failedLandingsGT;

        return $this;
    }

    public function setFailedLandingsGTE(int $failedLandingsGTE): self
    {
        $this->failedLandingsGTE = $failedLandingsGTE;

        return $this;
    }

    public function setFailedLandingsLT(int $failedLandingsLT): self
    {
        $this->failedLandingsLT = $failedLandingsLT;

        return $this;
    }

    public function setFailedLandingsLTE(int $failedLandingsLTE): self
    {
        $this->failedLandingsLTE = $failedLandingsLTE;

        return $this;
    }

    public function setFailedLaunches(int $failedLaunches): self
    {
        $this->failedLaunches = $failedLaunches;

        return $this;
    }

    public function setFailedLaunchesGT(int $failedLaunchesGT): self
    {
        $this->failedLaunchesGT = $failedLaunchesGT;

        return $this;
    }

    public function setFailedLaunchesGTE(int $failedLaunchesGTE): self
    {
        $this->failedLaunchesGTE = $failedLaunchesGTE;

        return $this;
    }

    public function setFailedLaunchesLT(int $failedLaunchesLT): self
    {
        $this->failedLaunchesLT = $failedLaunchesLT;

        return $this;
    }

    public function setFailedLaunchesLTE(int $failedLaunchesLTE): self
    {
        $this->failedLaunchesLTE = $failedLaunchesLTE;

        return $this;
    }

    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    public function setFoundingYear(string $foundingYear): self
    {
        $this->foundingYear = $foundingYear;

        return $this;
    }

    public function setFoundingYearContains(string $foundingYearContains): self
    {
        $this->foundingYearContains = $foundingYearContains;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setIdGT(int $idGT): self
    {
        $this->idGT = $idGT;

        return $this;
    }

    public function setIdGTE(int $idGTE): self
    {
        $this->idGTE = $idGTE;

        return $this;
    }

    public function setIdLT(int $idLT): self
    {
        $this->idLT = $idLT;

        return $this;
    }

    public function setIdLTE(int $idLTE): self
    {
        $this->idLTE = $idLTE;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setNameContains(string $nameContains): self
    {
        $this->nameContains = $nameContains;

        return $this;
    }

    public function setOrdering(string $ordering): self
    {
        $this->ordering = $ordering;

        return $this;
    }

    public function setParent(int $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function setPendingLaunches(int $pendingLaunches): self
    {
        $this->pendingLaunches = $pendingLaunches;

        return $this;
    }

    public function setPendingLaunchesGT(int $pendingLaunchesGT): self
    {
        $this->pendingLaunchesGT = $pendingLaunchesGT;

        return $this;
    }

    public function setPendingLaunchesGTE(int $pendingLaunchesGTE): self
    {
        $this->pendingLaunchesGTE = $pendingLaunchesGTE;

        return $this;
    }

    public function setPendingLaunchesLT(int $pendingLaunchesLT): self
    {
        $this->pendingLaunchesLT = $pendingLaunchesLT;

        return $this;
    }

    public function setPendingLaunchesLTE(int $pendingLaunchesLTE): self
    {
        $this->pendingLaunchesLTE = $pendingLaunchesLTE;

        return $this;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }

    public function setSpacecraft(bool $spacecraft): self
    {
        $this->spacecraft = $spacecraft;

        return $this;
    }

    public function setSuccessfulLandings(int $successfulLandings): self
    {
        $this->successfulLandings = $successfulLandings;

        return $this;
    }

    public function setSuccessfulLandingsGT(int $successfulLandingsGT): self
    {
        $this->successfulLandingsGT = $successfulLandingsGT;

        return $this;
    }

    public function setSuccessfulLandingsGTE(int $successfulLandingsGTE): self
    {
        $this->successfulLandingsGTE = $successfulLandingsGTE;

        return $this;
    }

    public function setSuccessfulLandingsLT(int $successfulLandingsLT): self
    {
        $this->successfulLandingsLT = $successfulLandingsLT;

        return $this;
    }

    public function setSuccessfulLandingsLTE(int $successfulLandingsLTE): self
    {
        $this->successfulLandingsLTE = $successfulLandingsLTE;

        return $this;
    }

    public function setSuccessfulLaunches(int $successfulLaunches): self
    {
        $this->successfulLaunches = $successfulLaunches;

        return $this;
    }

    public function setSuccessfulLaunchesGT(int $successfulLaunchesGT): self
    {
        $this->successfulLaunchesGT = $successfulLaunchesGT;

        return $this;
    }

    public function setSuccessfulLaunchesGTE(int $successfulLaunchesGTE): self
    {
        $this->successfulLaunchesGTE = $successfulLaunchesGTE;

        return $this;
    }

    public function setSuccessfulLaunchesLT(int $successfulLaunchesLT): self
    {
        $this->successfulLaunchesLT = $successfulLaunchesLT;

        return $this;
    }

    public function setSuccessfulLaunchesLTE(int $successfulLaunchesLTE): self
    {
        $this->successfulLaunchesLTE = $successfulLaunchesLTE;

        return $this;
    }

    public function setTotalLaunchCount(int $totalLaunchCount): self
    {
        $this->totalLaunchCount = $totalLaunchCount;

        return $this;
    }

    public function setTotalLaunchCountGT(int $totalLaunchCountGT): self
    {
        $this->totalLaunchCountGT = $totalLaunchCountGT;

        return $this;
    }

    public function setTotalLaunchCountGTE(int $totalLaunchCountGTE): self
    {
        $this->totalLaunchCountGTE = $totalLaunchCountGTE;

        return $this;
    }

    public function setTotalLaunchCountLT(int $totalLaunchCountLT): self
    {
        $this->totalLaunchCountLT = $totalLaunchCountLT;

        return $this;
    }

    public function setTotalLaunchCountLTE(int $totalLaunchCountLTE): self
    {
        $this->totalLaunchCountLTE = $totalLaunchCountLTE;

        return $this;
    }
}
