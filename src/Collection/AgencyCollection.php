<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Collection;

use JoeBocock\LaunchLibrary\Entity\Agency;

/**
 * @extends Collection<Agency>
 */
class AgencyCollection extends Collection
{
    public function current(): Agency
    {
        return parent::current();
    }
}
