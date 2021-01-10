<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\book;
use App\Models\category;
use App\Models\author;
use App\Models\book_company;
use App\Models\publishing_house;
use App\User;
use App\Models\sub_category;
Use Illuminate\Support\Facades\Auth;
use App\Models\Images;


use Toastr;


class BookController extends Controller
{

     public function book()
    {
        $book = book::where('id_account','=',Auth::user()->id)->paginate(10);
        $author = author::all();
        // $account = User::all();

        return view('admin.book.list_user',['book'=>$book, 'author'=>$author]);
    }

    public function admin_book()
    {
        $book = book::orderBy('created_at', 'DESC')->paginate(10);


        return view('admin.book.list',compact('book'));
    }

    public function add()
    {
    	$category = category::all();

    	$author = author::orderBy('author_name', 'ASC')->get();
        $bookcompany = book_company::orderBy('bookcompany_name', 'ASC')->get();
        // dd($bookcompany);
        $publishinghouse = publishing_house::orderBy('publishinghouse_name', 'ASC')->get();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();

        return view('admin.book.add',['author'=>$author, 'category'=>$category, 'publishinghouse'=>$publishinghouse, 'account'=>$account, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }

    public function post_add(Request $book2)
    {
        $this->validate($book2,[
           'bookname' => 'required|min:2',

        ],[
            'bookname.required' => 'Bạn chưa nhập tên !',


        ]);

        $book = new book;
        $book->book_title = $book2->bookname;

        $book->book_amount = $book2->amount;

        $book->book_description = $book2->mota;

        $book->book_price = $book2->price;

        $book->book_sale = $book2->sale;


        $book->book_numberpage = $book2->numberpage;

        $book->book_weight = $book2->weight;

        $book->book_releasedate = $book2->releasedate;

        $book->id_status = '1';




        // Khóa ngoại
        $book->id_author = $book2->idauthor;

        $book->id_subcategory = $book2->idsubcategory;


        $book->id_publishinghouse = $book2->idpublishinghouse;

        $book->id_bookcompany = $book2->idbookcompany;

        $book->id_account = Auth::user()->id;

        // Hình ảnh

        if($book2->hasFile('book_image'))
        {
            $file = $book2->file('book_image');

            // echo $file;die;

            // kiểm tra  size
            $size = $file->getsize();
            if($size > 1024*1024)
            {
                // echo "size quá lớn chọn lại";

                 return redirect(''.route('b.add').'')->with('size','size quá lớn chọn lại');
            }
            // echo "banhbao";die;

            //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
             $duoi_file = $file->getClientOriginalExtension();
             //tạo 1 mang arr để sử dụng in_array so sanh
             $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];


            if(!in_array($duoi_file, $arr_duoifile))
            {
                // echo "Đuôi file size xin mời định dạng lại";

                return redirect(''.route('b.add').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
            }
            // echo "banhbao";die;

            // radom tên hinh ảnh, để lấy ra không bị trùng
            //,... getClientOriginalName() lấy ra tên
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(5)."_".$name;

            // echo $hinh_anh;die;
            while(file_exists('public/upload/products/'.$hinh_anh))
            {
                 $hinh_anh = str_random(4)."_".$name;
            }
             // echo $name; die;
            $file->move('public/upload/products/',$hinh_anh);
            $book->book_image = $hinh_anh;


        }
        else
        {
            echo "Bạn chưa chọn ảnh bìa";die;
            $book->book_image = "";
        }

        $book->save();



        // ////////////////////////
        if($book2->hasFile('image2'))
        {

            foreach ($book2->file('image2') as $file2)
            {
                $image_sp = new Images;

                if(isset($file2))
                {
                    $image_sp->id_book = $book->id;


                    // echo $file;die;

                    // kiểm tra  size
                    $size = $file2->getsize();
                    if($size > 1024*1024)
                    {
                        // echo "size quá lớn chọn lại";

                         return redirect(''.route('b.add').'')->with('size','size quá lớn chọn lại');
                    }
                    // echo "banhbao";die;

                    //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
                     $duoi_file = $file2->getClientOriginalExtension();
                     //tạo 1 mang arr để sử dụng in_array so sanh
                     $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];


                    if(!in_array($duoi_file, $arr_duoifile))
                    {
                        // echo "Đuôi file size xin mời định dạng lại";

                        return redirect(''.route('b.add').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
                    }
                    // echo "banhbao";die;

                    // radom tên hinh ảnh, để lấy ra không bị trùng
                    //,... getClientOriginalName() lấy ra tên
                    $name = $file2->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file2->move('public/upload/detail',$hinh_anh );
                    $image_sp->images_book  = $hinh_anh;
                    $image_sp->save();


                }

            }
        }


        // ////////////////////////

        Toastr::success('Thêm sách thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('b.list').'');
    }

    public function edit($id){
        $book = book::find($id);

        $category = category::all();str_contains('This is my name', 'my');
        $author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();

        return view('admin.book.edit',['author'=>$author, 'category'=>$category, 'publishinghouse'=>$publishinghouse, 'book'=>$book, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }




    public function post_edit(Request $book2,$id){
        $this->validate($book2,[
           'bookname' => 'required|min:2|max:320',

        ],[
            'bookname.required' => 'Bạn chưa nhập tên !',


        ]);

        $book = book::find($id);
        $book3 = $book->id;


        $book->book_title = $book2->bookname;

        $book->book_description = $book2->mota;

        $book->book_price = $book2->price;

        $book->book_sale = $book2->sale;


        $book->book_numberpage = $book2->numberpage;

        $book->book_weight = $book2->weight;

        $book->book_releasedate = $book2->releasedate;

        $book->id_status = '1';




        // Khóa ngoại
        $book->id_author = $book2->idauthor;

        $book->id_subcategory = $book2->idsubcategory;


        $book->id_publishinghouse = $book2->idpublishinghouse;

        $book->id_bookcompany = $book2->idbookcompany;

        $book->id_account = Auth::user()->id;

        // ảnh bìa

        if($book2->hasFile('book_image'))
        {
            $file = $book2->file('book_image');

            // echo $file;die;

            // kiểm tra  size
            $size = $file->getsize();
            if($size > 1024*1024)
            {
                // echo "size quá lớn chọn lại";

                 return redirect(''.route('b.edit').'')->with('size','size quá lớn chọn lại');
            }
            // echo "banhbao";die;

            //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
             $duoi_file = $file->getClientOriginalExtension();
             //tạo 1 mang arr để sử dụng in_array so sanh
             $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];


            if(!in_array($duoi_file, $arr_duoifile))
            {
                // echo "Đuôi file size xin mời định dạng lại";

                return redirect(''.route('b.edit').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
            }
            // echo "banhbao";die;

            // radom tên hinh ảnh, để lấy ra không bị trùng
            //,... getClientOriginalName() lấy ra tên
            $name = $file->getClientOriginalName();
            $hinh_anh = $name;

            // echo $hinh_anh;die;
            while(file_exists('public/upload/products/'.$hinh_anh))
            {
                 $hinh_anh = $name;
            }
             // echo $name; die;
            $file->move('public/upload/products/',$hinh_anh);

            if($book->book_image){
                unlink('public/upload/products/'.$book->book_image);
                $book->book_image = $hinh_anh;

            }
            else
            {
                echo "BanhBao";die;

                $book->book_image = $hinh_anh;
            }

            $book->book_image = $hinh_anh;
        }

        $book->save();

        // // echo $book;die;
        // $sach = Images::find($id);
        // // $sach2 = $sach->id;
        // echo $sach;die;


       // sữa nhiêu ảnh chưa làm được
        ////////////////////////
        // if($book2->hasFile('image2'))
        // {

        //     foreach ($book2->file('image2') as $file2)
        //     {

        //         if(isset($file2))
        //         {
        //             // $sach->id_book = $book3;
        //             // kiểm tra  size
        //             $size = $file2->getsize();
        //             if($size > 1024*1024)
        //             {
        //                 // echo "size quá lớn chọn lại";
        //                  return redirect(''.route('b.add').'')->with('size','size quá lớn chọn lại');
        //             }
        //             // echo "banhbao";die;
        //             //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
        //              $duoi_file = $file2->getClientOriginalExtension();
        //              //tạo 1 mang arr để sử dụng in_array so sanh
        //              $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];

        //             if(!in_array($duoi_file, $arr_duoifile))
        //             {
        //                 // echo "Đuôi file size xin mời định dạng lại";
        //                 return redirect(''.route('b.add').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
        //             }
        //             // echo "banhbao";die;
        //             // radom tên hinh ảnh, để lấy ra không bị trùng
        //             //,... getClientOriginalName() lấy ra tên
        //             $name = $file2->getClientOriginalName();
        //             $hinh_anh = str_random(5)."_".$name;

        //             // echo $hinh_anh;die;
        //             while(file_exists('public/upload/detail'.$hinh_anh))
        //             {
        //                  $hinh_anh = str_random(4)."_".$name;
        //             }
        //              // echo $name; die;
        //             $file2->move('public/upload/detail',$hinh_anh );
        //             unlink('public/upload/detail'.$sach->images_book);
        //                 $sach->images_book = $hinh_anh;

        //         }
        //         else
        //         {
        //             echo "BanhBao";die;
        //             $book->book_image = $hinh_anh;
        //         }

        //     }

        //     echo $sach ;die;
        //     $sach->save();


        // }


        ////////////////////////






        Toastr::info('Sữa sách thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('b.list').'');
    }


    public function delete($id){
        $book = book::destroy($id);

        Toastr::warning('Đã xóa danh mục', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }


    public function get_subcategory($id_category)
    {
        $theloai = sub_category::where('id_category',$id_category)->get();
        foreach($theloai as $sctg)
        {
             echo "<option value='".$sctg->id."'>".$sctg->subcategory_name."</option>";
            // kiểm tra xem nó showw ra đúng không Ntkd@@/ajax/loainho/id(vd: 1 2 3 4)
        }
    }

}
