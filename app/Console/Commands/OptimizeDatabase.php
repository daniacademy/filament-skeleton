<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OptimizeDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize all tables in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting database optimization...');

        $defaultConnection = config('database.default');
        $databaseName = config("database.connections.{$defaultConnection}.database");

        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . $databaseName};
            DB::statement("OPTIMIZE TABLE {$tableName}");
            $this->info("Optimized table: {$tableName}");
        }

        $this->info('Database optimization completed.');
    }
}
