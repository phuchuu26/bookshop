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
class UserController extends Controller
{
    // xem giao dien sua thong tin khach hang
    public function editProfile(){
        $tinhs = Province::orderBy('province_name','ASC')->get();
        $huyens = District::all();
        $xas = Ward::all();
        return view('admin.user-profile.profile_user',compact('tinhs','huyens','xas'));
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
            $info_user->info_birth = $request->birth;
        }

        // bang delivery :
        // echo 'do';
        if(!$delivery_user){
            echo 'do';
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
}
