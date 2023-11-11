<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary;

use GuzzleHttp\Client as GuzzleClient;
use JoeBocock\LaunchLibrary\Client\AgencyClient;
use JoeBocock\LaunchLibrary\Client\ApiThrottleClient;
use JoeBocock\LaunchLibrary\Client\BaseClient;
use JoeBocock\LaunchLibrary\Client\Config\ConfigClient;
use JoeBocock\LaunchLibrary\Enum\Url;
use JoeBocock\LaunchLibrary\Enum\Version;
use Psr\Http\Client\ClientInterface;

class Client extends BaseClient
{
    public AgencyClient $agency;
    public ApiThrottleClient $apiThrottle;
    public ConfigClient $config;

    public function __construct(
        Url $url = Url::Production,
        Version $version = Version::Latest,
        ClientInterface $client = new GuzzleClient()
    ) {
        parent::__construct($url, $version, $client);

        $this->agency = new AgencyClient($this);
        $this->apiThrottle = new ApiThrottleClient($this);
        $this->config = new ConfigClient($this);
    }
}
