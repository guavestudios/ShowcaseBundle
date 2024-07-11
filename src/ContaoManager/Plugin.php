<?php

namespace Guave\ShowcaseBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Guave\ShowcaseBundle\GuaveShowcaseBundle;
use Guave\TagBundle\GuaveTagBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(GuaveShowcaseBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class, GuaveTagBundle::class]),
        ];
    }
}
