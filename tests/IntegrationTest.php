<?php

declare(strict_types=1);

namespace ITB\ObjectTransformerBundle\Tests;

use PHPUnit\Framework\TestCase;
use ITB\ObjectTransformer\TransformationMediator;
use ITB\ObjectTransformerTestUtilities\Object1;
use ITB\ObjectTransformerTestUtilities\Object2;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class IntegrationTest extends TestCase
{
    /** @var ContainerInterface $container */
    private $container;

    public function setUp(): void
    {
        $kernel = new ITBObjectTransformerKernel('test', true);
        $kernel->boot();
        $this->container = $kernel->getContainer();
    }

    public function testServiceWiring(): void
    {
        $transformationMediator = $this->container->get('itb_object_transformer.transformation_mediator');
        $this->assertInstanceOf(TransformationMediator::class, $transformationMediator);
    }

    /**
     * A dummy transformer is added to the container in the kernel.
     */
    public function testAutoRegistration(): void
    {
        $object1 = new Object1('I\'m Mr. Meeseeks, look at me!');
        /** @var TransformationMediator $transformationMediator */
        $transformationMediator = $this->container->get('itb_object_transformer.transformation_mediator');
        $result = $transformationMediator->transform($object1, Object2::class);

        $this->assertInstanceOf(Object2::class, $result);
    }
}