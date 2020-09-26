<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endtime_auction extends Model
{
    protected $table='endtime_auction';
    // public $timestamps = false;
    // public function endtime() // phải viêt liền ko được cách ra hoặc _
    // {
    //     // D:\LUAN VAN\bookshop\app\Models\Auction_book.php
    //     return $this->belongsTo('App\Models\Auction_book','id_auction_book','Endtime_auction_id');
    //     // từ sản phẩm cha ra con xài hasone
    //     // (tên đường dẫn, 'khoa ngoại', khóa chính)
    // }
}
