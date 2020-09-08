<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book_company;
use Toastr;

class Book_companyController extends Controller
{
    public function bookcompany()
    {
        $bookcompany = Book_company::all();
        return view('admin.Book_company.list',['bookcompany'=>$bookcompany]);
    }

    public function add()
    {
        return view('admin.book_company.add');
    }

    public function post_add(Request $bookcompany2){
        $this->validate($bookcompany2,[
            'name' => 'required|min:2|max:32|unique:Book_company,Bookcompany_name',
            
        ],[
            'name.required' => 'Bạn chưa nhập tên !',

            'name.unique' => 'Tên đã tồn tại !',

        ]);
        
        $bookcompany = new Book_company;
        $bookcompany->bookcompany_name= $bookcompany2->name;

       
        $bookcompany->save();
        
        Toastr::success('Thêm nhà xuất bản thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('cby.list').'');
    }

    public function edit($id){
        $bookcompany = Book_company::find($id);
        return view('admin.book_company.edit',['bookcompany'=>$bookcompany]);
    }
    public function post_edit(Request $bookcompany2,$id){
        $this->validate($bookcompany2,[
           'name' => 'required|min:2|max:32|unique:Book_company,Bookcompany_name',
            
        ],[
            'name.required' => 'Bạn chưa nhập tên !',

            'name.unique' => 'Tên đã tồn tại !',

        ]);

        $bookcompany = Book_company::find($id);
        $bookcompany->bookcompany_name= $bookcompany2->name;


        $bookcompany->save();

        Toastr::info('Sữa nhà xuất bản thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);


        return redirect(''.route('cby.list').'');

    }



    public function delete($id){
        $bookcompany = Book_company::destroy($id);

        Toastr::warning('Đã xóa nhà xuất bản', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}