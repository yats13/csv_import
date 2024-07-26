<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'mfg_name',
        'mfg_item_number',
        'item_number',
        'available',
        'ltl',
        'mfg_qty_available',
        'stocking',
        'special_order',
        'oversize',
        'addtl_handling_charge',
    ];
}
