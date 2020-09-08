<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bill';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'id',
	// 	'bill_code',
	// 	'bill_total',
	// 	'bill_phone',
	// 	'created_at',
	// ];



    public function detailbill() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasMany('App\Models\detail_bill','id_bill','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function userbill() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\User','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }


}
