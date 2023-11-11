<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Client;

use JoeBocock\LaunchLibrary\Client;

abstract class SubClient
{
    public function __construct(protected Client $client)
    {
    }
}
