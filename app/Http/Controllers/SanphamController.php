<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\ct_san_pham;

use App\Models\loai_san_pham;
use App\Models\nha_cung_cap;
use App\Models\hang_san_xuat;

use App\Models\image_sp;


use Carbon\Carbon;

use Input;



class SanphamController extends Controller
{	

	public function list(){

		$sanpham = san_pham::orderBy('id', 'asc')->get();
		return view('admin.san-pham.list',['sanpham'=>$sanpham]); 

	}

	public function get_add(){

    	$loaisanpham = loai_san_pham::all();
    	$nhacungcap = nha_cung_cap::all();
    	$hangsanxuat = hang_san_xuat::all();

        return view('admin.san-pham.add',['loaisanpham'=>$loaisanpham,'nhacungcap'=>$nhacungcap, 'hangsanxuat'=>$hangsanxuat]);
    }


   public function post_add(Request $hh)
   {
	
   	$sanpham = new san_pham;

	if($sanpham){
		// khóa ngoại
		$sanpham->id_loai_sp = $hh->loaisanpham;
		$sanpham->id_nha_cc = $hh->nhacungcap;
		$sanpham->id_hang_sx = $hh->hangsanxuat;

		$sanpham->ten_sp = $hh->ten;
		    
		$sanpham->save();
	}

	$sanpham->ma_sanpham = "SP00".$sanpham->id; // phải để null vì nó save ở trên trước nên không để null nó chạy được
	$sanpham->save();

	$ct_sanpham = new ct_san_pham;
	// khóa ngoại
	$ct_sanpham->id_sanpham = $sanpham->id;

	$ct_sanpham->thong_so = $hh->thongso;
	$ct_sanpham->mo_ta = $hh->mota;
	$ct_sanpham->mo_ta_ngan = $hh->motangan;

	$ct_sanpham->gia_sp = $hh->gia;
	$ct_sanpham->gia_goc = $hh->giagoc;
	$ct_sanpham->so_luong = $hh->soluong;
	$ct_sanpham->trong_luong = '0';

	if($hh->hasFile('image'))
	    {
	        $file = $hh->file('image');

	        // echo $file;die;

	        // kiểm tra  size
	        $size = $file->getsize();
	        if($size > 1024*1024)
	        {
	            // echo "size quá lớn chọn lại";

	             return redirect(''.route('sp2').'')->with('size','size quá lớn chọn lại');
	        }
	        // echo "banhbao";die;

	        //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
	         $duoi_file = $file->getClientOriginalExtension();
	         //tạo 1 mang arr để sử dụng in_array so sanh
	         $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];
	         

	        if(!in_array($duoi_file, $arr_duoifile))
	        {
	            // echo "Đuôi file size xin mời định dạng lại";

	            return redirect(''.route('sp2').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
	        }
	        // echo "banhbao";die;

	        // radom tên hinh ảnh, để lấy ra không bị trùng
	        //,... getClientOriginalName() lấy ra tên
	        $name = $file->getClientOriginalName();
	        $hinh_anh = str_random(5)."_".$name;

	        // echo $hinh_anh;die;
	        while(file_exists('public/admin/upload/san-pham/'.$hinh_anh))
	        {
	             $hinh_anh = str_random(4)."_".$name;
	        }
	         // echo $name; die; 
	        $file->move('public/admin/upload/san-pham/',$hinh_anh);
	        $ct_sanpham->hinh_anh = $hinh_anh;
	       

	    }
	else
	    {
	        $ct_sanpham->hinh_anh = "";
	    }

	$ct_sanpham->save();


	if($hh->hasFile('image2'))
    {
    		
        foreach ($hh->file('image2') as $file2)
        {
			$image_sp = new image_sp;

			if(isset($file2))
			{
				$image_sp->id_imagesp = $sanpham->id;


		        // echo $file;die;

		        // kiểm tra  size
		        $size = $file2->getsize();
		        if($size > 1024*1024)
		        {
		            // echo "size quá lớn chọn lại";

		             return redirect(''.route('sp2').'')->with('size','size quá lớn chọn lại');
		        }
		        // echo "banhbao";die;

		        //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
		         $duoi_file = $file2->getClientOriginalExtension();
		         //tạo 1 mang arr để sử dụng in_array so sanh
		         $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];
		         

		        if(!in_array($duoi_file, $arr_duoifile))
		        {
		            // echo "Đuôi file size xin mời định dạng lại";

		            return redirect(''.route('sp2').'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
		        }
		        // echo "banhbao";die;

		        // radom tên hinh ảnh, để lấy ra không bị trùng
		        //,... getClientOriginalName() lấy ra tên
		        $name = $file2->getClientOriginalName();
		        $hinh_anh = str_random(5)."_".$name;

		        // echo $hinh_anh;die;
		        while(file_exists('public/admin/upload/detail-san-pham/'.$hinh_anh))
		        {
		             $hinh_anh = str_random(4)."_".$name;
		        }
		         // echo $name; die; 
		        $file2->move('public/admin/upload/detail-san-pham/',$hinh_anh);
		        $image_sp->hinh_anh = $hinh_anh;
		        $image_sp->save();
			}
			
	    }
    }
	else
    {
    	// echo "banhbao";die;
      $image_sp->hinh_anh = "";
    }
	






    return redirect(''.route('sp1').'');

    }

