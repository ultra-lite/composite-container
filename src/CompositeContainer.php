<?php
namespace UltraLite\CompositeContainer;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class CompositeContainer implements ContainerInterface
{
    /** @var ContainerInterface[] */
    private $containers = [];

    public function addContainer(ContainerInterface $delegateContainer)
    {
        $this->containers[] = $delegateContainer;
    }

    /**
     * @throws NotFoundExceptionInterface
     *
     * @return mixed
     */
    public function get(string $serviceId)
    {
        foreach ($this->containers as $container) {
            if ($container->has($serviceId)) {
                return $container->get($serviceId);
            }
        }
        throw ServiceNotFound::createFromServiceId($serviceId);
    }

    /**
     * @return bool
     */
    public function has(string $serviceId)
    {
        foreach ($this->containers as $container) {
            if ($container->has($serviceId)) {
                return true;
            }
        }
        return false;
    }
}
