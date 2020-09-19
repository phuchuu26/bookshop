<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction_book extends Model
{
    //
    protected $table='auction_book';
    // public $timestamps = false;
    public function theloai() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Sub_category','id_subcategory','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
