<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;

use App\Models\hoa_don;
use App\Models\ct_hoa_don;



class DonhangController extends Controller
{
	//admin
    public function list()
	{
		$donhang = hoa_don::all();
		return view('admin.hoa-don.list',['donhang'=>$donhang]);
	}

	///page
	public function page_donhang()
	{
		$user = Auth::user()->id;
		$list = hoa_don::where('id_nguoidung','=',$user)->get();
		return view('page.user.don-hang',['list'=>$list]);
	}

	public function post_donhang(Request $dh)
	{	
        $cart = Cart::content();
        $cart2 = Cart::total(0,',',''); // bỏ dấu chấm đê đúng giá tiền ra

        // echo $cart2;die;


		$donhang = new hoa_don;
		if($donhang){
			$donhang->id_nguoidung = Auth::user()->id;

			$donhang->trang_thai = 0;
			$donhang->tong_tien = $cart2;

			$donhang->name_order  = $dh->name_order;
			$donhang->email_order  = $dh->email_order;
			$donhang->phone_order  = $dh->phone_order;
			$donhang->diachi_order  = $dh->diachi_order;


			$donhang->ngay_order = Carbon::now('Asia/Ho_Chi_Minh');
			$donhang->save();
        }
            $user_id = "HD00".$donhang->id;
            $donhang->ma_hoadon = $user_id;
            $donhang->save();



            if(count($cart)>0){
            	// $cart2 = Cart::total(0,',','.');
            	foreach($cart as $key => $sp){
	            	$ct_dh = new ct_hoa_don;
		            $ct_dh->id_hoadon = $donhang->id;
		            $ct_dh->id_sanpham = $sp->id;
		            $ct_dh->so_luong = $sp->qty;
	            	$ct_dh->save();	

            	}
            }

            Cart::destroy();
            return redirect(''.Route('donhang').'');
	}

	public function page_ct_hoa_don($id)
	{
		$list2 = hoa_don::find($id);

		return view('page.user.chi-tiet-don-hang',['list2'=>$list2]);
	}


	public function dat_don($id)
    {   
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = hoa_don::where('id',$id)->update(['trang_thai'=>0]);
        //var_dump($data);die;
        // Session::put('msg','')
        return redirect()->back();
        
    }

    public function xu_ly($id)
    {   
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = hoa_don::where('id',$id)->update(['trang_thai'=>1]);
        //var_dump($data);die;
        // Session::put('msg','')
        return redirect()->back();
        
    }

    public function van_chuyen($id)
    {   
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = hoa_don::where('id',$id)->update(['trang_thai'=>2]);
        //var_dump($data);die;
        // Session::put('msg','')
        return redirect()->back();
        
    }

    public function thanh_cong($id)
    {   
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = hoa_don::where('id',$id)->update(['trang_thai'=>3]);
        //var_dump($data);die;
        // Session::put('msg','')
        return redirect()->back();
        
    }

    public function Cancle($id)
    {   
       // tac_gia::where('id',$id)->update(['phe_duyet'=>1]);
       //  return redirect('/Ntkd@@/danh-sach-tac-gia');
        $data = hoa_don::where('id',$id)->update(['trang_thai'=>4]);
        //var_dump($data);die;
        // Session::put('msg','')
        return redirect()->back();
    }

	
}
