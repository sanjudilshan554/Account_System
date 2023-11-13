<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIPO extends Model
{
    use HasFactory;

    protected $fillable = [
        'zoneId',
        'regId',
        'terId',
        'distributor',
        'dateTime',
        'remark',
        'purchase_order_items', // Add the new attribute for storing items as JSON
    ];

    protected $casts = [
        'purchase_order_items' => 'json', // Define the cast for the JSON field
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
