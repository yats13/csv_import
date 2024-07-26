<?php

namespace App\Console\Commands;

use App\Services\FileSplitterService;
use App\Services\Inventory\InventoryImporterInterface;
use Illuminate\Console\Command;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv {fileName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV data to database';

    protected $importer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(InventoryImporterInterface $importer)
    {
        parent::__construct();
        $this->importer = $importer;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//      meyer_inventory.csv
        $filePath = public_path('uploads/'.$this->argument('fileName'));

        if (!file_exists($filePath)) {
            $this->error('File does not exist.');
            return 1;
        }

        $this->info('Import process started.');
        $startTime = microtime(true); // Start timing
        $this->importer->import($filePath);
        $endTime = microtime(true); // End timing
        $duration = $endTime - $startTime; // Calculate the duration in seconds
        $this->info('Import process finished.');
        $this->info(sprintf('The import process took %.2f milliseconds.', $duration * 1000));
        return 0;
    }
}
