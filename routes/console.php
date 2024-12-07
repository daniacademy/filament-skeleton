<?php

use Illuminate\Support\Facades\Schedule;
use Spatie\Health\Commands\DispatchQueueCheckJobsCommand;

Schedule::command(DispatchQueueCheckJobsCommand::class)->everyMinute();
Schedule::command('queue:work --stop-when-empty')->everyMinute()
    ->withoutOverlapping();
Schedule::command('logs:clean')->daily()->at('00:00');
Schedule::command('audit:clean')->daily()->at('00:30');
Schedule::command('backup:clean')->daily()->at('01:00');
Schedule::command('backup:run')->daily()->at('01:30');
Schedule::command('db:optimize')->daily()->at('03:00');
