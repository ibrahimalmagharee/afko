<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = "logos";
    protected $fillable = ['photo', 'created_at', 'updated_at'];

    public function  getImage($val){
        return ($val !== null) ? asset('assets/images/admin/logo/' . $val) : "";
    }
}
