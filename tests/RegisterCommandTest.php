<?php

declare(strict_types=1);

namespace Tests;

use madpilot78\FreeBoxPHP\Box;

class RegisterCommandTest extends TestCase
{
    private const string TESTKEY = 'obtainedkey';

    public function testRegisterCommand(): void
    {
        $mockFreeBox = $this->createMock(Box::class);

        $mockFreeBox
            ->expects($this->exactly(2))
            ->method('__call')
            ->willReturn($mockFreeBox, self::TESTKEY);

        $this->app->instance(Box::class, $mockFreeBox);

        $this->artisan('freeboxphp:register')
            ->expectsOutput(self::TESTKEY)
            ->assertSuccessful();
    }
}
