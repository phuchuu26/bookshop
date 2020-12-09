<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\info;

Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use Toastr;

use App\Models\bill;
use App\Models\detail_bill;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Routing\UrlGenerator;


class TaikhoanController extends Controller
{
	public function login()
    {
        if(!Auth::check())
        {
            return view('page.login.login-reg');
        }
        else
        {
            return redirect(''.Route('act.home').'');
            /// rediect thay vì route để kiêm tra user đã đăng nhập chưa vào act.home đã có sẳn rùi nên mới route dc

        }

    }



    public function post_reg(Request $reg)
    {
        $this->validate($reg,[
            'phone' =>'required|max:12',
            'name' =>'required|min:2|max:15',
            'lastname' =>'required|min:2|max:10',
            'username' =>'required|min:3|max:15|unique:account,username',
            'email' => 'required|email|max:32|unique:info,info_email',
            'password' => 'required|min:3|max:50',
            'confirmpassword' => 'required|same:password',

        ],[

            'phone.required' => 'Bạn chưa nhập số điện thoại !',
            'phone.max' => 'Số điện thoại không được hơn 10 số !',

            'name.required' => 'Bạn chưa nhập tên !',
            'name.min' => 'Tên tối thiếu 2 ký tự !',
            'name.max' => 'Tên tối đa 15 ký tự !',

            'lastname.required' => 'Bạn chưa nhập Họ !',
            'lastname.min' => 'Họ tối thiếu 2 ký tự !',
            'lastname.max' => 'Họ tối đa 10 ký tự !',

            'username.required' => 'Bạn chưa nhập tên đăng nhập !',
            'username.min' => 'Tên đăng nhập tối thiểu 4 ký tự trở lên !',
            'username.max' => 'Tên đăng nhập không được vượt hơn 15 ký tự !',
            'username.unique' => 'Tên đăng nhập đã tồn tại !',


            'email.required' => 'Bạn chưa nhập Email !',
            'email.email' => 'Định dạng Email chưa đúng vd: @gmail.com !',
            'email.max' => 'Email không được vượt hơn 32 ký tự !',
            'email.unique' => 'Email đã tồn tại !',


            'password.required' => 'Bạn chưa nhập mật khẩu !',
            'password.min' => 'Mật khẩu phải có it nhât 6 ký tự !',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự !',
            'confirmpassword.required' => 'Bạn chưa nhập lại mật khẩu !',
            'confirmpassword.same' => 'Nhập lại mật khẩu không trùng khớp !'
        ]);

        $account = new User;
        if($account)
        {
            $account->username = $reg->username;
            $account->password = bcrypt($reg->password);
            $account->level = '2';
            $account->status = '1';



            // echo $account; die;

            $account->save();

        }
            $links = "KH00000000".$account->id;
            $account->link =  $links;
            $account->save();

            // info
            $user = new info;
            $user->info_name = $reg->name;
            $user->info_lastname = $reg->lastname;
            $user->info_email = $reg->email;
            $user->info_phone = $reg->phone;
            //
            $user->id_account = $account->id;
            // echo $user; die;
            $user->save();





        Toastr::success('Đăng ký thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);







        return redirect(''.Route('p.login').'')->with('reg','Chúc mừng bạn đã đăng ký thành công');
    }

    public function post_lg(Request $lg)
    {
    	$this->validate($lg,[
            'username' => 'required',
            'password' =>'required|min:3|max:32',

        ],[
            'username.required' => 'Bạn chưa nhập tài khoản !',
            'password.required' => 'Bạn chưa nhập mật khẩu !',
        ]);

        $username =  $lg->username;
        $password = $lg->password;
        // echo $lg->username;
        // echo $lg->password;
        // die;


        if(Auth::attempt(['username'=>$username,'password'=>$password]))
            if(Auth::user()->status == 1)
            {
                    Toastr::success('Hi '.Auth::user()->info->info_name.' '.Auth::user()->info->info_lastname.'', 'Welcome', ["positionClass" => "toast-top-right"]);
                    return redirect(''.Route('act.home').'');


            }
            else
            {
                return redirect()->back()->with('disable','Tài khoản bạn đã bị khóa !');
            }
        else
             return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại');
            //echo "Not OK";
    }

    public function logout()
    {
        Auth::logout();
        return redirect(''.Route('p.login').'');
    }

/////////////////////////////////////////////////////////
    public function myacount()
    {
        $province = Province::all();
        $district = District::all();
        $ward = Ward::all();

        $bill = bill::where('id_account','=',Auth::user()->id)->get();
        $bill2 = bill::where('id_account','=',Auth::user()->id)->get();




        return view('page.account.dashboard',['bill2' => $bill2, 'bill' => $bill, 'province' => $province, 'district' => $district, 'ward' => $ward]);



    }

    // protected $url;
    // public function __construct(UrlGenerator $url)
    // {
    //     $this->url = $url;
    // }

    public function ajax_district($id_province)
    {

        // $this->url->to('/');
        // dd($this);
        $quanhuyen = District::where('province_id',$id_province)->get();
        foreach($quanhuyen as $dt)
        {
             echo "<option value='".$dt->id."'>".$dt->district_name."</option>";
            // kiểm tra xem nó showw ra đúng không Ntkd@@/ajax/loainho/id(vd: 1 2 3 4)
        }
    }

    public function ajax_ward($id_ward)
    {
        $phuongxa = Ward::where('district_id',$id_ward)->get();
        foreach($phuongxa as $wd)
        {
             echo "<option value='".$wd->id."'>".$wd->ward_name."</option>";
            // kiểm tra xem nó showw ra đúng không Ntkd@@/ajax/loainho/id(vd: 1 2 3 4)
        }
    }


// ////////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {
        $user = User::find($id);
        return view('page.user.edit',['user'=>$user]);
    }

