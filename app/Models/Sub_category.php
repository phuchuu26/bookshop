<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table='sub_category';
    public $timestamps = false;

    public function category() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\category','id_category','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function getbook()
    {
        return $this->hasMany('App\Models\Book','id_subcategory','id');
    }
}
