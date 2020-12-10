<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member_vip;
use App\User;
use Toastr;
use Response;

class Member_vipController extends Controller
{
    public function index(){
        $type_members = Member_vip::all();
        // dd($type_member);
        return view('admin.member_vip.index',compact('type_members'));
    }

    public function getData(){
        $type_members = Member_vip::all();
        // dd($type_member);
        return response()->json(array('success' => true, 'data' => $type_members));
        // return view('admin.member_vip.index',compact('type_members'));
    }

    public function add(Request $request){
        $this->validate($request,[
            'price' =>'required|min:2|max:15',


        ],[

            'price.required' => 'Bạn chưa nhập mật khẩu !',
            'price.min' => 'Mật khẩu phải có it nhât 6 ký tự !',
            'price.max' => 'Mật khẩu chỉ được tối đa 32 ký tự !',
            'price.required' => 'Bạn chưa nhập lại mật khẩu !',
            'price.same' => 'Nhập lại mật khẩu không trùng khớp !'
        ]);

        return view('admin.member_vip.index',compact('type_members'));
    }
    public function edit(Request $request){
        // $this->validate($request,[
        //     'price' =>'required|min:2|max:15',

        // ],[

        //     'price.required' => 'Bạn chưa nhập mật khẩu !',
        //     'price.min' => 'Mật khẩu phải có it nhât 6 ký tự !',
        //     'price.max' => 'Mật khẩu chỉ được tối đa 32 ký tự !',
        //     'price.required' => 'Bạn chưa nhập lại mật khẩu !',
        //     'price.same' => 'Nhập lại mật khẩu không trùng khớp !'
        // ]);
        // dd($request->member_vip_price);
        // die;
            $id_member_vip = $request->id_member_vip;
            $data = Member_vip::where('member_vip_id', $id_member_vip) ->update([
                'member_type_number_posts_per_day' => $request->number_posts,
                'member_vip_note' => $request->info,
                'member_vip_price' => preg_replace("/[^0-9]/", '',  $request->price)
            ]);
            // $data->member_vip_price = $request->price;

            Toastr::info('Sữa loại tài khoản thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
            // dd($data);


        return redirect()->back();
    }
 // quan ly tai khoaan vip- thuong : khach hangf
    public function account_management(){

    }
    public function listUser(){
        $accounts = User::get();
        // dd($account);
        return view('admin.user-profile.list',compact('accounts'));

    }
    // xóa tài khoản
    public function delete(Request $request){
        $id = $request->id;
        // $user = User::findorFail($id);
        $deleteUser =  User::destroy($id);
        // dd($user);
        // die;
        // return view('admin.user-profile.list',compact('accounts'));
        return Response::json([
            'delete' => true,
        ], 200);
    }
    public function view_user_profile($id){
        $user = User::findorFail($id);
        return view('admin.user-profile.view_user_profile',compact('user'));
    }


}
