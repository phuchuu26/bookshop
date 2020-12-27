<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;

class TimkiemController extends Controller
{
    public function post_search(Request $rq)
    {

        // $book3 = book::where('id_subcategory','=',$id)->where('id_status','=','1')->paginate(6);
        // $book2 = book::where('id_subcategory','=',$id)->count();
        $theloai = category::all();
      //   $tl = sub_category::where('id',$id);
      //   dd($tl);

        // return view('page.book.list',['book3' => $book3, 'book2' => $book2 , 'theloai' => $theloai]);
        $tukhoa = $rq->tukhoa;

        $book = book::where('book_title','like',"%$tukhoa%")
        ->orWhere('book_description','like',"%$tukhoa%")
        ->orWhere('book_amount','like',"%$tukhoa%")
        ->orWhere('book_sale','like',"%$tukhoa%")
        ->orWhere('book_numberpage','like',"%$tukhoa%")
        ->orWhere('book_weight','like',"%$tukhoa%")
        ->orWhere('book_releasedate','like',"%$tukhoa%")
        ->orWhere('views','like',"%$tukhoa%")
        ->orWhere('book_price','like',"%$tukhoa%")
        ->get();
        // $sanpham2 = book::where('book_title','like',"%$tukhoa%")->count();

        // $collection = collect([$sanpham2]);
        // $banhbao = $collection->sum();

        return view('page.tim-kiem.tim-kiem',['book'=>$book,'tukhoa'=>$tukhoa, 'theloai' => $theloai]);

    }
}
