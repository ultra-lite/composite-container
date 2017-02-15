<?php
namespace UltraLite\CompositeContainer;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFound extends \InvalidArgumentException implements NotFoundExceptionInterface
{
    public static function createFromServiceId(string $serviceId) : ServiceNotFound
    {
        $message = "Service '$serviceId' requested from composite DI container, but not found.";
        return new static($message);
    }
}
