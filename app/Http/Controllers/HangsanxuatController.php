<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\hang_san_xuat;



class HangsanxuatController extends Controller
{
	 public function list(){

   
        $hangsanxuat = hang_san_xuat::all();
        return view('admin.hang-san-xuat.list',['hangsanxuat'=>$hangsanxuat]);
    }

    public function get_add(){
        return view('admin.hang-san-xuat.add');
    }

    // thêm sữa xóa loại bài
    public function post_add(Request $nhh){
        $this->validate($nhh,[
            'ten' => 'required|min:2|max:32',
            
        ],[
            'ten.required' => 'Bạn chưa nhập tiêu đề !',
            'ten.min' =>'Tên tiêu đề phải tối thiểu 2 ký tự !',
            'ten.max' =>'Tên tiêu đề phải tối đa 32 ký tự !',
        ]);
        
        $hangsanxuat = new hang_san_xuat;
        $hangsanxuat->ten_hang = $nhh->ten;

       
        $hangsanxuat->save();
        return redirect(''.route('sx1').'');
    }

    public function get_edit($id){
        $hangsanxuat = hang_san_xuat::find($id);
        return view('admin.hang-san-xuat.edit',['hangsanxuat'=>$hangsanxuat]);
    }
    public function post_edit(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required|min:5|max:32',
            
        ],[
            'ten.required' => 'Bạn chưa nhập tiêu đề !',
            'ten.min' =>'Tên tiêu đề phải tối thiểu 5 ký tự !',
            'ten.max' =>'Tên tiêu đề phải tối đa 32 ký tự !',
        ]);

        $hangsanxuat = hang_san_xuat::find($id);
        $hangsanxuat->ten_hang = $request->ten;


        $hangsanxuat->save();

        return redirect(''.route('sx1').'');

    }
    public function del($id){
        $hangsanxuat = hang_san_xuat::destroy($id);
        return redirect()->bacK()->with('thongbaoxoa','Bạn đã xóa thành công...!');
    }
    
}
