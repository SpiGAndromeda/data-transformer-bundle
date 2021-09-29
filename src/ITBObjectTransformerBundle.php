<?php

declare(strict_types=1);

namespace ITB\ObjectTransformerBundle;

use ITB\ObjectTransformerBundle\DependencyInjection\Compiler\ObjectTransformerCompilerPass;
use ITB\ObjectTransformerBundle\DependencyInjection\ITBObjectTransformerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ITBObjectTransformerBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ObjectTransformerCompilerPass());
    }

    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension(): ITBObjectTransformerExtension
    {
        if (null === $this->extension) {
            $this->extension = new ITBObjectTransformerExtension();
        }

        return $this->extension;
    }
}
