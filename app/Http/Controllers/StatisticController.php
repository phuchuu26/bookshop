<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Messages;
use Carbon\Carbon;
use App\Models\Bill;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
Use Illuminate\Support\Facades\Auth;
use Response;
use App\Events\HelloPusherEvent;
// use App\Events\HelloPusherEvent;
class StatisticController extends Controller
{

    public function countmess(){
        $userCollection = User::where('id', Auth::user()->id)->get();
        // dd($userCollection);
        // die;
        // Get user data
        $count = Messages::where('to_id', Auth::user()->id)->where('seen',0)->count();

        // dd($count);
            // $count = 1;
            // send the response
            return Response::json([
                'count' => $count,
            ], 200);
    }
        public function countmess1($id){
        $userCollection = User::where('id', $id)->get();
        // dd($userCollection);
        // die;
        // Get user data
        $count = Messages::where('to_id', $id)->where('seen',0)->count();
        $count += 1;
        // dd($count);
            // $count = 1;
            // send the response
            // $message = $request->query->get('message', 'Hey guysa!');
            // $message = 1;
            event(new HelloPusherEvent($count,$id));
            return "Message \" $count \" has been sent.";
    }

    public function bill(){
        $chart_options = [
            'chart_title' => 'Thống kê đơn hàng',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Bill',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('admin.statistic.bill',['chart1' => $chart1]);

    }
    public function billdata(Request $request)
    {
        $from =$request->tuNgay;
        $to =$request->denNgay;
        // $parameter = [
        //     'tuNgay' => $request->tuNgay."00:00:00",
        //     'denNgay' => $request->denNgay."00:00:00"
        // ];
        // Carbon::parse($parameter['tuNgay'])->toDatetimeString();
        // Carbon::parse($parameter['denNgay'])->toDatetimeString();
            // dd($parameter);
        // $data = DB::select('
        //     SELECT b.created_at as thoiGian
        //         , COUNT(*) as tongThanhTien
        //     FROM bill b
        //     GROUP BY b.created_at
        //     ');
        $data = DB::table('bill')
        ->select(DB::raw('DATE(created_at) as thoiGian'), DB::raw('count(*) as tongThanhTien'))
        ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
        ->groupBy('thoiGian')
        ->get();
        // dd($data);
        // [$from." 00:00:00",$to." 00:00:00"]
            // WHERE b.created_at BETWEEN $from."00:00:00" AND  $to."00:00:00"
            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
            // dd($parameter);
            // JOIN cusc_chitietdonhang ctdh ON dh.dh_ma = ctdh.dh_ma
        }
        public function sale(){



            return view('admin.statistic.sale');

        }
        public function saledata(Request $request)
        {
            $from =$request->tuNgay;
            $to =$request->denNgay;
            // $parameter = [
            //     'tuNgay' => $request->tuNgay."00:00:00",
            //     'denNgay' => $request->denNgay."00:00:00"
            // ];
            // Carbon::parse($parameter['tuNgay'])->toDatetimeString();
            // Carbon::parse($parameter['denNgay'])->toDatetimeString();
                // dd($parameter);
            // $data = DB::select('
            //     SELECT b.created_at as thoiGian
            //         , COUNT(*) as tongThanhTien
            //     FROM bill b
            //     GROUP BY b.created_at
            //     ');
            $data = DB::table('bill')
            ->select(DB::raw('DATE(created_at) as thoiGian'), DB::raw('sum(bill_total) as tongThanhTien'))
            ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
            ->groupBy('thoiGian')
            ->get();
            // dd($data);
            // dd($data);
            // [$from." 00:00:00",$to." 00:00:00"]
                // WHERE b.created_at BETWEEN $from."00:00:00" AND  $to."00:00:00"
                return response()->json(array(
                    'code'  => 200,
                    'data' => $data,
                ));
                // dd($parameter);
                // JOIN cusc_chitietdonhang ctdh ON dh.dh_ma = ctdh.dh_ma
            }

            public function quantity(){
                // $from = $req
                return view('admin.statistic.quantity');

            }

            public function quantitycategory(){
                // $from = $req
                // return view('admin.statistic.quantity');

                $data = DB::table('sub_category')
                ->select( DB::raw('sum(book_amount) as amount') ,'subcategory_name as ten')
                ->join('book','sub_category.id','book.id_subcategory')
                // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->groupBy('subcategory_name')
                ->get();

                return response()->json(array(
                    'code'  => 200,
                    'data' => $data,
                ));
            }
            //ncc
            public function quantitycompany(){
                // $from = $req
                // return view('admin.statistic.quantity');
                $data = DB::table('book_company')
                ->select( DB::raw('sum(book_amount) as amount') ,'bookcompany_name as ten')
                ->join('book','book_company.id','book.id_bookcompany')
                // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->groupBy('bookcompany_name')
                ->get();

                return response()->json(array(
                    'code'  => 200,
                    'data' => $data,
                ));
            }
            public function quantitynxb(){
                // $from = $req
                // return view('admin.statistic.quantity');
                $data = DB::table('publishing_house')
                ->select( DB::raw('sum(book_amount) as amount') ,'publishinghouse_name as ten')
                ->join('book','publishing_house.id','book.id_publishinghouse')
                // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->groupBy('publishinghouse_name')
                ->get();

                return response()->json(array(
                    'code'  => 200,
                    'data' => $data,
                ));
            }
            public function quantityauthor(){
                // $from = $req
                // return view('admin.statistic.quantity');
                $data = DB::table('author')
                ->select( DB::raw('sum(book_amount) as amount') ,'author_name as ten')
                ->join('book','author.id','book.id_author')
                // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->groupBy('author_name')
                ->get();

                return response()->json(array(
                    'code'  => 200,
                    'data' => $data,
                ));
            }

            public function product(){
                return view('admin.statistic.product');
            }
            public function productdata(){
                $data = DB::table('detail_bill as db')
                ->select(DB::raw('sum(qty) as tongcuondaban'), 'book_title as ten')
                ->join('book as b','db.id_book','b.id')
                // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->groupBy('ten')
                ->limit(5)
                ->orderBy('tongcuondaban','desc')
                ->get();
                // dd($data);
                // dd($data);
                // [$from." 00:00:00",$to." 00:00:00"]
                    // WHERE b.created_at BETWEEN $from."00:00:00" AND  $to."00:00:00"
                    return response()->json(array(
                        'code'  => 200,
                        'data' => $data,
                    ));
            }


            // phan thanh vien

            public function bill_cus(){
                return view('admin_cus.statistic.bill');
            }

            public function billdata_cus(Request $request){
                $from =$request->tuNgay;
                $to =$request->denNgay;
                $id_cus = Auth::user()->id;
        $data = DB::table('bill')
        ->select(DB::raw('DATE(created_at) as thoiGian'), DB::raw('count(*) as tongThanhTien'))
        ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
        ->where('id_account',$id_cus)
        ->groupBy('thoiGian')
        ->get();

            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
            }

            // doanh thu
            public function salecus(){



                return view('admin_cus.statistic.sale');

            }
            public function saledatacus(Request $request)
            {
                $from =$request->tuNgay;
                $to =$request->denNgay;

                $id_cus = Auth::user()->id;
                $data = DB::table('bill')
                ->select(DB::raw('DATE(created_at) as thoiGian'), DB::raw('sum(bill_total) as tongThanhTien'))
                ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
                ->where('id_account',$id_cus)
                ->groupBy('thoiGian')
                ->get();
                // dd($data);
                // dd($data);
                // [$from." 00:00:00",$to." 00:00:00"]
                    // WHERE b.created_at BETWEEN $from."00:00:00" AND  $to."00:00:00"
                    return response()->json(array(
                        'code'  => 200,
                        'data' => $data,
                    ));
}

        // so luong san_pham
        public function quantitycus(){
            // $from = $req
            $id_cus = Auth::user()->id;
            $data = DB::table('sub_category')
            ->select( 'book.book_amount')
            ->join('book','sub_category.id','book.id_subcategory')
            ->where('book.id_account',$id_cus)
            // ->groupBy('subcategory_name')
            ->count();
            // dd($data);
            return view('admin_cus.statistic.quantity',compact('data'));

        }

        public function quantitycategorycus(){
            // $from = $req
            // return view('admin.statistic.quantity');
            $id_cus = Auth::user()->id;
            $data = DB::table('sub_category')
            ->select( DB::raw('sum(book_amount) as amount') ,'subcategory_name as ten')
            ->join('book','sub_category.id','book.id_subcategory')
            ->where('book.id_account',$id_cus)
            ->groupBy('subcategory_name')
            ->get();

            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
        }
        //ncc
        public function quantitycompanycus(){
            // $from = $req
            // return view('admin.statistic.quantity');
            $id_cus = Auth::user()->id;
            $data = DB::table('book_company')
            ->select( DB::raw('sum(book_amount) as amount') ,'bookcompany_name as ten')
            ->join('book','book_company.id','book.id_bookcompany')
            ->where('book.id_account',$id_cus)
            // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
            ->groupBy('bookcompany_name')
            ->get();

            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
        }
        public function quantitynxbcus(){
            // $from = $req
            // return view('admin.statistic.quantity');
            $id_cus = Auth::user()->id;
            $data = DB::table('publishing_house')
            ->select( DB::raw('sum(book_amount) as amount') ,'publishinghouse_name as ten')
            ->join('book','publishing_house.id','book.id_publishinghouse')
            ->where('book.id_account',$id_cus)
            // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
            ->groupBy('publishinghouse_name')
            ->get();

            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
        }
        public function quantityauthorcus(){
            // $from = $req
            // return view('admin.statistic.quantity');
            $id_cus = Auth::user()->id;
            $data = DB::table('author')
            ->select( DB::raw('sum(book_amount) as amount') ,'author_name as ten')
            ->join('book','author.id','book.id_author')
            ->where('book.id_account',$id_cus)
            // ->whereBetween('created_at',[$from." 00:00:00",$to." 00:00:00"])
            ->groupBy('author_name')
            ->get();

            return response()->json(array(
                'code'  => 200,
                'data' => $data,
            ));
        }
}
