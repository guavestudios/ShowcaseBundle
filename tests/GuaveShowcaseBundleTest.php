<?php

declare(strict_types=1);

namespace Guave\ShowcaseBundle\Tests;

use Guave\ShowcaseBundle\GuaveShowcaseBundle;
use PHPUnit\Framework\TestCase;

class GuaveShowcaseBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new GuaveShowcaseBundle();

        $this->assertInstanceOf('Guave\ShowcaseBundle\GuaveShowcaseBundle', $bundle);
    }
}
