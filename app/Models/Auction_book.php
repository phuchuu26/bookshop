<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction_book extends Model
{
    //
    protected $table='auction_book';
    // guard giúp cho hệ thống ngăn chặn người dùng có thể sửa dữ liệu ở các trường này
    protected $guarded = ['id'];
// fillable thì ngược lại

    // public $timestamps = false;
    public function theloai() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Sub_category','id_subcategory','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function account() // phải viêt liền ko được cách ra hoặc _
    {
        // D:\LUAN VAN\bookshop\app\User
        return $this->belongsTo('App\User','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function endtime() // phải viêt liền ko được cách ra hoặc _
    {
        // D:\LUAN VAN\bookshop\app\Models\Endtime_auction.php
        // return $this->belongsTo('App\Models\Endtime_auction','id','id_auction_book');
        // return $this->hasOne('App\Models\Endtime_auction', 'id','id_auction_book');
        // return $this->belongsTo('App\Models\Endtime_auction', 'id_auction_book','id');
        return $this->hasOne('App\Models\Endtime_auction','id_auction_book','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
