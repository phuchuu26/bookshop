<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;

    use App\Models\bill;
    use App\Models\detail_bill;

use App\Models\payment;


use Toastr;

// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456


class BillController extends Controller
{


    public function post_bill(Request $request)
    {
        $bill = new bill;
        $bill->save();
        if($request->vnpay)
        {
            session(['cost_id' => $request->id]);
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "VVULVOU2"; //Mã website tại VNPAY
            $vnp_HashSecret = "SBKILOMMRSKUSLHMVFYFATIDBLYKYDAU"; //Chuỗi bí mật
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

        elseif($request->tienmat)
        {
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
