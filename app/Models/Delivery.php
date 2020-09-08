<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table='delivery';
    public $timestamps = false;
    
    
    public function province() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Province','delivery_provice','id'); 
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function district() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\district','delivery_district','id'); 
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function ward() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\ward','delivery_ward','id'); 
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
