<?php

declare(strict_types=1);

namespace Tests;

use BadMethodCallException;
use Illuminate\Support\Facades\File;
use madpilot78\FreeBoxPHP\Box;
use madpilot78\LaravelFreeBoxPHP\FreeBoxPHPServiceProvider;

class FreeBoxPHPTest extends TestCase
{
    public function testPublishesConfiguration(): void
    {
        File::delete(config_path('freebox.php'));

        $this->artisan('vendor:publish', ['--provider' => FreeBoxPHPServiceProvider::class]);

        $this->assertTrue(File::exists(config_path('freebox.php')));
    }
}
