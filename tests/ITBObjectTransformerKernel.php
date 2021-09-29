<?php

declare(strict_types=1);

namespace ITB\ObjectTransformerBundle\Tests;

use ITB\ObjectTransformerBundle\ITBObjectTransformerBundle;
use ITB\ObjectTransformerBundle\Tests\Mock\DummyTransformer;
use ITB\ObjectTransformerBundle\Tests\Mock\DummyTransformerReverse;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\Kernel;

final class ITBObjectTransformerKernel extends Kernel
{
    public function registerBundles(): array
    {
        return [new ITBObjectTransformerBundle()];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(static function (ContainerBuilder $container) {
            $container->addDefinitions(
                [
                    'itb_object_transformer.dummy_transformer' => (new Definition(DummyTransformer::class))->setAutoconfigured(true),
                    'itb_object_transformer.dummy_transformer_reverse' => (new Definition(DummyTransformerReverse::class))->setAutoconfigured(true)
                ]
            );
        });
    }

    public function getCacheDir(): string
    {
        return __DIR__ . '/cache/' . spl_object_hash($this);
    }
}
