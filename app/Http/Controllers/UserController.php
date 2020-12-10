<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Info;
use App\Models\Delivery;
use App\Models\Member_vip;
use Illuminate\Support\Facades\Hash;
use Toastr;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    // xem giao dien sua thong tin khach hang
    public function editProfile(){
        $tinhs = Province::orderBy('province_name','ASC')->get();
        $huyens = District::all();
        $xas = Ward::all();
        $members = Member_vip::all();
        return view('admin.user-profile.profile_user',compact('tinhs','huyens','xas','members'));
    }

    public function updateAvatar(Request $request,$id){
        // $hinh_anh = 'avatar.png';
        // dd(file_exists('public/storage/users-avatar/'.$hinh_anh));
        // dd($request->all());
        // die;

        $user = User::findorFail(Auth::user()->id);
        // dd($request->hasFile('avatar'));
        // die;
        $this->validate($request,[

            // 'book_image' => 'required',
            'avatar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
         ],[
             'avatar.required' => 'Bạn chưa nhập ảnh bìa !',
             'avatar.image' => 'File phải là hình ảnh !',
             'avatar.max' => 'Dung lượng file phải dưới 2MB !',
             'avatar.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG !',
         ]);

        if($request->hasFile('avatar'))
        {
            // dd($user);

            $file2 = $request->file('avatar');

                if(isset($file2))
                {
                    if(Auth::user()->avatar != 'avatar.png'){

                        if($user->avatar){
                            unlink('public/storage/users-avatar/'.$user->avatar);
                        }
                    }

                    $name = $file2->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/storage/users-avatar/'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file2->move('public/storage/users-avatar',$hinh_anh );


                    $user->avatar  = $hinh_anh;
                    $user->save();

                }

        }
        return back()->withInput();
    }

    public function updateProfile(Request $request,$id){
        $user = User::findorFail($id);
        $info_user = Info::where('id_account',$id)->first();
        $delivery_user = Delivery::where('id_account',$id)->first();

        if($request->lastname){
            $info_user->info_lastname = $request->lastname;
        }
        if($request->name){
            $info_user->info_name = $request->name;
        }
        if($request->gender){
            $info_user->info_gender = $request->gender;
        }
        if($request->birth){
            $info_user->info_birth = date("Y-m-d", strtotime($request->birth));
        }
        if($request->telephone){
            $info_user->info_phone = $request->telephone;
        }

        // bang delivery :
        // echo 'do';
        if(!$delivery_user){
            // echo 'do';
            $delivery_user = new Delivery;
            $delivery_user->delivery_name = $info_user->info_lastname. ' '.$info_user->info_name;
            $delivery_user->id_account = $id;
        }
        if($request->telephone){
            $delivery_user->delivery_telephone = $request->telephone;
        }
        if($request->address){
            $delivery_user->delivery_address = $request->address;
        }
        if($request->province){
            $delivery_user->delivery_provice = $request->province;
        }
        if($request->ward){
            $delivery_user->delivery_ward = $request->ward;
        }
        if($request->district){
            $delivery_user->delivery_district = $request->district;
        }

        $info_user->save();
        $delivery_user->save();

        return back()->withInput();
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'current_password' => ['required'],
            'confirm_password' => ['same:current_password'],
        ],[


            'old_password.required' => 'Bạn chưa nhập Mật khẩu cũ !',
            'current_password.required' => 'Bạn chưa nhập Mật khẩu mới !',
            'confirm_password.same' => 'Nhập lại mật khẩu mới không khớp !',


        ]);


        $user = User::find(Auth::User()->id);
        if(Hash::check($request->old_password, $user->password)){
            // $user->password = Hash::make($request->current_password) ;
            $user->password = bcrypt($request->current_password) ;
            $user->save();

            Toastr::success('Cập nhật nhậu mật khẩu thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }else{
            Toastr::error('Cập nhật nhậu mật khẩu thất bại', 'Thông báo', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
    public function regVip(Request $request){
        $user = User::findorFail(Auth::User()->id);
        $memberVIP = Member_vip::all();
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456
                session(['cost_id' => $request->id]);
                session(['url_prev' => url()->previous()]);
                // $vnp_TmnCode = "VVULVOU2"; //Mã website tại VNPAY
                $vnp_TmnCode = "Z8Q4A4YI"; //Mã website tại VNPAY
                $vnp_HashSecret = "FUREHUTBLZNZUFHKOGNOXWPIVNWNCNCZ"; //Chuỗi bí mật
                // $vnp_HashSecret = "SBKILOMMRSKUSLHMVFYFATIDBLYKYDAU"; //Chuỗi bí mật

                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

                $vnp_Returnurl = route('checkPayment');
                // $vnp_Returnurl = route('editProfile');
                $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = "Thanh toán hóa đơn đăng ký khách hàng VIP";
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $memberVIP[0]->member_vip_price*100;
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



                // Toastr::success('Thanh toán sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
                // $this->return();
                return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        // dd($request->all());
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            // $this->apSer->thanhtoanonline(session('cost_id'));
            $user = User::findorFail(Auth::User()->id);
            $user->id_member_vip = 1;
            $user->save();
            Toastr::success('Thanh toán sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
            return redirect()->route('editProfile');
        }
        session()->forget('url_prev');
        Toastr::error('Thanh toán sách đấu giá không thành công do lỗi trong quá trình thanh toán phí dịch vụ', 'Thông báo', ["positionClass" => "toast-top-right"]);
        return redirect()->route('editProfile');
    }

}
