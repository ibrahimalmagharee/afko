<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = "contact_information";
    protected $fillable = ['address', 'phone', 'email', 'website', 'created_at', 'updated_at'];
}
