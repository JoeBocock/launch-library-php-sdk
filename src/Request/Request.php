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
    /** @var RequestMethod */
    public const METHOD = RequestMethod::Get;

    /** @var string */
    public const PATH = '';

    public function __construct(protected Url $url = Url::Production, protected Version $apiVersion = Version::Latest)
    {
        parent::__construct(static::METHOD->value, new Uri());
    }

    public function getUri(): UriInterface
    {
        $uri = new Uri($this->requestUrl(
            $this->getPathParameters()
        ));

        if ($query = $this->getQueryParameters()) {
            $uri = $uri->withQuery(http_build_query($query));
        }

        return $uri;
    }

    /**
     * @return array<string, mixed>
     */
    public function getPathParameters(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    public function getQueryParameters(): array
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
            static::PATH
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
