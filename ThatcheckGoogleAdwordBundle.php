<?php

namespace Thatcheck\GoogleAdwordBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Thatcheck\GoogleAdwordBundle\Compiler\LangCompilerPass;

class ThatcheckGoogleAdwordBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new LangCompilerPass());
    }
}
