<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table='Info';
    public $timestamps = false;

    public function infor2() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasOne('App\User','id_account','id'); 
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    
}
