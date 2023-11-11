<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Collection;

use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Entity\Entity;
use JoeBocock\LaunchLibrary\Request\PaginatedRequest;

/**
 * @template T of Entity
 *
 * @implements \Iterator<int, T>
 */
abstract class Collection implements \Iterator
{
    private int $position = 0;

    /**
     * @param array<T> $data
     */
    public function __construct(
        private Client $client,
        public PaginatedRequest $request,
        private array $data = [],
    ) {
    }

    /**
     * @return T
     */
    public function current(): mixed
    {
        return $this->data[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        if (isset($this->data[$this->position])) {
            return true;
        }

        if ($this->request->getNext() !== null) {
            /** @var array<T> */
            $response = $this->client->send($this->request);

            $this->data = $response;

            $this->rewind();

            if (! isset($this->data[$this->position])) {
                return false;
            }

            return true;
        }

        return false;
    }
}
