<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\BackupsCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

class HalthCheckProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Health::checks([
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(85)
                ->failWhenUsedSpaceIsAbovePercentage(90),
            DatabaseCheck::new(),
            // BackupsCheck::new()
            //     ->locatedAt(
            //         Storage::disk(
            //             config('backup.backup.destination.disk')
            //         )
            //             ->path(config('backup.backup.name') . '/*.zip')
            //     )
            //     ->youngestBackShouldHaveBeenMadeBefore(now()->subHours(30))
            //     ->atLeastSizeInMb(50),
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            QueueCheck::new(),
        ]);
    }
}
