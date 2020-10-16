<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class List_bidder extends Model
{
    protected $table='list_bidder';
    // public $timestamps = true;
    public function info() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\User','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
