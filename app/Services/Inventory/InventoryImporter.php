<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Jobs\ImportCsvJob;
use App\Models\Inventory;
use League\Csv\Reader;

final class InventoryImporter implements InventoryImporterInterface
{
    protected int $batchSize;

    public function __construct(int $batchSize = 10000)
    {
        $this->batchSize = $batchSize;
    }

    public function import(string $filePath): void
    {
        $this->clearInventoryTable();
        $this->processAndDispatchBatches($filePath);
    }

    protected function clearInventoryTable(): void
    {
        Inventory::truncate();
    }

    protected function processAndDispatchBatches(string $filePath): void
    {
        $csv = Reader::createFromPath($filePath);
        $csv->setHeaderOffset(0);
        $records = [];

        foreach ($csv->getRecords() as $key => $record) {
            $records[] = $record;

            if ($key % $this->batchSize === 0) {
                ImportCsvJob::dispatch($records);
                $records = [];
            }
        }

        if (!empty($records)) {
            ImportCsvJob::dispatch($records);
        }
    }
}
