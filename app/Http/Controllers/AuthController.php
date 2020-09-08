<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use Toastr;

class AuthController extends Controller
{
    

    public function author()

    {
        $author = Author::all();
        return view('admin.author.list',['author'=>$author]);
    }

    public function add()
    {
        return view('admin.author.add');
    }

    public function post_add(Request $author2){
        $this->validate($author2,[
            'name' => 'required|min:2|max:32|unique:Author,Author_name',
            
        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',

        ]);
        
        $author = new Author;
        $author->author_name= $author2->name;
        $author->author_info= $author2->note;


       
        $author->save();
        
        Toastr::success('Thêm tác giả thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('auth.list').'');
    }

    public function edit($id){
        $author = Author::find($id);
        return view('admin.author.edit',['author'=>$author]);
    }

    public function post_edit(Request $author2,$id){
        $this->validate($author2,[
           'name' => 'required|min:2|max:32|unique:Author,Author_name',
            
        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',

        ]);

        $author = Author::find($id);
        $author->author_name= $author2->name;
        $author->author_info= $author2->note;
        


        $author->save();

        Toastr::info('Sữa tác giả thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);


        return redirect(''.route('auth.list').'');

    }



    public function delete($id){
        $author = Author::destroy($id);

        Toastr::warning('Đã xóa tác giả', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
