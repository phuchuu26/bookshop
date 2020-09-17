<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Endtime_auction;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\sub_category;
Use Illuminate\Support\Facades\Auth;
use App\Models\book;
use App\Models\Auction_book;
use App\Models\author;
use App\Models\Image_auction;
use App\Models\book_company;
use App\Models\publishing_house;
use App\User;
use Toastr;
class AuctionController extends Controller
{
    public function index(){
        $date1 = $user = DB::table('endtime_auction')->first();
        $date = $date1->Endtime_auction_date;
        $h = $date1->Endtime_auction_hour;
        $m = $date1->Endtime_auction_minute;
        $s = $date1->Endtime_auction_second;
        $current_date_time = strtotime("$date" ) * 1000;
        $current_date_time += $h * 60 * 60;
        $current_date_time += $m * 60;
        $current_date_time += $m ;
        $current_date_time = strtotime("$date $h:$m:$s" ) ;
        // $date = strtotime($date);
        // $h = strtotime($h);
        // $date =
        // $category = Category::all();
        // return view('admin.category.list',['category'=>$category]);
        return view('page.auction.index',compact('date','h','m','s','current_date_time'));
        // return view('page.auction.index',['category'=>$category]);
    }

    public function addAuctionBook(){
        $category = category::all();

    	$author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();
        return view('admin_cus.auction.index',['author'=>$author, 'category'=>$category, 'publishinghouse'=>$publishinghouse, 'account'=>$account, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }

    // store

    // |dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
    public function store(Request $book2){
        $this->validate($book2,[
            'bookname' => 'required|min:2',
            // 'book_image' => 'required',
            'book_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
         ],[
             'bookname.required' => 'Bạn chưa nhập tên !',
             'bookname.min' => 'Bạn nhập chưa đủ 2 ký tự !',
             'book_image.required' => 'Bạn chưa nhập ảnh bìa !',
             'book_image.image' => 'File phải là hình ảnh !',
             'book_image.max' => 'Dung lượng file phải dưới 2MB !',
             'book_image.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG !',


         ]);
         $book = new auction_book;

         $book->auction_book_title = $book2->bookname;

         $book->auction_book_quantity = $book2->amount;

         $book->auction_book_description = $book2->mota;

         $book->auction_book_numberpage = $book2->numberpage;

         $book->auction_book_weight = $book2->weight;

         $book->auction_book_releasedate = $book2->releasedate;

         $book->auction_book_status = 'Chưa duyệt';
         $tien = preg_replace("/[^0-9]/", '',  $book2->reserve_price);

         $book->auction_book_reserve_price = $tien;


         // Khóa ngoại
         $book->id_author = $book2->idauthor;

         $book->id_subcategory = $book2->idsubcategory;

         $book->id_publishinghouse = $book2->idpublishinghouse;

         $book->id_bookcompany = $book2->idbookcompany;

         $book->id_account = Auth::user()->id;

         if($book2->time == 1){
            $value = $book2->value_time;
            $value = $value * 60;
        }  else if($book2->time == 3){
            $value = $book2->value_time;
            $value = $value * 60*24;
        }
        else{
            $value = $book2->value_time;
        }
        $book->auction_book_time = $value;

         if($book2->hasFile('book_image'))
        {
            $file = $book2->file('book_image');

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(5)."_".$name;

            // echo $hinh_anh;die;
            while(file_exists('public/upload/products/'.$hinh_anh))
            {
                 $hinh_anh = str_random(4)."_".$name;
            }
             // echo $name; die;
            $file->move('public/upload/products/',$hinh_anh);
            $book->auction_book_image = $hinh_anh;


        }


        $book->save();

        if($book2->hasFile('book_image1'))
        {

            $file1 = $book2->file('book_image1');
                $image_sp = new Image_auction;

                if(isset($file1))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image1' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image1.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image1.image' => 'File phải là hình ảnh !',
                         'book_image1.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image1.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file1->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file1->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }
        if($book2->hasFile('book_image2'))
        {

            $file2 = $book2->file('book_image2');
                $image_sp = new Image_auction;

                if(isset($file2))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image2' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image2.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image2.image' => 'File phải là hình ảnh !',
                         'book_image2.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image2.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file2->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file2->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }


        if($book2->hasFile('book_image3'))
        {

            $file3 = $book2->file('book_image3');
                $image_sp = new Image_auction;

                if(isset($file3))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image3' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image3.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image3.image' => 'File phải là hình ảnh !',
                         'book_image3.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image3.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file3->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file3->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }

        Toastr::success('Thêm sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('add_auctionBook').'');
    }
}
