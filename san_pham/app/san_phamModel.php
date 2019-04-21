<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_phamModel extends Model
{
    protected $table = "san_pham";
    public $timestamps = false;

    public function loai_san_pham(){
        return $this->belongsTo('App\loai_san_phamModel', 'id_loai_san_pham', 'id');
    }
}
