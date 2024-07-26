<?php

namespace App\Jobs;

use App\DTO\InventoryData;
use App\Models\Inventory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ImportCsvJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $records;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $records)
    {
        $this->records = $records;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {
            foreach ($this->records as $record) {
                Inventory::insert((new InventoryData($record))->toArray());
            }
        });
    }
}
