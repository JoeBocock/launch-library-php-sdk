<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Entity;

class ApiThrottle extends Entity
{
    public function __construct(
        public int $yourRequestLimit,
        public int $limitFrequencySecs,
        public int $currentUse,
        public int $nextUseSecs,
        public string $ident,
    ) {
    }

    /**
     * @return array{
     *  your_request_limit: int,
     *  limit_frequency_secs: int,
     *  current_use: int,
     *  next_use_secs: int,
     *  ident: string
     * }
     */
    public function jsonSerialize(): array
    {
        return [
            'your_request_limit' => $this->yourRequestLimit,
            'limit_frequency_secs' => $this->limitFrequencySecs,
            'current_use' => $this->currentUse,
            'next_use_secs' => $this->nextUseSecs,
            'ident' => $this->ident,
        ];
    }
}
