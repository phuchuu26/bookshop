<?php

namespace App\Models;
use App\Models\List_bidder;
Use Illuminate\Support\Facades\Auth;
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
    public function getBook() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Auction_book','id_auction_book','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    // public function getEndtime() // phải viêt liền ko được cách ra hoặc _
    // {
    //     return $this->belongsTo('App\Models\Endtime_auction','id_auction_book','id');
    //     // từ sản phẩm cha ra con xài hasone
    //     // (tên đường dẫn, 'khoa ngoại', khóa chính)
    // }

    public function count($id) // phải viêt liền ko được cách ra hoặc _
    {
        $a = List_bidder::where('id_account',Auth::user()->id)->where('id_auction_book',$id)->count();
        return $a;
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function maxPrice($id) // phải viêt liền ko được cách ra hoặc _
    {
        $a = List_bidder::where('id_account',Auth::user()->id)->where('id_auction_book',$id)->max('list_bidder_auction_money');
        return $a;
    }
    public function countPerUser($id,$user) // phải viêt liền ko được cách ra hoặc _
    {
        $a = List_bidder::where('id_account',$user)->where('id_auction_book',$id)->count();
        return $a;
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    // public function checkPayment()
    // {
    //     // dd($this);
    //     // return $this->hasMany('App\Models\Image_auction','id_auction_book','id');
    //     // xem record do co ton tai khong
    //     $a = bill_auction::where('id_auction_book',$this->id)->where('id_account',$this->auction_book_final_winner)->exists();
    //     // dd($a);
    //     return $a;
    // }
}
