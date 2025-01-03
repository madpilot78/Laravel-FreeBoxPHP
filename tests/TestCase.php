<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use madpilot78\LaravelFreeBoxPHP\FreeBoxPHPServiceProvider;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            FreeBoxPHPServiceProvider::class,
        ];
    }
}
