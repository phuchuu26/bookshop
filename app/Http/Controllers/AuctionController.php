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
use App\Models\author;
use App\Models\book_company;
use App\Models\publishing_house;
use App\User;
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
}
