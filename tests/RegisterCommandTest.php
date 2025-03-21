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
            ->expects($this->once())
            ->method('discover')
            ->willReturn($mockFreeBox);
        $mockFreeBox
            ->expects($this->once())
            ->method('register')
            ->willReturn(self::TESTKEY);

        $this->app->instance(Box::class, $mockFreeBox);

        // @phpstan-ignore method.nonObject
        $this->artisan('freeboxphp:register')
            ->expectsOutput(self::TESTKEY)
            ->assertSuccessful();
    }
}
