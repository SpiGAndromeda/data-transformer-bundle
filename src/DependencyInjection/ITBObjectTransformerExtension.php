<?php

declare(strict_types=1);

namespace ITB\ObjectTransformerBundle\DependencyInjection;

use ITB\ObjectTransformer\TransformerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class ITBObjectTransformerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->registerForAutoconfiguration(TransformerInterface::class)
            ->addTag('itb_object_transformer.transformer');
    }

    public function getAlias(): string
    {
        return 'itb_object_transformer';
    }
}