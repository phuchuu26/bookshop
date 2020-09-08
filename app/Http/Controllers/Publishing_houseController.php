<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publishing_house;
use Toastr;

class Publishing_houseController extends Controller
{
    public function publishinghouse()
    {
        $publishinghouse = Publishing_house::all();
        return view('admin.publishing_house.list',['publishinghouse'=>$publishinghouse]);
    }

    public function add()
    {
        return view('admin.publishing_house.add');
    }

    public function post_add(Request $publishinghouse2){
        $this->validate($publishinghouse2,[
            'name' => 'required|min:2|max:32|unique:Publishing_house,Publishinghouse_name',

        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',
        ]);
        
        $publishinghouse = new Publishing_house;
        $publishinghouse->publishinghouse_name= $publishinghouse2->name;

       
        $publishinghouse->save();
        
        Toastr::success('Thêm nhà xuất bản thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('pbh.list').'');
    }

    public function edit($id){
        $publishinghouse = Publishing_house::find($id);
        return view('admin.publishing_house.edit',['publishinghouse'=>$publishinghouse]);
    }
    public function post_edit(Request $publishinghouse2,$id){
        $this->validate($publishinghouse2,[
            'name' => 'required|min:2|max:32|unique:Publishing_house,Publishinghouse_name',

        ],[
            'name.required' => 'Bạn chưa nhập tên !',
            'name.unique' => 'Tên đã tồn tại !',
        ]);

        $publishinghouse = Publishing_house::find($id);
        $publishinghouse->publishinghouse_name= $publishinghouse2->name;


        $publishinghouse->save();

        Toastr::info('Sữa nhà xuất bản thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);


        return redirect(''.route('pbh.list').'');

    }



    public function delete($id){
        $publishinghouse = Publishing_house::destroy($id);

        Toastr::warning('Đã xóa nhà xuất bản', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
