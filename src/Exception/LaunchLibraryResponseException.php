<?php

declare(strict_types=1);

namespace JoeBocock\LaunchLibrary\Exception;

use Psr\Http\Message\ResponseInterface;

class LaunchLibraryResponseException extends \Exception
{
    public function __construct(public ResponseInterface $response, string $message = '', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
