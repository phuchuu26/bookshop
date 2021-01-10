<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\book;
use App\Models\bill;
use App\Models\Auction_book;
use App\Models\detail_bill;


Use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Toastr;
use DB;



class AdminController extends Controller
{
    public function home()
    {


        //admin
        $iduser = Auth::user()->id;

        // echo $iduser;die;
        $bill2 = bill::all();

        $bill = detail_bill::orderBy('id','desc')->get();

        $user = user::all()->count();
        // $tongtien2 = detail_bill::where('id_status','=','7');
        // foreach($tongtien2 as $tongtien)
        // {
        //     $tongtien->bills->bill_total;
        // }

        // $tongtien_user = bill::where('id_status','=','7')->where('id_account','=',$iduser)->sum('bill_total');

        $dsbill2 = detail_bill::where('id_nguoiban','=',Auth::user()->id)->get();

        //  dd($dsbill);

        $book = detail_bill::sum('qty');
        // tong don hang
        $tongdon = bill::count();

        // dd($tongdon);
        // dd($bill);

        $tongtien = bill::sum('bill_total');

        $thangcu =Carbon::now()->subMonth()->month;
        $thangtruoc = bill::whereMonth('created_at', '=',$thangcu)->sum('bill_total');
        // $tienthangtruoc = bill::where('created_at', $thangtruoc)->sum('bill_total');
        // dd($tongtien);
        $thangnay =Carbon::now()->month;
        $tienthangnayadmin = bill::whereMonth('created_at', '=',$thangnay)->sum('bill_total');
        // dd($tienthangnay);
        $luotxemadmin = DB::table('book')
        // ->where('id_account',$iduser)
        ->count('views');

            //thành viên:
//sách bán ra:
            $book1 = detail_bill::where('id_nguoiban',$iduser)->sum('qty');
            // dd($book);
            // $sach = DB::table('book')->lists()->where('id_account',$iduser);
            // $ng = user::where('id',$iduser);
            // $sach = book::where('id_account',$ng);
            // $tongtien_user = detail_bill::where('id_book',$sach);
            // $tongtien_user = detail_bill::where('id_book',)
            $sach = DB::table('detail_bill as db')
            ->join('book as b', 'db.id_book', 'b.id')
            ->select('db.qty','b.book_price')
            ->where('b.id_account',$iduser)
            ->get();
            $tongt =0;

            foreach($sach as $s){
                // $tongt = $s *intval($item);
                $tongt += $s->qty*($s->book_price);
            }
            //thang nay
            $tienthangnay = DB::table('detail_bill as db')
            ->join('book as b', 'db.id_book', 'b.id')
            ->join('bill','db.id_bill','bill.id')
            ->select('db.qty','b.book_price')
            ->where('b.id_account',$iduser)
            ->whereMonth('bill.created_at', '=',$thangnay)
            ->get();
            // dd($tienthangnay);
            $tongt1=0;
            foreach($tienthangnay as $s){
                // $tongt = $s *intval($item);
                $tongt1 += $s->qty*($s->book_price);
            }
            // dd($tongt1);
            //thangtruoc
            $tienthangtruoc = DB::table('detail_bill as db')
            ->join('book as b', 'db.id_book', 'b.id')
            ->join('bill','db.id_bill','bill.id')
            ->select('db.qty','b.book_price')
            ->where('b.id_account',$iduser)
            ->whereMonth('bill.created_at', '=',$thangcu)
            ->get();
            $tongt2=0;
            foreach($tienthangtruoc as $s){
                // $tongt = $s *intval($item);
                $tongt2 += $s->qty*($s->book_price);
            }
            // dd($tongt2);
            //số người xem sách của tv:
            $luotxem = DB::table('book')
            ->where('id_account',$iduser)
            ->count('views');
            // dd($luotxem);
            // tong don hang da ban
            $donhang = DB::table('detail_bill')
            ->where('id_nguoiban',$iduser)
            ->distinct('id_bill')
            ->count();
            // dd($donhang);

        // hiện thi thông báo tên mình
        Toastr::info('Xin chào '.Auth::user()->info->info_lastname.' '.Auth::user()->info->info_name.'', 'Welcome', ["positionClass" => "toast-top-right"]);

        return view('admin.index',['dsbill2' => $dsbill2, 'bill' => $bill,  'user' => $user, 'book' => $book, 'tongtien' => $tongtien, 'thangtruoc' => $thangtruoc, 'tongdon' => $tongdon,
        'tienthangnayadmin' => $tienthangnayadmin,
        'book1' => $book1,
        'tongt' => $tongt,
        'tongt1' => $tongt1,
        'tongt2' => $tongt2,
        'luotxem' => $luotxem,
        'luotxemadmin' => $luotxemadmin,
        'donhang' => $donhang
        ]);
    }
    public function get_bill(){

        $bills = detail_bill::where('id_nguoiban','=',Auth::user()->id)
        ->orderBy('created_at','DESC')
        ->paginate(10);
        // dd( $bills);
        return view('admin.detail_bill.bill',compact('bills'));

    }
    public function get_bill_auction(){

        $bills = Auction_book::where('id_account',Auth::user()->id)->get();
        $tests = array();
        foreach( $bills as $key => $b){
            if(!$b->getBook_buy){

                unset($bills[$key]);
            }else{
                array_push($tests, $b->getBook_buy);
            }
        };


        return view('admin.detail_bill.bill_auction',compact('tests'));
    }
    public function get_bill_admin(){
        // dd('test');
        $bills = detail_bill::orderBy('updated_at','DESC')->paginate(10);
        return view('admin.detail_bill.admin.bill',compact('bills'));

    }

    public function get_bill_auction_admin(){

        $bills = Auction_book::orderBy('updated_at','DESC')->get();
        $tests = array();
        // $object = new \stdClass;
        foreach( $bills as $key => $b){
            if(!$b->getBook_buy){

                unset($bills[$key]);
            }else{
                array_push($tests, $b->getBook_buy);
            }
        };
        // dd($object);
// dd($tests);

        return view('admin.detail_bill.admin.bill_auction',compact('tests'));
    }

}
