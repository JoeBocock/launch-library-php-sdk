<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Entity;

class AgencyList extends Entity
{
    public function __construct(
        public int $id,
        public string $url,
        public string $name,
        public bool $featured,
        public string|null $type,
        public string $countryCode,
        public string $abbrev,
        public string|null $description,
        public string|null $administrator,
        public string|null $foundingYear,
        public string $launchers,
        public string $spacecraft,
        public string|null $parent,
        public string|null $imageUrl,
        public string|null $logoUrl,
    ) {
    }

    /**
     * @return array{
     *  id: int,
     *  url: string,
     *  name: string,
     *  featured: bool,
     *  type: string|null,
     *  country_code: string,
     *  abbrev: string,
     *  description: string|null,
     *  administrator: string|null,
     *  founding_year: string|null,
     *  launchers: string,
     *  spacecraft: string,
     *  parent: string|null,
     *  image_url: string|null,
     *  logo_url: string|null,
     * }
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'name' => $this->name,
            'featured' => $this->featured,
            'type' => $this->type,
            'country_code' => $this->countryCode,
            'abbrev' => $this->abbrev,
            'description' => $this->description,
            'administrator' => $this->administrator,
            'founding_year' => $this->foundingYear,
            'launchers' => $this->launchers,
            'spacecraft' => $this->spacecraft,
            'parent' => $this->parent,
            'image_url' => $this->imageUrl,
            'logo_url' => $this->logoUrl,
        ];
    }
}
