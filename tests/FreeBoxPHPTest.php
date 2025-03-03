<?php

declare(strict_types=1);

namespace Tests;

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

    public function testInstanceWithWrongMethod(): void
    {
        $box = $this->app->make(Box::class);

        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Call to undefined method madpilot78\FreeBoxPHP\Box::foobar()');

        $box->foobar(); // @phpstan-ignore method.notFound (intentional)
    }
}
