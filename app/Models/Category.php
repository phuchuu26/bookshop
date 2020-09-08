<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    public $timestamps = false;

    public function subcategory() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasMany('App\Models\sub_category','id_category','id'); 
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
