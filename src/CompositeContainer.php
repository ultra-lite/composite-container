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
     * @param string $serviceId
     * @return mixed
     */
    public function get($serviceId)
    {
        foreach ($this->containers as $container) {
            if ($container->has($serviceId)) {
                return $container->get($serviceId);
            }
        }
        throw ServiceNotFound::createFromServiceId($serviceId);
    }

    /**
     * @param string $serviceId
     * @return bool
     */
    public function has($serviceId)
    {
        foreach ($this->containers as $container) {
            if ($container->has($serviceId)) {
                return true;
            }
        }
        return false;
    }
}
