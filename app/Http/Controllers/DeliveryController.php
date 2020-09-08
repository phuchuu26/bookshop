<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Delivery;
use Toastr;


Use Illuminate\Support\Facades\Auth;



class deliveryController extends Controller
{
    public function delivery(Request $delivery2,$id)
    {
        
    		$delivery = Delivery::find(Auth::user()->id);
	        $delivery->delivery_name = $delivery2->name;
	        $delivery->delivery_telephone = $delivery2->phone;
	        $delivery->delivery_provice = $delivery2->province;
	        $delivery->delivery_district = $delivery2->district;
	        $delivery->delivery_ward = $delivery2->ward;
	        $delivery->delivery_address = $delivery2->address;
	        $delivery->id_account = Auth::user()->id;



        	$delivery->save();

        	Toastr::info('Cập nhật địa chỉ thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
        	return redirect()->back();

    }

    public function delivery2(Request $delivery2)
    {
        
    		$delivery = new Delivery;

        	// echo $delivery;die;
	        $delivery->delivery_name = $delivery2->name;
	        $delivery->delivery_telephone = $delivery2->phone;
	        $delivery->delivery_provice = $delivery2->province;
	        $delivery->delivery_district = $delivery2->district;
	        $delivery->delivery_ward = $delivery2->ward;
	        $delivery->delivery_address = $delivery2->address;
	        $delivery->id_account = Auth::user()->id;

        	// echo $delivery;die;


        	$delivery->save();

        	Toastr::info('Cập nhật địa chỉ thành công', 'Thông báo', ["positionClass" => "toast-top-right"]);
        	return redirect()->back();

    }
}
