<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Entity\Config;

use JoeBocock\LaunchLibrary\Entity\Entity;

class AgencyType extends Entity
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }

    /**
     * @return array{
     *  id: int,
     *  name: string,
     * }
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