    public function get_edit($id){
    	$sanpham = san_pham::find($id);
    	$loaisanpham = loai_san_pham::all();
    	$nhacungcap = nha_cung_cap::all();
    	$hangsanxuat = hang_san_xuat::all();

        return view('admin.san-pham.edit',['nhacungcap'=>$nhacungcap, 'hangsanxuat'=>$hangsanxuat, 'loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
    }


    public function post_edit($id, Request $hh){

			$sanpham = san_pham::find($id);

			$ct_sanpham = ct_san_pham::find($id);


			$sanpham->id_loai_sp = $hh->loaisanpham;
			$sanpham->id_nha_cc = $hh->nhacungcap;
			$sanpham->id_hang_sx = $hh->hangsanxuat;

			$sanpham->ten_sp = $hh->ten;


				// khóa ngoại
				$ct_sanpham->thong_so = $hh->thongso;
				$ct_sanpham->mo_ta = $hh->mota;
				$ct_sanpham->mo_ta_ngan = $hh->motangan;

				$ct_sanpham->gia_sp = $hh->gia;
				$ct_sanpham->gia_goc = $hh->giagoc;
				$ct_sanpham->so_luong = $hh->soluong;
				$ct_sanpham->trong_luong = '0';


				if($hh->hasFile('image'))
				{
				    $file = $hh->file('image');

				    // echo $file;die;

				    // kiểm tra  size
				    $size = $file->getsize();
				    if($size > 1024*1024)
				    {
				        // echo "size quá lớn chọn lại";

				         return redirect(''.route('sp4',['id' => $id]).'')->with('size','size quá lớn chọn lại');
				    }
				    // echo "banhbao";die;

				    //kiểm tra đuôi, lấy ra đuôi file getClientOriginalExtension()
				     $duoi_file = $file->getClientOriginalExtension();
				     //tạo 1 mang arr để sử dụng in_array so sanh
				     $arr_duoifile = ['png','jpg','jpeg','PNG','JPG','JPEG'];
				     

				    if(!in_array($duoi_file, $arr_duoifile))
				    {
				        // echo "Đuôi file size xin mời định dạng lại";

				        return redirect(''.route('sp4',['id' => $id]).'')->with('duoi_file','Bạn chỉ được thêm file có đuôi là JPG, PNG, JPEG');
				    }
				    // echo "banhbao";die;

				    // radom tên hinh ảnh, để lấy ra không bị trùng
				    //,... getClientOriginalName() lấy ra tên
				    $name = $file->getClientOriginalName();
				    $hinh_anh = str_random(5)."_".$name;

				    // echo $hinh_anh;die;
				    while(file_exists('public/admin/upload/san-pham/'.$hinh_anh))
				    {
				         $hinh_anh = str_random(4)."_".$name;
				    }
				     // echo $name; die; 
				    $file->move('public/admin/upload/san-pham/',$hinh_anh);

				    if($ct_sanpham->hinh_anh){
				        unlink('public/admin/upload/san-pham/'.$ct_sanpham->hinh_anh);
				        $ct_sanpham->hinh_anh = $hinh_anh;
				    }
				    else
				    {   
				        $ct_sanpham->hinh_anh = $hinh_anh;
				    }

				    $ct_sanpham->hinh_anh = $hinh_anh;
				   
				}
			
			$sanpham->save(); // vì ko có cập nhât mã sản phẩm nên để save cuôi cùng cho khỏi bị lỗi nhiều
			$ct_sanpham->save();

			

			return redirect(''.route('sp1').'');

		}


		public function del($id)
    {
        // echo "đã xóa";die;
        $sanpham2 = san_pham::find($id); // phải gắn find trước nếu gắn destroy trước thì nó xóa trước ko thể find dc
        $san_pham = san_pham::destroy($id);
        if($sanpham2->hinh_anh){
            unlink('public/admin/upload/san-pham/'.$sanpham2->hinh_anh);
        }
        return redirect()->bacK()->with('thongbaoxoa','Bạn đã xóa thành công...!');
    }




    }






