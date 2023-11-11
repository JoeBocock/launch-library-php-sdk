<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Collection;

use JoeBocock\LaunchLibrary\Entity\AgencyIndex;

/**
 * @extends Collection<AgencyIndex>
 */
class AgencyIndexCollection extends Collection
{
    public function current(): AgencyIndex
    {
        return parent::current();
    }
}
