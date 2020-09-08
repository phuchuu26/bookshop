<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sub_category;
use App\Models\Book;
use DB;
Use Illuminate\Support\Facades\Auth;
use App\Models\Detail_bill;

use Toastr;

use Carbon\Carbon;
use App\User;

class PageController extends Controller
{
    public function home(){
        $books = DB::table('book')
        ->orderBy('id', 'DESC')
        ->get();
        // $oddbooks =   DB::table('book')
        // // ->select(DB::raw('book.id'))
        // ->whereRaw('MOD(id, 2) = 1')
        // ->orderBy('id', 'DESC')
        // ->limit(5)
        // ->get();
        // $evenbooks =   DB::table('book')
        // // ->select(DB::raw('book.id'))
        // ->whereRaw('MOD(id, 2) = 0')
        // ->orderBy('id', 'DESC')
        // ->limit(5)
        // ->get();
        // dd($oddbooks);

        // get ban chay 6sp limit (6)


        //lấy sp giam gia
        $giams = DB::table('book as b')
        // ->select(DB::raw('DISTINCT b.id, ,b.book_title,b.book_price,b.book_sale,b.book_image ,e.evaluate_tbc'))
        // ->where
        // ->whereRaw('(book_sale)!=NULL')
        ->WhereNotNull('book_sale')
        ->orderBy('id', 'DESC')
        ->get();

        // ->unique('')
        // ->distinct('b.id')
        // ->groupBy('b.id')
        // dd($giams);

        //lấy sản phẩm được xem nn:
        $xemnhieu = DB::table('book')
        ->orderBy('views', 'DESC')
        ->limit(6)
        ->get();
        // dd($xemnhieu);


        // SELECT COUNT(`book_title`) as sl, `book_title`, `subcategory_name`
        //  FROM `book` as b JOIN `detail_bill` as db ON b.id = db.id_book JOIN
        //  `sub_category` as sc ON b.`id_subcategory`= sc.id GROUP BY `book_title`,`subcategory_name` ORDER BY sl DESC


        // lấy sản phẩm bán chạy: theo từng loại sản phẩm , lấy đủ 4 loại limit5
        //loai id = 2:
        // $loai2 = category::find(2);
        // $loai2a = $loai2->subcategory;
        // $loai2a = $loai2a->getbook->book_title;
        // dd($loai2a);

        $loai2s = DB::table('detail_bill as db')
        ->join('book as b','db.id_book','b.id')
        ->join('sub_category as sc','b.id_subcategory','sc.id')
        ->join('category as c','sc.id_category','c.id')
        ->select(DB::raw('sum(db.qty) as dem'), 'b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->where('c.id','=','49')
        ->groupby('b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->orderby('dem','DESC')
        ->get();
        $loai5s = DB::table('detail_bill as db')
        ->join('book as b','db.id_book','b.id')
        ->join('sub_category as sc','b.id_subcategory','sc.id')
        ->join('category as c','sc.id_category','c.id')
        ->select(DB::raw('sum(db.qty) as dem'), 'b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->where('c.id','=','5')
        ->groupby('b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->orderby('dem','DESC')
        ->get();
        // dd($loai2s);
        $loai41s = DB::table('detail_bill as db')
        ->join('book as b','db.id_book','b.id')
        ->join('sub_category as sc','b.id_subcategory','sc.id')
        ->join('category as c','sc.id_category','c.id')
        ->select(DB::raw('sum(db.qty) as dem'), 'b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->where('c.id','=','41')
        ->groupby('b.book_title','c.id','b.book_price','b.book_sale','b.book_image','b.book_tbc')
        ->orderby('dem','DESC')
        ->get();
        $loai0s = DB::table('detail_bill as db')
        ->join('book as b','db.id_book','b.id')
        ->join('sub_category as sc','b.id_subcategory','sc.id')
        ->join('category as c','sc.id_category','c.id')
        ->select(DB::raw('sum(db.qty) as dem'), 'b.book_title','c.id','b.book_price','b.book_sale','b.book_image')
        ->wherenotin('c.id',[49,41,5])
        ->groupby('b.book_title','c.id','b.book_price','b.book_sale','b.book_image')
        ->orderby('dem','DESC')
        ->get();

        // dd($loai0s);
        // lấy modal:
        // $modal = book::all();
        // dd($modal);
         // so luong danh gia cua chi tiet sp
//   $evaluate1 = DB::table('evaluate')
//   ->where('id_book',$id)
//   ->count();
//     // tinh tb rank
//     $sum = DB::table('evaluate')
//     ->where('id_book',$id)
//     ->sum('evaluate_rank');
//     // dd($sum);
//     if($sum!=0){
//         $tbc= ($sum)/($evaluate1);
//     }
//     else{
//         $tbc = 0;
//     }
        // sách được đánh giá cao:
        $danhgia1 = DB::table('book as b')
        // ->join('evaluate as e','b.id', 'e.id_book')
        ->orderByRaw('b.book_tbc DESC')
        // ->orderByRaw('count(b.id) ASC')
        ->limit(5)
        ->get();
        // dd($danhgia1);
      return view('page.index',compact('books','giams','xemnhieu','loai2s','loai5s','loai41s','loai0s','danhgia1'));
    }

    public function book_subcategory($id){

      $book = book::where('id_subcategory','=',$id)->where('id_status','=','1')->paginate(6);
      $book2 = book::where('id_subcategory','=',$id)->count();
      $theloai = category::all();
    //   $tl = sub_category::where('id',$id);
    //   dd($tl);

      return view('page.book.list',['book' => $book, 'book2' => $book2 , 'theloai' => $theloai]);
    }

    public function book_category(){
      $category = san_pham::paginate(4);
      return view('page.category.list',['category' => $category ]);
    }

    public function book_detail($id){
      $book = book::find($id);

      views($book)
            ->cooldown(Carbon::now()->addMinutes(1))
            ->record();

      $data = book::where('id',$id)->update(['views'=>views($book)->count()]);
        // $pro = DB::table('book')->->exclude([''])
        $temp= $book->user->id;
      $pro = DB::table('book')
      ->where('id','!=',$id)
      ->where('id_account','=',$temp)
    //   ->limit(5)
      ->get();
      $c_pro=$pro->count();
    //   dd($c_pro);

    //sp lien quan:
    $subcate = $book->theloai->id;
    // tìm những sản phẩm thuộc mỗi category ::
    // $subcate1 = sub_category::find($subcate);
    // $cate = $subcate1->category->id;
    // $cate2 = Category::find($cate);
    // $cate3 = $cate2->subcategory->id;
      $ca_pro= DB::table('book')
      ->where('id_subcategory','=',$subcate)
    ->get();
    $ca_pro1 = $ca_pro->count();
    // dd($ca_pro1);
    if(Auth::check()){

        $idkh = Auth::user()->id;
        // kiem tra xem nguoi dung da danh gia chua, neu danh gia roi thi chi dc edit.
        $evaluate = DB::table('evaluate')
        ->where('id_account',$idkh)
        ->where('id_book',$id)
        ->count();
    }else{
        $evaluate = 1;
    }

        // dd($evaluate1);
        // hien thi danh gia
        $danhgia = DB::table('evaluate as e')
    ->select('e.*','i.info_name','i.info_lastname')
    // ->join('book as b' , 'e.id_book','b.id')
    ->join('account as a','e.id_account','a.id')
    ->join('info as i','a.id','i.id_account')
    ->where('id_book',$id)
            ->get();
            // dd($danhgia);
  // so luong danh gia cua chi tiet sp
  $evaluate1 = DB::table('evaluate')
  ->where('id_book',$id)
  ->count();
    // tinh tb rank
    $sum = DB::table('evaluate')
    ->where('id_book',$id)
    ->sum('evaluate_rank');
    // dd($sum);
    if($sum!=0){
        $tbc= ($sum)/($evaluate1);
    }
    else{
        $tbc = '?';
    }

      return view('page.book.detail',['book' => $book, 'pros'=>$pro, 'c_pro'=>$c_pro, 'ca_pro'=>$ca_pro, 'ca_pro1'=>$ca_pro1, 'evaluate'=>$evaluate, 'danhgia' => $danhgia, 'evaluate1' =>$evaluate1, 'tbc' =>$tbc]);
    }

    public function shopuser($id){
        $theloai = category::all();
        // $book = book::find($id);

        // views($book)
        //       ->cooldown(Carbon::now()->addMinutes(1))
        //       ->record();

        // $data = book::where('id',$id)->update(['views'=>views($book)->count()]);
        // dd($cus);
        $user = User::find($id);
        //có username ông lấy qua info_name đi


        // $book3 = book::where('id_account','=',$id)->where('id_status','=','1');
        $book = book::where('id_account','=',$id)->where('id_status','=','1')->paginate(6);
        $book2 = book::where('id_account','=',$id)->count();

        return view('page.account.shop',compact('book','book2','user','theloai'));
      }

      public function write_cmt(Request $request,$id){
          $idkh = Auth::user()->id;
          $title = $request->title;
          $content = $request->content;
          $rating = $request->rating;

          $evaluate1 = DB::table('evaluate')
        ->where('id_book',$id)
        ->count();
            // tinh tb rank
            $sum = DB::table('evaluate')
            ->where('id_book',$id)
            ->sum('evaluate_rank');
            // dd($sum);
            // if($sum!=0){
                $tbc= (($sum)+$rating)/($evaluate1+1);
            // }
            // else{
            //     $tbc = '1';
            // }


          $data = DB::table('evaluate')->insert([
            'evaluate_title'=> $title,
            'evaluate_content' => $content,
            'evaluate_rank' => $rating,
            'id_book' => $id,
            'id_account' => $idkh,
            // 'evaluate_tbc'=> $tbc,
          ]);
          $affected = DB::table('book')
              ->where('id', $id)
              ->update(['book_tbc' => $tbc]);
          return redirect()->route('b.detail', ['id' => $id]);
      }

      public function trend(){
        $theloai = category::all();
        $sp  = book::paginate(15);
        $book2 = Book::count();
          return view('page.book.trend',compact('sp','book2','theloai'));
      }

      public function category($id){

        // $book = book::where('id_subcategory','=',$id)->where('id_status','=','1')->paginate(6);
        $book = DB::table('book as b')
        ->join('sub_category as sc', 'b.id_subcategory', 'sc.id')
        ->join('category as c','sc.id_category', 'c.id')
        ->where('c.id',$id)
        ->paginate(9);
        // dd($book);
        $book2 = DB::table('book as b')
        ->join('sub_category as sc', 'b.id_subcategory', 'sc.id')
        ->join('category as c','sc.id_category', 'c.id')
        ->count('b.id');
        $theloai = category::all();
      //   $tl = sub_category::where('id',$id);
      //   dd($tl);

        return view('page.book.category',['book' => $book, 'book2' => $book2 , 'theloai' => $theloai]);
      }

}