    public function post_edit($id, Request $tk)
    {
        $this->validate($tk,[
            'hoten' => 'required|min:2|max:32',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',



        ],[
            'email.required' => 'Bạn chưa nhập Email !',
            'email.email' => 'Định dạng Email chưa đúng vd: @gmail.com !',
            'email.max' => 'Email không được vượt hơn 50 ký tự !',
            // 'email.unique' => 'Email đã được đăng ký !',


            'phone.required' => 'Số điện thoại chưa nhập !',
            'phone.min' => 'Số điện thoại phải đủ 10 số !',
            'phone.max' => 'Số điện thoại không quá 10 số !',

            'hoten.required' => 'Bạn chưa nhập tên !',
            'hoten.min' => 'Tên tối thiểu 2 ký tự trở lên !',
            'hoten.max' => 'Tên không được vượt hơn 32 ký tự !',



        ]);

            $user = User::find($id);
             $user->name = $tk->hoten;
             $user->email = $tk->email;
             $user->dia_chi = $tk->diachi;
             $user->ngay_sinh = $tk->ngaysinh;


             $user->phone = $tk->phone;

             $oldPassword = $tk->oldpassword;
                $newPassword = $tk->password;


            if($tk->changepassword == "on")
            {
             // <!-- sư dụng Auth thay vì $user vì Auth mạnh hơn -->
                if(Auth::user()->vai_tro == 1)
                {
                    $this->validate($tk,[
                        'password' => 'required|min:3|max:32',
                        'passwordAgain' => 'required|same:password'
                    ],[
                        'password.required' => 'Bạn chưa nhập mật khẩu',
                        'password.min' => 'Mật khẩu phải có it nhât 3 ký tự',
                        'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
                        'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                        'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
                    ]);

                    $user->password= bcrypt($newPassword);

                }
                else
                {
                    //nhớ phải !, hàm
                    if(!Hash::check($oldPassword, Auth::user()->password))
                    {
                        return redirect()->back()->with('oldpw','Mật khẩu không khớp với mật khẩu hiện tại');
                    }
                    else
                    {
                        $this->validate($tk,[
                            'password' => 'required|min:3|max:32',
                            'passwordAgain' => 'required|same:password'
                        ],[
                            'password.required' => 'Bạn chưa nhập mật khẩu',
                            'password.min' => 'Mật khẩu phải có it nhât 3 ký tự',
                            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
                            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                            'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
                        ]);

                        $user->password= bcrypt($newPassword);
                    }
                }
            }

             $user->save();
             return redirect()->bacK()->with('tintucxoa','Bạn đã xóa thành công...!');
    }

    // public function list()
    // {
    //     $loaisanpham = User::all();
    //     return view('admin.user.list',['loaisanpham' => $loaisanpham]);
    // }

}
