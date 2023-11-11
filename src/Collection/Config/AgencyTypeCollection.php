<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Collection\Config;

use JoeBocock\LaunchLibrary\Collection\Collection;
use JoeBocock\LaunchLibrary\Entity\Config\AgencyType;

/**
 * @extends Collection<AgencyType>
 */
class AgencyTypeCollection extends Collection
{
    public function current(): AgencyType
    {
        return parent::current();
    }
}
