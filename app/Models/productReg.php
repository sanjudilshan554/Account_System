<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productReg extends Model
{
    use HasFactory;

    protected $fillable=[
        'skuCode',
        'skuName',
        'mrp',
        'distPrice',
        'weight',
        'unit',
    ];
}
