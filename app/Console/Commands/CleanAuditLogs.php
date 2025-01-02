<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OwenIt\Auditing\Models\Audit;

class CleanAuditLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'audit:clean {days=365}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =
    'Clean audit logs older than a specified number of days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->argument('days');
        $date = now()->subDays($days);
        $deleted = Audit::where(
            'created_at',
            '<',
            $date
        )->delete();

        $this->info(
            "Deleted {$deleted} audit logs older than {$days} days."
        );
    }
}
