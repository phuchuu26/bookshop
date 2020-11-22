<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;

    use App\Models\bill;
    use App\Models\detail_bill;

use App\Models\payment;
use App\Models\bill_auction;


use Toastr;

// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456


class BillController extends Controller
{

    // public function buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code,
    // $amount, $customer_mobile, $websiteid, $secret_key, $vtcpay_url, $param_extend)
    // {
    //     // M?ng c�c tham s? chuy?n t?i VTC Pay

    //     $arr_param = array(
    //         'return_url'		=>	strtolower(urlencode($return_url)),
    //         'receiver'			=>	strval($receiver),
    //         'transaction_info'	=>	strval($transaction_info),
    //         'order_code'		=>	strval($order_code),
    //         'amount'			=>	strval($amount)
    //     );
    //     $currency = 2;

    //     $plaintext = $websiteid  . "-" . $currency  . "-" . $arr_param['order_code'] . "-" . $arr_param['amount']
    //     . "-" . $arr_param['receiver'] . "-" .$param_extend. "-" . $secret_key."-".$return_url;

    //     $sign = strtoupper(hash('sha256', $plaintext));

    //     $data = "?website_id=" . $websiteid  ."&payment_method=" . $currency . "&order_code=" . $arr_param['order_code']
    //     . "&amount=" . $arr_param['amount'] . "&receiver_acc=" .  $arr_param['receiver'];

