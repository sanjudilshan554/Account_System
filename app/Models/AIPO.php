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
        'dateTime',
        'remark',
        'skuCode',
        'skuName',
        'unitPrice',
        'qty',
        'customQty',
        'units',
        'totalPrice',
    ];

    public function zone()
    {
        return $this->belongsTo(zone::class, 'zoneId');
    }

    public function region()
    {
        return $this->belongsTo(region::class, 'regId');
    }

    public function territory()
    {
        return $this->belongsTo(territory::class, 'terId');
    }

    public function distributor()
    {
        return $this->belongsTo(userRegs::class, 'distributor');
    }
}
