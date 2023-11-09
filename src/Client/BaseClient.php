<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use GuzzleHttp\Client;
use JoeBocock\LaunchLibrary\Enum\Url;
use JoeBocock\LaunchLibrary\Enum\Version;
use JoeBocock\LaunchLibrary\Request\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;

abstract class BaseClient
{
    public function __construct(
        protected Url $url = Url::Production,
        protected Version $version = Version::Latest,
        private ClientInterface $client = new Client()
    ) {
    }

    public function send(Request $request): mixed
    {
        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface|RequestExceptionInterface|NetworkExceptionInterface $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }

        if (($code = $response->getStatusCode()) === 404) {
            return null;
        }

        if ($code < 200 || $code >= 300) {
            throw new \Exception("Responded with a non-200 ({$code}) status code.", $code);
        }

        return $request->hydrate(
            json_decode($response->getBody()->getContents(), true) ?? [],
            $response->getHeaders()
        );
    }
}
