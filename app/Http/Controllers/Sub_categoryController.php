<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\sub_category;
use App\Models\category;
use DB;
use Toastr;

class Sub_categoryController extends Controller
{
     public function sub_category()
    {
        $subcategory = sub_category::paginate(10);
        // $pa = DB::table('sub_category')
        // ->paginate(8);
        // dd($subcategory);
        // $pa = Sub_category::;
        return view('admin.sub_category.list',['subcategory'=>$subcategory]);
    }

    public function add()
    {
    	$category = category::all();
        return view('admin.sub_category.add',['category' => $category]);
    }

    public function post_add(Request $subcategory2){
        $this->validate($subcategory2,[
            'idcategory' => 'required',
            'name' => 'required|min:2|max:55',

        ],[
            'idcategory.required' => 'Bạn chưa chọn danh mục !',
            'name.required' => 'Bạn chưa nhập tên !',
            'name.required' => 'Tên tối thiêu 2 ký tự trở lên !',
            'name.required' => 'Tên tối đa 15 ký tự !',




        ]);

        $subcategory = new sub_category;
        $subcategory->subcategory_name = $subcategory2->name;
        $subcategory->id_category = $subcategory2->idcategory;



        $subcategory->save();

        Toastr::success('Thêm danh mục thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('s.ctg.list').'');
    }

    public function edit($id){
        $category = category::all();
        $subcategory = sub_category::find($id);
        return view('admin.sub_category.edit',['subcategory'=>$subcategory, 'category'=>$category ]);
    }
    public function post_edit(Request $subcategory2,$id){
        $this->validate($subcategory2,[
            'idcategory' => 'required',
            'name' => 'required|min:2|max:55',

        ],[
            'idcategory.required' => 'Bạn chưa chọn danh mục !',
            'name.required' => 'Bạn chưa nhập tên !',
            'name.required' => 'Tên tối thiêu 2 ký tự trở lên !',
            'name.required' => 'Tên tối đa 15 ký tự !',




        ]);

        $subcategory = sub_category::find($id);
        $subcategory->subcategory_name= $subcategory2->name;
        $subcategory->id_category = $subcategory2->idcategory;



        $subcategory->save();

        Toastr::info('Sữa danh mục thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);


        return redirect(''.route('s.ctg.list').'');

    }



    public function delete($id){
        $subcategory = sub_category::destroy($id);

        Toastr::warning('Đã xóa danh mục', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
