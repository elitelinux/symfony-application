<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace RouteBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('route.collector')) {
            return;
        }

        $definition = $container->getDefinition(
            'route.collector'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'route.provider'
        );

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addProvider',
                array(new Reference($id))
            );
        }
    }
}
