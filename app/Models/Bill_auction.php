<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_auction extends Model
{
    protected $table='bill_auction';
    protected $primaryKey = 'id';

    public function getNguoiThanhToan(){
        return $this->belongsTo('App\User','id_account','id');
    }

    public function getAuctionBook(){
        return $this->belongsTo('App\Models\Auction_book','id_auction_book','id');
    }

    public function status() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\status','id_status','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
