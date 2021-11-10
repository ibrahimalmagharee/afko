<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'status', 'created_at', 'updated_at'];
}
