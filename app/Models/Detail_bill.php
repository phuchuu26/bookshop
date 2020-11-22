<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_bill extends Model
{
    protected $table='detail_bill';
    // public $timestamps = false;

    public function detailbill2() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\book','id_book','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function bills() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Bill','id_bill','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function status() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\status','id_status','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function user31() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\User','id_nguoiban','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
