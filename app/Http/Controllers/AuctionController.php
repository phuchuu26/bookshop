<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomValidationRequest;
use App\Rules\Numeric;
// use Validator;
use App\Models\Category;
use App\Models\Endtime_auction;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\sub_category;
Use Illuminate\Support\Facades\Auth;
use App\Models\book;
use App\Models\Auction_book;
use App\Models\author;
use App\Models\Image_auction;
use App\Models\book_company;
use App\Models\Gold_time_frame;
use App\Models\Detail_gold_time_frame;
use App\Models\publishing_house;
use App\User;
use Toastr;
use File;
use Storage;
class AuctionController extends Controller
{

    public function index(){
        // cách để gọi method của controller khác
        // app(\App\Http\Controllers\Admin\AuctionController::class)->duyet(31);

        // $date1 = Endtime_auction::latest()->first();
        $a = Carbon::now();
        // $a = 2020-09-26 11:12:35.590428 Asia/Ho_Chi_Minh (+07:00)
        // sản phẩm hiện tại đang được đấu giá
        $sp  = DB::table('endtime_auction')
        ->where('Endtime_auction_date','>',$a)
        ->first();
        // $a =time($a);
        if($sp){

            $current_date_time = strtotime("$sp->Endtime_auction_date");
        }else{
            $current_date_time =strtotime("$a");
            // $current_date_time += 120;
        }
        //sản phẩm vừa đấu giá xong:
        $sptruoc = DB::table('endtime_auction')
        ->where('Endtime_auction_date','<',$a)
        ->get()
        ->last();
        // $a = strtotime("$a");
        // echo Carbon::now('Asia/Ho_Chi_Minh');
        // dd($timestampAuction);
        // dd($sptruoc);
        // die;
        // $date = $date1->Endtime_auction_date;
        // $h = $date1->Endtime_auction_hour;
        // $m = $date1->Endtime_auction_minute;
        // $s = $date1->Endtime_auction_second;
        // $current_date_time = strtotime("$date" ) * 1000;
        // $current_date_time += $h * 60 * 60;
        // $current_date_time += $m * 60;
        // $current_date_time += $s ;
        // $current_date_time = strtotime("$date $h:$m:$s" ) ;
        // $a =time();
        // $b = date($a);
        // $date = Carbon::createFromTimestamp($a)->format('d/m/Y H:m:s');
        // dd($date);
        // die;
        // $date = strtotime($date);
        // $h = strtotime($h);
        // $date =
        // $category = Category::all();
        // return view('admin.category.list',['category'=>$category]);
        return view('page.auction.index',compact('date','h','m','s','current_date_time'));
        // return view('page.auction.index',['category'=>$category]);
    }

