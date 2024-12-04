<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CleanLogFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean log files older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to clean log files older than 30 days...');

        // Directorio de logs
        $logDirectory = storage_path('logs');

        // Obtener todos los archivos en el directorio de logs
        $logFiles = File::files($logDirectory);
        $thresholdDate = now()->subDays(30);

        foreach ($logFiles as $file) {
            // Verificar si el archivo es un archivo diario
            if ($file->getExtension() === 'log' && $file->getMTime() < $thresholdDate->getTimestamp()) {
                // Eliminar el archivo
                File::delete($file);
                $this->info("Deleted log file: {$file->getFilename()}");
            }
        }

        $this->info('Log cleaning completed.');
    }
}
