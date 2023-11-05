<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRegs extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'nic',
        'address',
        'mobile',
        'email',
        'gender',
        'territory',
        'userName',
        'password',
    ];
}
