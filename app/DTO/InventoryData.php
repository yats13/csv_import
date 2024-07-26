<?php

declare(strict_types=1);

namespace App\DTO;

use Carbon\Carbon;

class InventoryData
{
    public $mfg_name;
    public $mfg_item_number;
    public $item_number;
    public $available;
    public $ltl;
    public $mfg_qty_available;
    public $stocking;
    public $special_order;
    public $oversize;
    public $addtl_handling_charge;
    public $created_at;
    public $updated_at;

    public function __construct(array $record)
    {
        $this->mfg_name = $record['MFGName'];
        $this->mfg_item_number = $record['MFG Item Number'];
        $this->item_number = $record['Item Number'];
        $this->available = (int) $record['Available'];
        $this->ltl = strtolower($record['LTL']) === 'true';
        $this->mfg_qty_available = isset($record['MFG Qty Available']) ? (int) $record['MFG Qty Available'] : null;
        $this->stocking = $record['Stocking'];
        $this->special_order = $record['Special Order'];
        $this->oversize = $record['Oversize'];
        $this->addtl_handling_charge = $record['Addtl Handling Charge'];
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    public function toArray(): array
    {
        return [
            'mfg_name' => $this->mfg_name,
            'mfg_item_number' => $this->mfg_item_number,
            'item_number' => $this->item_number,
            'available' => $this->available,
            'ltl' => $this->ltl,
            'mfg_qty_available' => $this->mfg_qty_available,
            'stocking' => $this->stocking,
            'special_order' => $this->special_order,
            'oversize' => $this->oversize,
            'addtl_handling_charge' => $this->addtl_handling_charge,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
