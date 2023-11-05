<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIPO extends Model
{
    use HasFactory;

    protected $fillable=[
        'zoneId',
        'regId',
        'terId',
        'distributor',
        'date',
        'remark',
        'skuCode',
        'skuName',
        'unitPrice',
        'qty',
        'customQty',
        'units',
        'totalPrice',
    ];
}
