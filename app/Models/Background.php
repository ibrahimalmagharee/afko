<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = "backgrounds";
    protected $fillable = ['photo', 'created_at', 'updated_at'];

    public function  getImage($val){
        return ($val !== null) ? asset('assets/images/admin/background/' . $val) : "";
    }
}
