<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;
use GuzzleHttp\Psr7\Uri;
use JoeBocock\LaunchLibrary\Enum\RequestMethod;
use JoeBocock\LaunchLibrary\Enum\Url;
use JoeBocock\LaunchLibrary\Enum\Version;
use Psr\Http\Message\UriInterface;

abstract class Request extends Psr7Request
{
    /**
     * @var RequestMethod
     */
    public const METHOD = RequestMethod::Get;

    /**
     * @var string
     */
    public const URI = '';

    public function __construct(protected Url $url = Url::Production, protected Version $apiVersion = Version::Latest)
    {
        parent::__construct(
            static::METHOD->value,
            "{$this->url->value}/{$this->apiVersion->value}" . static::URI
        );
    }

    public function getUri(): UriInterface
    {
        return new Uri($this->requestUrl(
            $this->getRequestParameters()
        ));
    }

    /**
     * @return array<string, mixed>
     */
    public function getRequestParameters(): array
    {
        return [];
    }

    /**
     * @param array<string, string> $uriParameters
     */
    public function requestUrl(array $uriParameters): string
    {
        return "{$this->url->value}/{$this->apiVersion->value}" . str_replace(
            array_map(fn ($key) => "{{$key}}", array_keys($uriParameters)),
            $uriParameters,
            static::URI
        );
    }

    /**
     * Hydrate PHP objects with the response data of a request.
     *
     * @param array<mixed, mixed>      $body
     * @param array<mixed, mixed>|null $headers
     */
    abstract public function hydrate(array $body, array $headers = null): mixed;
}
