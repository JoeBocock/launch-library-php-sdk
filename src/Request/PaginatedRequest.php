<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Request;

abstract class PaginatedRequest extends Request
{
    protected string|null $limit = null;
    protected string|null $offset = null;
    private string|null $next = '';

    public function setLimit(string $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOffset(string $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function getNext(): string|null
    {
        return $this->next;
    }

    public function getQueryParameters(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function parsePagination(string|null $next): void
    {
        if (is_null($next)) {
            $this->next = null;

            return;
        }

        $components = parse_url($next);

        if (isset($components['query'])) {
            parse_str($components['query'], $params);

            if (is_string($params['limit'])) {
                $this->setLimit($params['limit']);
            }

            if (is_string($params['offset'])) {
                $this->setOffset($params['offset']);
            }

            $this->next = $next;
        }
    }
}
