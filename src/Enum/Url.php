<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Enum;

enum Url: string
{
    case Production = 'https://ll.thespacedevs.com';
    case Development = 'https://lldev.thespacedevs.com';
}
