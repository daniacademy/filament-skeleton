<?php

namespace App\Filament\Pages\Auth;

use DanHarrin\LivewireRateLimiting\WithRateLimiting;

trait CustomWithRateLimiting
{
    use WithRateLimiting;

    protected function getRateLimitKey($method, $component = null)
    {
        $method ??= debug_backtrace(limit: 2)[1]['function'];
        $component ??= static::class;
        $snapshot = data_get(request()->all(), 'components.0.snapshot');
        $snapshotData = json_decode($snapshot, true);
        $email = data_get($snapshotData, 'data.data.0.email');
        return sha1($component . '|' . $method . '|' . $email);
    }
}
