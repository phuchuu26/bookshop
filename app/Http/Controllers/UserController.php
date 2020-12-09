<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    // xem giao dien sua thong tin khach hang
    public function editProfile(){
        return view('admin.user-profile.profile_user');
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
}
