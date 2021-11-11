<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'city',
        'phone',
        'identification_number',
        'address',
        'status',
        'created_at',
        'updated_at'
    ];
}
