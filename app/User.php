<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravelista\Comments\Commenter;
use App\Models\Book;
use App\Models\Auction_book;

class User extends Authenticatable
{
    protected $table='Account';
    use Notifiable, Commenter;

    public function vaitro() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Role','level','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function book() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasMany('App\Models\Book','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function bill() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasMany('App\Models\Bill','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function auction_book() // phải viêt liền ko được cách ra hoặc _
    {
        // dd($this);
        return $this->hasMany('App\Models\Auction_book','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
     public function getwinner() // phải viêt liền ko được cách ra hoặc _
    {
        // dd($this);
        return $this->hasMany('App\Models\Auction_book','auction_book_final_winner','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
     public function list_bidder() // phải viêt liền ko được cách ra hoặc _
    {
        // dd($this);
        return $this->hasMany('App\Models\List_bidder','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function info() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasOne('App\Models\Info','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function delivery() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasOne('App\Models\Delivery','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function member() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Member_vip','id_member_vip','member_vip_id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
    public function careShop() // phải viêt liền ko được cách ra hoặc _
    {
       $a = Book::where('id_account',$this->id)->sum('views');
    //    dd($a);
       $b = Auction_book::where('id_account',$this->id)->sum('views');
        $c = $a + $b;
        return $c;
        // $a = $this->hasMany('App\Models\Book','id_account','id')->get();
        // $a = $a->sum('views');
        // dd($a);
    }

    // public function getMember(){
    //     return $this->hasOne('App\Models\Member_vip','id_member_vip','member_vip_id');
    // }

    // protected $primaryKey = 'id_user';
    // để sử dụng bảng tbl_user của minh tạo ra, mặc định users của laravel nên phải đổi nó lại.
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

