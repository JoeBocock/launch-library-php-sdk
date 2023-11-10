<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use GuzzleHttp\Client as GuzzleClient;
use JoeBocock\LaunchLibrary\Enum\Url;
use JoeBocock\LaunchLibrary\Enum\Version;
use Psr\Http\Client\ClientInterface;

class Client extends BaseClient
{
    public AgencyClient $agency;
    public ApiThrottleClient $apiThrottle;

    public function __construct(
        Url $url = Url::Production,
        Version $version = Version::Latest,
        ClientInterface $client = new GuzzleClient()
    ) {
        parent::__construct($url, $version, $client);

        $this->agency = new AgencyClient($this);
        $this->apiThrottle = new ApiThrottleClient($this);
    }
}
