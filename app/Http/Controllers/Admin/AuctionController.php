<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Endtime_auction;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
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
    public function list(){
        $list = Auction_book::paginate(10);
        return view('admin.auction.list',compact('list'));
    }
    public function change($id){
        $auction_book = Auction_book::find($id);
        $image_sp =Image_auction::where('id_auction_book',$id)->get();
        $count = count($image_sp);
        $category = category::all();

    	$author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();
        return view('admin.auction.change',['count' =>$count ,'image_sp'=>$image_sp , 'auction_book'=>$auction_book , 'author'=>$author, 'category'=>$category,
        'publishinghouse'=>$publishinghouse, 'account'=>$account, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }
    // public function index(){
    //     $date1 = $user = DB::table('endtime_auction')->first();
    //     $date = $date1->Endtime_auction_date;
    //     $h = $date1->Endtime_auction_hour;
    //     $m = $date1->Endtime_auction_minute;
    //     $s = $date1->Endtime_auction_second;
    //     $current_date_time = strtotime("$date" ) * 1000;
    //     $current_date_time += $h * 60 * 60;
    //     $current_date_time += $m * 60;
    //     $current_date_time += $m ;
    //     $current_date_time = strtotime("$date $h:$m:$s" ) ;
    //     // $date = strtotime($date);
    //     // $h = strtotime($h);
    //     // $date =
    //     // $category = Category::all();
    //     // return view('admin.category.list',['category'=>$category]);
    //     return view('page.auction.index',compact('date','h','m','s','current_date_time'));
    //     // return view('page.auction.index',['category'=>$category]);
    // }

        public function duyet($id){
            $data = Auction_book::where('id',$id)->update(['auction_book_status'=>'Được xét duyệt']);
            //var_dump($data);die;
            // Session::put('msg','')
            Toastr::info('Sách đã được xét duyệt thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

            // cách để gọi method khác trong class
            // self::koduyet($id);
            // $this->koduyet($id);

            return redirect()->route('auction.admin.list');
        }
        public function koduyet($id){
            $data = Auction_book::where('id',$id)->update(['auction_book_status'=>'Không được duyệt']);
            //var_dump($data);die;
            // Session::put('msg','')
            Toastr::info('Sách không được xét duyệt', 'Thông báo', ["positionClass" => "toast-top-right"]);

            return redirect()->route('auction.admin.list');
        }
}
