<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Toastr;

class CategoryController extends Controller
{
     public function category()
    {
        $category = Category::all();
        return view('admin.category.list',['category'=>$category]);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function post_add(Request $category2){
        $this->validate($category2,[
            'name' => 'required|min:2|max:32|unique:category,category_name',
            
        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',

        ]);
        
        $category = new Category;
        $category->category_name= $category2->name;

       
        $category->save();
        
        Toastr::success('Thêm danh mục thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('ctg.list').'');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }
    public function post_edit(Request $category2,$id){
        $this->validate($category2,[
            'name' => 'required|min:2|max:32|unique:category,category_name',

                        
        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',
            
           
        ]);

        $category = Category::find($id);
        $category->category_name= $category2->name;


        $category->save();

        Toastr::info('Sữa danh mục thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);


        return redirect(''.route('ctg.list').'');

    }



    public function delete($id){
        $category = Category::destroy($id);

        Toastr::warning('Đã xóa danh mục', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
