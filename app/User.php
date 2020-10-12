<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravelista\Comments\Commenter;

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

