<?php

declare(strict_types=1);

namespace madpilot78\LaravelFreeBoxPHP\Commands;

use Illuminate\Console\Command;
use madpilot78\FreeBoxPHP\Box;

class RegisterCommand extends Command
{
    protected $signature = 'freeboxphp:register';

    protected $description = 'Register app with FreeBox/IliadBox';

    public function handle(Box $box): int
    {
        $token = $box->discover()->register();

        $this->line($token);

        return self::SUCCESS;
    }
}
