<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_san_phamModel extends Model
{
    protected $table = "loai_san_pham";
    public $timestamps = false;

    public function category(){
        return $this->hasMany('App\san_phamModel', 'id_loai_san_pham', 'id');
    }
}
