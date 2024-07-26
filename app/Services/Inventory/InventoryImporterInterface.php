<?php

declare(strict_types=1);

namespace App\Services\Inventory;

interface InventoryImporterInterface
{
    public function import(string $filePath): void;
}
