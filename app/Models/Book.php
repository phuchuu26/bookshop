<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Book extends Model implements Viewable
{
    protected $table='book';
    use Commentable, InteractsWithViews;

    public function images() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->hasMany('App\Models\Images','id_book','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }


    public function tacgia() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Author','id_author','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function theloai() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Sub_category','id_subcategory','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }


    public function nhaxuatban() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Publishing_house','id_publishinghouse','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function nhaphanphoi() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Models\Book_company','id_bookcompany','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function user() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\User','id_account','id');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
