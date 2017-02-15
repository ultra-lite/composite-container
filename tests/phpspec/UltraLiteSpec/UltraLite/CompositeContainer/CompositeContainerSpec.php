<?php

namespace UltraLiteSpec\UltraLite\CompositeContainer;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use UltraLite\CompositeContainer\CompositeContainer;
use PhpSpec\ObjectBehavior;

/**
 * @mixin CompositeContainer
 */
class CompositeContainerSpec extends ObjectBehavior
{
    function let(ContainerInterface $container1, ContainerInterface $container2)
    {
        $this->addContainer($container1);
        $this->addContainer($container2);
    }

    function it_is_psr11_compliant()
    {
        $this->shouldBeAnInstanceOf(ContainerInterface::class);
    }

    function it_can_tell_if_it_has_a_service(ContainerInterface $container1, ContainerInterface $container2)
    {
        $container1->has('service-id-1')->willReturn(false);
        $container2->has('service-id-1')->willReturn(true);

        $container1->has('service-id-2')->willReturn(false);
        $container2->has('service-id-2')->willReturn(false);

        $this->has('service-id-1')->shouldBe(true);
        $this->has('service-id-2')->shouldBe(false);
    }

    function it_can_get_a_service(ContainerInterface $container1, ContainerInterface $container2, \stdClass $service)
    {
        $container1->has('service-id')->willReturn(false);
        $container2->has('service-id')->willReturn(true);

        $container2->get('service-id')->willReturn($service);

        $this->get('service-id')->shouldBe($service);
    }

    function it_throws_an_exception_if_you_try_to_get_a_service_it_doesnt_have(ContainerInterface $container1, ContainerInterface $container2)
    {
        $container1->has('service-id')->willReturn(false);
        $container2->has('service-id')->willReturn(false);

        $this->shouldThrow(NotFoundExceptionInterface::class)->during('get', ['service-id']);
    }
}
