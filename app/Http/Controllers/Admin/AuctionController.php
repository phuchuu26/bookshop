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
use App\Models\List_bidder;
use App\User;
use App\Events\StartAuction;
use Toastr;

class AuctionController extends Controller
{
    public $count;

    // danh sách các cuốn sách đang và đợi phê duyệt
    public function list(){
        $a = Carbon::now();
        // $a = 2020-09-26 11:12:35.590428 Asia/Ho_Chi_Minh (+07:00)
       // lấy sản phẩm cuối để get time => set thời gian kết thúc cho sản phẩm tiếp theo không bị trùng với sp cuối.
       $quantity = DB::table('endtime_auction')
       ->where('Endtime_auction_date','>',$a)
       ->count();
    //    dd($quantity);
        // $quantity -= 1;
        $list = Auction_book::orderBy('updated_at','desc')
        ->paginate(10);
        // $a = Endtime_auction::all();
        // dd($a);
        return view('admin.auction.list',compact('quantity','list','a'));
    }
    public function change($id){
        $a = Carbon::now();
        // $a = 2020-09-26 11:12:35.590428 Asia/Ho_Chi_Minh (+07:00)
       // lấy sản phẩm cuối để get time => set thời gian kết thúc cho sản phẩm tiếp theo không bị trùng với sp cuối.
       $quantity = DB::table('endtime_auction')
       ->where('Endtime_auction_date','>',$a)
       ->count();
       $this->count = $quantity;

        $auction_book = Auction_book::find($id);
        $type_time = $auction_book->auction_book_time_type;
        $time = $auction_book->auction_book_time;
        $a = Carbon::now();
         // $a = 2020-09-26 11:12:35.590428 Asia/Ho_Chi_Minh (+07:00)
        // lấy sản phẩm cuối để get time => set thời gian kết thúc cho sản phẩm tiếp theo không bị trùng với sp cuối.
        $spcuoi = DB::table('endtime_auction')
        ->where('Endtime_auction_date','>',$a)
        ->get()
        ->last();
        if($spcuoi){
            $a = $spcuoi->Endtime_auction_date;
        }
        // dd($spcuoi->Endtime_auction_date);
        $a = strtotime($a);
        // $a1 = strtotime($a);
        $d = strtotime($a);
        // xuử lý loại ngày với số time:
       if($type_time == 'Giờ' ){
            $a +=  ($time * 60 *60);
        }
        else{
            $a +=  ($time * 60);
        }
        // $a =1601611802
        // convert timestamp to datetime
        // $c = Carbon::createFromTimestamp($a)->toDateTimeString();
        // $c = 2020-10-02 11:10:02
        // dd($a);
        // format Y-m-d\TH:i
        // dd(date("Y-m-d\TH:i", strtotime($a)));
        $b =date("Y-m-d\TH:i", $a);
        // $b =2020-10-02T11:10
        // "2020-10-02T11:10"
        // dd($b);

        // time bat dau :
        // dd($spcuoi->Endtime_auction_date);
        // dd(Carbon::createFromTimestamp($d)->toDateTimeString());
        if($spcuoi){
            $e =date("Y-m-d\TH:i", strtotime($spcuoi->Endtime_auction_date));
        }
        else{

            $e =date("Y-m-d\TH:i", strtotime(Carbon::now()));
        }

        $image_sp =Image_auction::where('id_auction_book',$id)->get();
        $count = count($image_sp);
        $category = category::all();

    	$author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();

        return view('admin.auction.change',['quantity' => $quantity,'e' => $e,'b' => $b,'count' =>$count ,'image_sp'=>$image_sp , 'auction_book'=>$auction_book , 'author'=>$author, 'category'=>$category,
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

    // đồng ý duyệt sách
        public function endtimepost(Request $req, $id){
            // dd($req->all());
            // die;
            // findorFail giúp web quăng lỗi 404| not found nếu không tìm được id có chỉ số giống như url
            // $auction = Auction_book::findOrFail($id);
            // $auction->auction_book_status = 'Được xét duyệt';
            // $auction->save();

            $book = new Endtime_auction;

            // $book->auction_book_title = $req->Endtime_auction_date;

            $book->endtime_auction_date = $req->endDate;
            $book->starttime_auction_date = $req->startDate;
            $book->id_auction_book  = $id;
            $book->save();
            // Toastr::success('Xét duyệt sách thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

            $this->duyet($id);
            return redirect()->route('auction.admin.list');

        }

        public function duyet($id){
            // xem nếu hiện tại hàng đợi đấu giá trống thì bắt sự kiện trên trang client reload lại trang
            if($this->count == 0){
                $a = true;
                event(new StartAuction($a));
            }
            $data = Auction_book::findOrFail($id)->update(['auction_book_status'=>'Được xét duyệt']);
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
        // chốt sổ kết thúc đấu giá sách
        public function endAuction($id){
            $maxPrice = List_bidder::where('id_auction_book',$id)->orderBy('list_bidder_auction_money','desc')->first();
            $data = Auction_book::where('id',$id)->update(['auction_book_status'=>'Kết thúc đấu giá',
            'auction_book_final_winner' => $maxPrice->id_account
            ]);
            //var_dump($data);die;
            // $getstamps = 'a';
            // Session::put('msg','')
            Toastr::info('Kết thúc đấu giá sách', 'Thông báo', ["positionClass" => "toast-top-right"]);
            // return response()->json(array('success' => true, 'getstamps' => $getstamps));
            return back()->withInput();
        }
        public function huyxetduyet($id){
            $data = Auction_book::where('id',$id)->update(['auction_book_status'=>'Không được duyệt']);
            $a = Auction_book::findOrFail($id);
            $daxet = $a->endtime;
            $b = Endtime_auction::where('Endtime_auction_id',$daxet->Endtime_auction_id);
            $b->delete();
            // dd($daxet);
            // die;
            //var_dump($data);die;
            // Session::put('msg','')
            Toastr::info('Sách không được xét duyệt', 'Thông báo', ["positionClass" => "toast-top-right"]);

            return redirect()->route('auction.admin.list');
        }
}
