<?php

namespace Guave\ShowcaseBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveShowcaseBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