    //     $data = $data . "&customer_mobile=" . $customer_mobile . "&order_des=" . $arr_param['transaction_info']
    //     ."&sign=" . $sign."&param_extend=" . $param_extend."&urlreturn=".$return_url;
    //     $destinationUrl = $vtcpay_url . $data;
    //     $destinationUrl = str_replace("%3a",":",$destinationUrl);
    //     $destinationUrl = str_replace("%2f","/",$destinationUrl);
    //     return $destinationUrl;
    // }
    public function post_bill(Request $request)
    {
        $route = \Request::route();
        $url = url()->previous();

        // kiểm tra xem đường dẫn url thuộc về thanh toán do đấu giá hay mua sách

        $pos = strpos( $url, 'checkout_auction');
        // thanh toán đấu giá
        if ($pos !== false) {

            $bill = new bill_auction;
            $bill->save();



            if($request->tt == 2)
            {
                session(['cost_id' => $request->id]);
                session(['url_prev' => url()->previous()]);
                // $vnp_TmnCode = "VVULVOU2"; //Mã website tại VNPAY
                $vnp_TmnCode = "Z8Q4A4YI"; //Mã website tại VNPAY
                $vnp_HashSecret = "FUREHUTBLZNZUFHKOGNOXWPIVNWNCNCZ"; //Chuỗi bí mật
                // $vnp_HashSecret = "SBKILOMMRSKUSLHMVFYFATIDBLYKYDAU"; //Chuỗi bí mật
                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = route('detail_bill_auction',['id' => $bill->id_auction_book]);
                $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $request->input('amount')*100;
                $vnp_Locale = 'vn';
                $vnp_IpAddr = request()->ip();

                $inputData = array(
                    "vnp_Version" => "2.0.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                );


                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";

                // dd($inputData);

                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . $key . "=" . $value;
                    } else {
                        $hashdata .= $key . "=" . $value;
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                    $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                }

                // $return_url         =route('d.bill',['id' => $bill->id]);
                // $receiver           ="0986699482";
                // $transaction_info   ="Mua_hang_tai_website";
                // $order_code         =strtotime("now");
                // $amount             =1;
                // $customer_mobile    ="0983666999";
                // $websiteid          ="637";
                // $secret_key         ="NguyenThanhTrung68";
                // $vtcpay_url         ="http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html";
                // $vnp_Url = $this->buildCheckoutUrl($return_url,$receiver,$transaction_info,$order_code,$amount,
                // $customer_mobile,$websiteid,$secret_key,$vtcpay_url,'PaymentType:Visa;Direct:Master');
                //////////////////////////////////////////////////////////////
                // $cart = Cart::content();
                // $cart2 = Cart::subtotal(0,',','');
                // bỏ dấu chấm đê đúng giá tiền ra
                // dd($code);
                // $bill->id_account = Auth::user()->id;
                // $bill->id_payment  = 2;

                // $bill->bill_total = $cart2;

                // $bill->bill_name  = $request->name;
                // $bill->bill_phone  = $request->phone;
                // $bill->bill_address  = $request->address;
                // $bill->bill_note  = $request->note;

                // $code= "BILL-00000".$bill->id;
                // $bill->bill_code = $code;
                // $bill->save();

                $bill->bill_auction_code = "BILL_AUCTION-00".$bill->id;
                $bill->bill_auction_price = $request->amount;
                $bill->bill_auction_name =  $request->name;
                $bill->bill_auction_phone = $request->phone;
                $bill->bill_auction_address	 = $request->address;
                if($request->note){
                    $bill->bill_auction_note	 = $request->note;
                }
                $bill->id_payment 	 = 2;
                $bill->id_status  	 = 3;
                $bill->id_account  	 = Auth::user()->id;
                $bill->id_auction_book  	 = $request->id_book_auction;

                $bill->save();
                Toastr::success('Thanh toán sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
                return redirect($vnp_Url);


            }

            elseif($request->tt == 1)
            {

                // bỏ dấu chấm đê đúng giá tiền ra
                // $bill->id_account = Auth::user()->id;
                // dd($request->tt);
                // die;
                $bill->bill_auction_code = "BILL_AUCTION-00".$bill->id;
                $bill->bill_auction_price = $request->amount;
                $bill->bill_auction_name =  $request->name;
                $bill->bill_auction_phone = $request->phone;
                $bill->bill_auction_address	 = $request->address;
                if($request->note){
                    $bill->bill_auction_note = $request->note;
                }
                $bill->id_payment 	 = 1;
                $bill->id_status  	 = 3;
                $bill->id_account  	 = Auth::user()->id;
                $bill->id_auction_book = $request->id_book_auction;
                $bill->save();



                Toastr::success('Thanh toán sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
                return redirect()->route('detail_bill_auction',['id' => $bill->id_auction_book]);
            }

        } else {
            // Không tìm thấy


                    $bill = new bill;
                $bill->save();
                if($request->tt == 2)
                {
                    session(['cost_id' => $request->id]);
                    session(['url_prev' => url()->previous()]);
                    // $vnp_TmnCode = "VVULVOU2"; //Mã website tại VNPAY
                    $vnp_TmnCode = "Z8Q4A4YI"; //Mã website tại VNPAY
                    $vnp_HashSecret = "FUREHUTBLZNZUFHKOGNOXWPIVNWNCNCZ"; //Chuỗi bí mật
                    // $vnp_HashSecret = "SBKILOMMRSKUSLHMVFYFATIDBLYKYDAU"; //Chuỗi bí mật
                    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = route('d.bill',['id' => $bill->id]);
                    $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $request->input('amount')*100;
                    $vnp_Locale = 'vn';
                    $vnp_IpAddr = request()->ip();

                    $inputData = array(
                        "vnp_Version" => "2.0.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                    );


                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";

                    // dd($inputData);

                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . $key . "=" . $value;
                        } else {
                            $hashdata .= $key . "=" . $value;
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                    // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                    }

                    // $return_url         =route('d.bill',['id' => $bill->id]);
                    // $receiver           ="0986699482";
                    // $transaction_info   ="Mua_hang_tai_website";
                    // $order_code         =strtotime("now");
                    // $amount             =1;
                    // $customer_mobile    ="0983666999";
                    // $websiteid          ="637";
                    // $secret_key         ="NguyenThanhTrung68";
                    // $vtcpay_url         ="http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html";
                    // $vnp_Url = $this->buildCheckoutUrl($return_url,$receiver,$transaction_info,$order_code,$amount,
                    // $customer_mobile,$websiteid,$secret_key,$vtcpay_url,'PaymentType:Visa;Direct:Master');
                    //////////////////////////////////////////////////////////////
                    $cart = Cart::content();
                    $cart2 = Cart::subtotal(0,',','');
                    // bỏ dấu chấm đê đúng giá tiền ra
                    // dd($code);
                    $bill->id_account = Auth::user()->id;
                    $bill->id_payment  = 2;

                    $bill->bill_total = $cart2;

                    $bill->bill_name  = $request->name;
                    $bill->bill_phone  = $request->phone;
                    $bill->bill_address  = $request->address;
                    $bill->bill_note  = $request->note;

                    $code= "BILL-00000".$bill->id;
                    $bill->bill_code = $code;
                    $bill->save();

                    if(count($cart)>0){
                        // $cart2 = Cart::total(0,',','.');

                        foreach($cart as $key => $sp){
                            $detail = new detail_bill;
                            $detail->id_bill = $bill->id;
                            $detail->id_book = $sp->id;
                            $detail->qty = $sp->qty;
                            $detail->id_nguoiban = $sp->options->nguoiban;
                            $detail->id_status = $sp->options->trangthai;

                            $detail->save();
                        }
                    }


                    Cart::destroy();
                    Toastr::success('Đặt hàng thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
                    return redirect($vnp_Url);


                }

                elseif($request->tt == 1)
                {
                    // echo 'hihi';
                    // die;
                    $cart = Cart::content();
                    $cart2 = Cart::subtotal(0,',','');
                    // bỏ dấu chấm đê đúng giá tiền ra
                    $bill->id_account = Auth::user()->id;

                $bill->id_payment  = 1;

                    $bill->bill_total = $cart2;
                    $bill->bill_name  = $request->name;
                    $bill->bill_phone  = $request->phone;
                    $bill->bill_address  = $request->address;
                    $bill->bill_note  = $request->note;

                    $code= "BILL-00000".$bill->id;
                    $bill->bill_code = $code;
                    $bill->save();

                    if(count($cart)>0){
                        // dd($cart);
                        // $cart2 = Cart::total(0,',','.');
                        foreach($cart as $key => $sp){
                            $detail = new detail_bill;
                            $detail->id_bill = $bill->id;
                            $detail->id_book = $sp->id;
                            $detail->qty = $sp->qty;
                            $detail->id_nguoiban = $sp->options->nguoiban;
                            $detail->id_status = $sp->options->trangthai;



                            $detail->save();
                        }
                    }


                    Cart::destroy();
                    Toastr::success('Đặt hàng thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('d.bill',['id' => $bill->id]);
                }
            }
        // dd($url);



    }



    //admin
    public function list()
	{
		$bill = bill::all();
		return view('admin.hoa-don.list',['bill'=>$bill]);
	}

	///page
	public function page_bill()
	{
		$user = Auth::user()->id;
		$list = bill::where('id_nguoidung','=',$user)->get();
		return view('page.user.don-hang',['list'=>$list]);
	}



	public function detail_bill($id)
	{

		$bill = bill::find($id);


		return view('page.account.detail_bill',['bill'=>$bill]);
	}



    public function status5($id)
    {
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
       $data = detail_bill::where('id',$id)->update(['id_status'=>4]);
        //var_dump($data);die;
        // Session::put('msg','')
        Toastr::info('Xác nhận đơn hàng', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }

    public function status6($id)
    {
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = detail_bill::where('id',$id)->update(['id_status'=>5]);
        //var_dump($data);die;
        // Session::put('msg','')
        Toastr::info('Đơn hàng đang vận chuyển', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }

    public function status7($id)
    {
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = detail_bill::where('id',$id)->update(['id_status'=>7]);
        //var_dump($data);die;
        // Session::put('msg','')
        Toastr::info('Giao hàng thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }

    public function status8($id)
    {
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = detail_bill::where('id',$id)->update(['id_status'=>8]);
        //var_dump($data);die;
        // Session::put('msg','')
        Toastr::error('Đơn hàng đã hủy', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

}
