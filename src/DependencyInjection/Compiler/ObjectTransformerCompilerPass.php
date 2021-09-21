<?php

declare(strict_types=1);

namespace ITB\ObjectTransformerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ObjectTransformerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $definition = $container->getDefinition('itb_object_transformer.transformation_mediator');
        $references = [];
        foreach ($container->findTaggedServiceIds('itb_object_transformer.transformer') as $id => $tags) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}