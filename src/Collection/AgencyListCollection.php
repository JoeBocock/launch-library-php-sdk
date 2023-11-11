<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Collection;

use JoeBocock\LaunchLibrary\Entity\AgencyList;

/**
 * @extends Collection<AgencyList>
 */
class AgencyListCollection extends Collection
{
    public function current(): AgencyList
    {
        return parent::current();
    }
}
