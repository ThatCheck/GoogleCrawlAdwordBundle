<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 15/04/2015
 * Time: 09:57.
 */

namespace Thatcheck\GoogleAdwordBundle\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LangCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('thatcheck.lang_factory')) {
            return;
        }

        $definition = $container->getDefinition(
            'thatcheck.lang_factory'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'thatcheck.lang'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addLang',
                array(new Reference($id), $attributes[0]['lang'])
            );
        }
    }
}