    public function addAuctionBook(){
        $category = category::all();

    	$author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();
        $goldtime = Gold_time_frame::all();
        // dd($goldtime);
        return view('admin_cus.auction.index',['goldtime' => $goldtime , 'author'=>$author, 'category'=>$category, 'publishinghouse'=>$publishinghouse, 'account'=>$account, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }

    // store

    // |dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
    public function store(Request $book2){
        // CustomValidationRequest $req
        // $data = Array();
        // $b =0;
        // $data = $book2->goldtimeframe;
        // foreach($data  as $a){
        //     $b += $a;
        // };
        // dd($b);
        // die;
        // $req->validate([
        //     'idbookcompany' => [ new Numeric],
        // ]);
            // $this->validate($req,[
            //     'idbookcompany' => new Uppercase,
            // ]
            // [
            //     'idbookcompany.required' => 'banj chuwa nhap npp',
            // ]
        // );
            // die;
        $this->validate($book2,[
            'bookname' => 'required|min:2',
            // 'book_image' => 'required',
            'book_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'mota' => 'required|min:2',
            'weight' => 'required',
            'reserve_price' => 'required',
            'numberpage' => 'required',
            'releasedate' => 'required',
            'amount' => 'required',
            'idauthor' => 'required|integer',
            'idpublishinghouse' => 'required|integer',
            'idsubcategory' => 'required|integer',
            'idcategory' => 'required|integer',
            'idbookcompany' => 'required|integer',
         ],[
             'bookname.required' => 'Bạn chưa nhập tên !',
             'bookname.min' => 'Bạn nhập chưa đủ 2 ký tự !',
             'book_image.required' => 'Bạn chưa nhập ảnh bìa !',
             'book_image.image' => 'File phải là hình ảnh !',
             'book_image.max' => 'Dung lượng file phải dưới 2MB !',
             'book_image.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG !',

             'mota.required' => 'Bạn chưa nhập mô tả sách !',
             'mota.min' => 'Bạn nhập mô tả sách chưa đủ 2 ký tự !',
             'weight.required' => 'Bạn chưa nhập khối lượng sách !',
             'reserve_price.required' => 'Bạn chưa nhập giá khởi điểm !',
             'numberpage.required' => 'Bạn chưa nhập số trang sách !',
             'releasedate.required' => 'Bạn chưa nhập năm phát hành sách đấu giá !',
             'amount.required' => 'Bạn chưa số lượng sách đấu giá !',
             'idauthor.integer' => 'Bạn chưa chọn tác giả sách !',
             'idpublishinghouse.integer' => 'Bạn chưa chọn nhà xuất bản sách !',
             'idsubcategory.integer' => 'Bạn chưa chọn thể loại sách !',
             'idcategory.integer' => 'Bạn chưa chọn danh mục sách !',
             'idbookcompany.integer' => 'Bạn chưa chọn nhà phân phối sách !',
         ]);
         $book = new auction_book;

         $book->auction_book_title = $book2->bookname;

         $book->auction_book_quantity = $book2->amount;

         $book->auction_book_description = $book2->mota;

         $book->auction_book_numberpage = $book2->numberpage;

         $book->auction_book_weight = $book2->weight;

         $book->auction_book_releasedate = $book2->releasedate;

         $book->auction_book_status = 'Chưa duyệt';
         $tien = preg_replace("/[^0-9]/", '',  $book2->reserve_price);

         $book->auction_book_reserve_price = $tien;


         // Khóa ngoại
         $book->id_author = $book2->idauthor;

         $book->id_subcategory = $book2->idsubcategory;

         $book->id_publishinghouse = $book2->idpublishinghouse;

         $book->id_bookcompany = $book2->idbookcompany;

         $book->id_account = Auth::user()->id;

        //  if($book2->time == 1){
        //     $value = $book2->value_time;
        //     $value = $value * 60;
        // }  else if($book2->time == 3){
        //     $value = $book2->value_time;
        //     $value = $value * 60*24;
        // }
        // else{
        //     $value = $book2->value_time;
        // }
        // $book->auction_book_time = $value;
        // $book ->auction_book_time = $book2->value_time;

        // $book ->auction_book_time_type = $book2->time;
        if($book2->loaithoigian == 0 ){
            $book ->auction_book_time_type = 'Giờ';
            $book ->auction_book_time =  $book2->valuetime0;
        }else{
            $book ->auction_book_time_type = 'Phút';
            $book ->auction_book_time =  $book2->valuetime1;
        }

         if($book2->hasFile('book_image'))
        {
            $file = $book2->file('book_image');

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(5)."_".$name;

            // echo $hinh_anh;die;
            while(file_exists('public/upload/products/'.$hinh_anh))
            {
                 $hinh_anh = str_random(4)."_".$name;
            }
             // echo $name; die;
            $file->move('public/upload/products/',$hinh_anh);
            $book->auction_book_image = $hinh_anh;
        }
        $book->save();

        // for($i=1; $i<10; $i++){
            if($book2->goldtimeframe){
                // dd($book2->goldtimeframe.$i.'---'.$i);
                foreach( $book2->goldtimeframe as $goldtime){

                    $timetmp = new Detail_gold_time_frame;
                    $timetmp->id_gold_time_frame = $goldtime;
                    $timetmp->id_auction_book  = $book->id;
                    $timetmp->save();
                }
            }
        // }


        if($book2->hasFile('book_image1'))
        {

            $file1 = $book2->file('book_image1');
                $image_sp = new Image_auction;

                if(isset($file1))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image1' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image1.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image1.image' => 'File phải là hình ảnh !',
                         'book_image1.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image1.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file1->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file1->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }
        if($book2->hasFile('book_image2'))
        {

            $file2 = $book2->file('book_image2');
                $image_sp = new Image_auction;

                if(isset($file2))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image2' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image2.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image2.image' => 'File phải là hình ảnh !',
                         'book_image2.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image2.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file2->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file2->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }


        if($book2->hasFile('book_image3'))
        {

            $file3 = $book2->file('book_image3');
                $image_sp = new Image_auction;

                if(isset($file3))
                {
                    $image_sp->id_auction_book  = $book->id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image3' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image3.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image3.image' => 'File phải là hình ảnh !',
                         'book_image3.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image3.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file3->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file3->move('public/upload/detail',$hinh_anh );
                    $image_sp->image_auction_name  = $hinh_anh;
                    $image_sp->save();


                }

        }

        Toastr::success('Thêm sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('add_auctionBook').'');

    }
    public function management(){
        $list = Auction_book::where('id_account','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(10);

        return view('admin_cus.auction.management',compact('list'));
    }
    public function delete($id){
        $author = Auction_book::destroy($id);
        // $deposit =DB::table('auction_book')->where('',$id)->delete();

        Toastr::warning('Đã xóa sách đấu giá', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function edit($id){
        $auction_book = Auction_book::find($id);
        // $upload_dir = asset('public/upload/products/');
        // dd($upload_dir);
        // $image_sp = DB::table('image_auction')
        // ->where('id_auction_book',$id)
        // ->get();
        $image_sp =Image_auction::where('id_auction_book',$id)->get();
        // $image_sp1 = $image_sp.length();
        $count = count($image_sp);
        // dd($count);
        $category = category::all();

    	$author = author::all();
        $bookcompany = book_company::all();
        $publishinghouse = publishing_house::all();
        $account = User::all();
        $category = category::all();
        $subcategory = sub_category::all();
        $goldtimeframe = Gold_time_frame::all();
        $goldtimeframeChecked = Detail_gold_time_frame::where('id_auction_book',$id)->get()->toArray();
        // dd($goldtimeframeChecked[0]['id_auction_book']);
        // dd($goldtimeframeChecked);
        $danhsach =  Array();
        foreach($goldtimeframeChecked as $a){
            array_push($danhsach, $a['id_gold_time_frame']  );
        }
        // dd($danhsach);
        return view('admin_cus.auction.edit',['danhsach' =>$danhsach,'goldtimeframe' => $goldtimeframe ,'count' =>$count ,'image_sp'=>$image_sp , 'auction_book'=>$auction_book , 'author'=>$author, 'category'=>$category,
        'publishinghouse'=>$publishinghouse, 'account'=>$account, 'subcategory'=>$subcategory, 'bookcompany'=>$bookcompany]);
    }



    public function update(Request $book2,$id){
        $this->validate($book2,[
            'bookname' => 'required|min:2',
            // 'book_image' => 'required',
            // 'book_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'mota' => 'required|min:2',
            'weight' => 'required',
            'reserve_price' => 'required',
            'numberpage' => 'required',
            'releasedate' => 'required',
            'amount' => 'required',
            'idauthor' => 'required|integer',
            'idpublishinghouse' => 'required|integer',
            'idsubcategory' => 'required|integer',
            'idcategory' => 'required|integer',
            'idbookcompany' => 'required|integer',
         ],[
             'bookname.required' => 'Bạn chưa nhập tên !',
             'bookname.min' => 'Bạn nhập chưa đủ 2 ký tự !',
            //  'book_image.required' => 'Bạn chưa nhập ảnh bìa !',
            //  'book_image.image' => 'File phải là hình ảnh !',
            //  'book_image.max' => 'Dung lượng file phải dưới 2MB !',
            //  'book_image.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG !',

             'mota.required' => 'Bạn chưa nhập mô tả sách !',
             'mota.min' => 'Bạn nhập mô tả sách chưa đủ 2 ký tự !',
             'weight.required' => 'Bạn chưa nhập khối lượng sách !',
             'reserve_price.required' => 'Bạn chưa nhập giá khởi điểm !',
             'numberpage.required' => 'Bạn chưa nhập số trang sách !',
             'releasedate.required' => 'Bạn chưa nhập năm phát hành sách đấu giá !',
             'amount.required' => 'Bạn chưa số lượng sách đấu giá !',
             'idauthor.integer' => 'Bạn chưa chọn tác giả sách !',
             'idpublishinghouse.integer' => 'Bạn chưa chọn nhà xuất bản sách !',
             'idsubcategory.integer' => 'Bạn chưa chọn thể loại sách !',
             'idcategory.integer' => 'Bạn chưa chọn danh mục sách !',
             'idbookcompany.integer' => 'Bạn chưa chọn nhà phân phối sách !',
         ]);
        //  $book = new auction_book;
        $book = Auction_book::find($id);
        // $book3 = $book->id;

         $book->auction_book_title = $book2->bookname;

         $book->auction_book_quantity = $book2->amount;

         $book->auction_book_description = $book2->mota;

         $book->auction_book_numberpage = $book2->numberpage;

         $book->auction_book_weight = $book2->weight;

         $book->auction_book_releasedate = $book2->releasedate;

         $book->auction_book_status = 'Chưa duyệt';
         $tien = preg_replace("/[^0-9]/", '',  $book2->reserve_price);

         $book->auction_book_reserve_price = $tien;


         // Khóa ngoại
         $book->id_author = $book2->idauthor;

         $book->id_subcategory = $book2->idsubcategory;

         $book->id_publishinghouse = $book2->idpublishinghouse;

         $book->id_bookcompany = $book2->idbookcompany;

         $book->id_account = Auth::user()->id;

        //  if($book2->time == 1){
        //     $value = $book2->value_time;
        //     $value = $value * 60;
        // }  else if($book2->time == 3){
        //     $value = $book2->value_time;
        //     $value = $value * 60*24;
        // }
        // else{
        //     $value = $book2->value_time;
        // }
        // $book->auction_book_time = $value;
        $book ->auction_book_time = $book2->value_time;
        $book ->auction_book_time_type = $book2->time;

         if($book2->hasFile('book_image'))
        {
            $this->validate($book2,[
                'book_image' => 'required',
                'book_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
             ],[
                 'book_image.required' => 'Bạn chưa nhập ảnh bìa !',
                 'book_image.image' => 'File phải là hình ảnh !',
                 'book_image.max' => 'Dung lượng file phải dưới 2MB !',
                 'book_image.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG !',


             ]);
                // xoa file rac
                $upload_dir1 = asset('public/upload/products/');
                // $upload_dir = "./../../../public/upload/products/";
                $old_file = $upload_dir1.'/'.$book['auction_book_image'];
                // dd($old_file );
                // dd($book->auction_book_image);
                // die;
                if(File::exists('public/upload/products/'.$book->auction_book_image)) {
                    File::delete('public/upload/products/'.$book->auction_book_image);
                    // ko dung dc: Storage::delete('public/upload/products/'.$book->auction_book_image);
                    //  dung dc :  unlink('public/upload/products/'.$book->auction_book_image);
                // else{
                // }
                }

            $file = $book2->file('book_image');

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(5)."_".$name;

            // echo $hinh_anh;die;
            while(file_exists('public/upload/products/'.$hinh_anh))
            {
                 $hinh_anh = str_random(4)."_".$name;
            }
             // echo $name; die;
            $file->move('public/upload/products/',$hinh_anh);
            $book->auction_book_image = $hinh_anh;


        }
        $book->save();


        // chỉnh sửa các ảnh có liên quan của Image Auction:
        $image_auction = Image_auction::where('id_auction_book',$id)->get();
        // dd($image_auction[0]);
        // die;
        if($book2->hasFile('book_image1'))
        {
            $file1 = $book2->file('book_image1');
            if(isset($file1))
            {
                // xoa file rac
                // $upload_dir1 = asset('public/upload/products/');
                // $upload_dir = "./../../../public/upload/products/";
                // $old_file = $upload_dir1.'/'.$book['auction_book_image'];
                // dd($old_file );
                // dd($book->auction_book_image);
                // die;
                if(count($image_auction)==1){

                    if(File::exists('public/upload/detail/'.$image_auction[0]->image_auction_name)) {
                        File::delete('public/upload/detail/'.$image_auction[0]->image_auction_name);
                        // ko dung dc: Storage::delete('public/upload/products/'.$book->auction_book_image);
                        //  dung dc :  unlink('public/upload/products/'.$book->auction_book_image);
                        // else{
                            // }
                        }
                    }

                $image_sp1 = Image_auction::where('image_auction_id',$image_auction[0]->image_auction_id)->first();

                    // $image_sp1 = $image_auction[0];
                    // dd($image_sp1);
                    //   die;
                    // $image_sp1->id_auction_book  = $id;
                    // $image_sp1->image_auction_id  = $image_sp1->image_auction_id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image1' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image1.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image1.image' => 'File phải là hình ảnh !',
                         'book_image1.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image1.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file1->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail/'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file1->move('public/upload/detail/',$hinh_anh );
                    // $image_sp1->image_auction_name  = $hinh_anh;
                    if(count($image_auction)==1){

                        Image_auction::where('image_auction_id',$image_auction[0]->image_auction_id)
                        ->update(
                            ['image_auction_name' => $hinh_anh]
                        );
                    }
                    else{
                        $anhbia3 = new Image_auction;
                        $anhbia3->image_auction_name =$hinh_anh;
                        $anhbia3->id_auction_book  =$id ;
                        $anhbia3->save();
                    }
                    // $image_sp1->save();


                }

        }  // chỉnh sửa các ảnh có liên quan của Image Auction:
        // $image_auction = Image_auction::where('id_auction_book',$id)->get();
        // dd($image_auction[0]);
        // die;
        if($book2->hasFile('book_image2'))
        {

            $file1 = $book2->file('book_image2');

            if(isset($file1))
            {
                // xoa file rac
                // $upload_dir1 = asset('public/upload/products/');
                // $upload_dir = "./../../../public/upload/products/";
                // $old_file = $upload_dir1.'/'.$book['auction_book_image'];
                // dd($old_file );
                // dd($book->auction_book_image);
                // die;
                if(count($image_auction)==2){

                    if(File::exists('public/upload/detail/'.$image_auction[1]->image_auction_name)) {
                        File::delete('public/upload/detail/'.$image_auction[1]->image_auction_name);
                        // ko dung dc: Storage::delete('public/upload/products/'.$book->auction_book_image);
                        //  dung dc :  unlink('public/upload/products/'.$book->auction_book_image);
                        // else{
                            // }
                        }
                    }

                // $image_sp1 = Image_auction::where('image_auction_id',$image_auction[1]->image_auction_id)->first();

                    // $image_sp1 = $image_auction[0];
                    // dd($image_sp1);
                    //   die;
                    // $image_sp1->id_auction_book  = $id;
                    // $image_sp1->image_auction_id  = $image_sp1->image_auction_id;

                    $this->validate($book2,[
                        // 'book_image' => 'required',
                        'book_image2' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                     ],[
                         'book_image2.required' => 'Bạn chưa nhập ảnh bìa !',
                         'book_image2.image' => 'File phải là hình ảnh !',
                         'book_image2.max' => 'Dung lượng file phải dưới 2MB !',
                         'book_image2.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                     ]);

                    $name = $file1->getClientOriginalName();
                    $hinh_anh = str_random(5)."_".$name;

                    // echo $hinh_anh;die;
                    while(file_exists('public/upload/detail/'.$hinh_anh))
                    {
                         $hinh_anh = str_random(4)."_".$name;
                    }
                     // echo $name; die;
                    $file1->move('public/upload/detail/',$hinh_anh );
                    // $image_sp1->image_auction_name  = $hinh_anh;
                    if(count($image_auction)==2){

                        Image_auction::where('image_auction_id',$image_auction[1]->image_auction_id)
                        ->update(
                            ['image_auction_name' => $hinh_anh]
                        );
                        // $image_sp1->save();
                    }
                    else{
                        $anhbia3 = new Image_auction;
                        $anhbia3->image_auction_name =$hinh_anh;
                        $anhbia3->id_auction_book  =$id ;
                        $anhbia3->save();
                    }


                }

        }
          // chỉnh sửa các ảnh có liên quan của Image Auction:
        //   $image_auction = Image_auction::where('id_auction_book',$id)->get();
          // dd($image_auction[0]);
          // die;
          if($book2->hasFile('book_image3'))
          {


              $file1 = $book2->file('book_image3');

              if(isset($file1))
              {
                  // xoa file rac
                  // $upload_dir1 = asset('public/upload/products/');
                  // $upload_dir = "./../../../public/upload/products/";
                  // $old_file = $upload_dir1.'/'.$book['auction_book_image'];
                  // dd($old_file );
                  // dd($book->auction_book_image);
                  // die;
                if(count($image_auction)==3){

                    if(File::exists('public/upload/detail/'.$image_auction[2]->image_auction_name)) {
                        File::delete('public/upload/detail/'.$image_auction[2]->image_auction_name);
                        // ko dung dc: Storage::delete('public/upload/products/'.$book->auction_book_image);
                        //  dung dc :  unlink('public/upload/products/'.$book->auction_book_image);
                        // else{
                            // }
                        }
                    }

                //   $image_sp1 = Image_auction::where('image_auction_id',$image_auction[2]->image_auction_id)->first();

                      // $image_sp1 = $image_auction[0];
                      // dd($image_sp1);
                      //   die;
                      // $image_sp1->id_auction_book  = $id;
                      // $image_sp1->image_auction_id  = $image_sp1->image_auction_id;

                      $this->validate($book2,[
                          // 'book_image' => 'required',
                          'book_image3' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                       ],[
                           'book_image3.required' => 'Bạn chưa nhập ảnh bìa !',
                           'book_image3.image' => 'File phải là hình ảnh !',
                           'book_image3.max' => 'Dung lượng file phải dưới 2MB !',
                           'book_image3.mimes' => 'Bạn phải nhập đúng định dạng file JPG, JPEG, PNG ở ảnh thứ 2!',


                       ]);

                      $name = $file1->getClientOriginalName();
                      $hinh_anh = str_random(5)."_".$name;

                      // echo $hinh_anh;die;
                      while(file_exists('public/upload/detail/'.$hinh_anh))
                      {
                           $hinh_anh = str_random(4)."_".$name;
                      }
                       // echo $name; die;
                      $file1->move('public/upload/detail/',$hinh_anh);
                      // $image_sp1->image_auction_name  = $hinh_anh;

                    if(count($image_auction)==3){

                        Image_auction::where('image_auction_id',$image_auction[2]->image_auction_id)
                        ->update(
                            ['image_auction_name' => $hinh_anh]
                        );
                    }
                    else{
                        $anhbia3 = new Image_auction;
                        $anhbia3->image_auction_name =$hinh_anh;
                        $anhbia3->id_auction_book  =$id ;
                        $anhbia3->save();
                    }
                      // $image_sp1->save();
                  }

          }

        Toastr::success('Cập nhật sách đấu giá thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);

        return redirect(''.route('auction.management').'');

    }
}
