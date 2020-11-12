<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use App\User;

use Carbon\Carbon; // lấy ngày hiên tại

use App\Models\role;

use App\Models\category;

use App\Models\status;

use App\Models\payment;









// Route::get('/', function () {
// 	return view('welcome');
// });
// Route::get('/1', function () {
// 	Schema::create('hang_san_xuat', function ( $table) {
//             $table->increments('id');

//             $table->string('ten_hang');



//         });
// });


// Route::get('/2', function () {
// 	Schema::create('image_sps', function ( $table) {
//             $table->increments('id');
//             $table->string('hinh_anh');

//             $table->integer('id_imagesp')->unsigned();

//             $table->foreign('id_imagesp')
//                     ->references('id')
//                     ->on('ct_san_phams')
//                     ->onDelete('cascade');



//         });
// });

// tài khoản
Route::post('/tim-kiem','TimkiemController@post_search')->name('timkiem');

Route::post('/dang-ky','TaikhoanController@post_reg')->name('p.reg');

// Route::get('/dang-ky','TaikhoanController@reg')->name('reg');


Route::get('/dang-nhap','TaikhoanController@login')->name('p.login');

Route::post('/dang-nhap','TaikhoanController@post_lg')->name('postlogin');

Route::get('/dang-xuat','TaikhoanController@logout')->name('p.logout');


Route::group(['prefix'=>'tai-khoan','middleware'=>'Ad_login'],function(){

	Route::get('/','TaikhoanController@myacount')->middleware('Ad_login')->name('act.home');


	//ajax
 	Route::get('/quan-huyen/{id_province}','TaikhoanController@ajax_district')-> name('test');
 	Route::get('/phuong-xa/{id_ward}','TaikhoanController@ajax_ward')-> name('test1') ;


	Route::post('/don-hang','BillController@post_bill')->name('p.bill');
	Route::get('/chi-tiet-don-hang-{id}','BillController@detail_bill')->name('d.bill');



	Route::get('/chinh-sua-thong-tin-{id}','TaikhoanController@edit')->name('edit1');
	Route::post('/chinh-sua-thong-tin-{id}','TaikhoanController@post_edit')->name('edit2');


	Route::post('/dia-chi','DeliveryController@delivery2')->name('delivery2');
	Route::post('/dia-chi-{id}','DeliveryController@delivery')->name('delivery');





});

// xử lý trang thái đơn hàng

Route::get('/xac-nhan-{id}','BillController@status5')->name('status4');
Route::get('/giao-hang-{id}','BillController@status6')->name('status5');
Route::get('/thanh-cong-{id}','BillController@status7')->name('status7');
Route::get('/huy-don-{id}','BillController@status8')->name('status8');

// page


Route::get('/','PageController@home');
Route::get('/trang-chu','PageController@home')->name('p.home');
Route::get('/shopuser-{id}','PageController@shopuser')->name('shopuser');
Route::get('/trend','PageController@trend')->name('trend');

Route::group(['prefix' => 'gio-hang'],function(){

	Route::get('/','CartController@cart')->name('cart');

	Route::get('/them-san-pham-{id}','CartController@addCart')->name('addcart');
	Route::get('/cap-nhat-san-pham','CartController@update')->name('updatecart');
	Route::get('/xoa-san-pham-{id}','CartController@delCart')->name('delcart');

	Route::get('/checkout','CartController@checkout')->name('checkout');


});
//chart
// phan admin
Route::group(['prefix' => 'statistic','middleware'=>'CheckAdmin'],function(){

    Route::get('/bill','StatisticController@bill')->name('statistic_bill');
    Route::get('/bill/data','StatisticController@billdata')->name('statistic_bill_data');
    Route::get('/sale','StatisticController@sale')->name('statistic_sale');
    Route::get('/sale/data','StatisticController@saledata')->name('statistic_sale_data');

    Route::get('/quantity','StatisticController@quantity')->name('quantity');
    Route::get('/quantity/category','StatisticController@quantitycategory')->name('quantity_category');
    Route::get('/quantity/company','StatisticController@quantitycompany')->name('quantity_company');
    Route::get('/quantity/nxb','StatisticController@quantitynxb')->name('quantity_nxb');
    Route::get('/quantity/author','StatisticController@quantityauthor')->name('quantity_author');

    // sp ban chay
    Route::get('/product','StatisticController@product')->name('quantity_product');
    Route::get('/product/data','StatisticController@productdata')->name('quantity_product_data');



});
// Route::get('/pusher', function() {
    //     event(new App\Events\HelloPusherEvent('Hi there Pusher!'));
    //     return "da thuc thi nha";
    // });

    // Route::get('/test','StatisticController@countmess')->name('getcount');
    Route::get('/test/{id}','StatisticController@countmess1')->name('getcount');
Route::get('/COUNTMESS','StatisticController@countmess')->name('countmess');
//phan thong ke thanh vien
Route::group(['prefix'=>'statistic','middleware'=>'CheckCustomer'],function(){
    //don hang
    Route::get('/bill_cus','StatisticController@bill_cus')->name('statistic_bill_cus');
    Route::get('/bill_cus/data','StatisticController@billdata_cus')->name('statistic_bill_data_cus');

    //doanh thu
    Route::get('/sale_cus','StatisticController@salecus')->name('statistic_sale_cus');
    Route::get('/sale_cus/data','StatisticController@saledatacus')->name('statistic_sale_data_cus');
    // so luong san pham
    Route::get('/quantity/cus','StatisticController@quantitycus')->name('quantity_cus');
    Route::get('/quantity/category/cus','StatisticController@quantitycategorycus')->name('quantity_category_cus');
    Route::get('/quantity/company/cus','StatisticController@quantitycompanycus')->name('quantity_company_cus');
    Route::get('/quantity/nxb/cus','StatisticController@quantitynxbcus')->name('quantity_nxb_cus');
    Route::get('/quantity/author/cus','StatisticController@quantityauthorcus')->name('quantity_author_cus');
});
// Route::get('/san-pham','PageController@show_sanpham')->name('show_sp'); // show layout không xài group dc


Route::get('/the-loai-{id}','PageController@book_subcategory')->name('p.subcategory');
Route::get('/category-{id}','PageController@category')->name('category'); // show layout không xài group dc
Route::get('/nhang-cap-{id}','PageController@show_nhacungcap')->name('show_ncc'); // show layout không xài group dc
Route::get('/hang-san-xuat-{id}','PageController@show_hangsanxuat')->name('show_hsx'); // show layout không xài group dc
Route::get('/san-pham/chi-tiet-san-pham-{id}','PageController@book_detail')->name('b.detail');
   //Viết coment
   Route::post('write_comment/{id}', 'PageController@write_cmt')
   ->name('write_cmt');

   Route::group(['prefix' => 'display'], function ()
                    {


                        // Route::get('feedback', function (){
                        //     return view('pages.admin.khachhang.feedback');
                        // });
                        //logo
                        // Route::get('logo', 'Admin\DisplayController@logo')
                        //     ->name('logo');
                        // Route::post('logo', 'Admin\DisplayController@storelogo')
                        //     ->name('logo.submit');
                        //banner
                        // Route::get('banner', 'Admin\DisplayController@logo')->name('banner');
                        // Route::get('banner', function ()
                        // {
                        //     return view('pages.admin.display.banner');
                        // })
                        //     ->name('banner');
                        // Route::post('banner/{id}', 'Admin\DisplayController@update')
                        //     ->name('banner.submit');
                    });

                    // quan ly đấu giá khach hang
                    // 'middleware'=>'CheckCustomer'
                    Route::get('auction/index','AuctionController@index')->name('auction_index');
                    Route::group(['prefix'=>'auction','middleware'=>'Ad_login'],function(){
                        //hien thi page client
                        // Route::get('/chatify','MessagesController@index');
                        // dau gia:
                        Route::post('/create/{id}', 'AuctionController@store')
                        ->name('auction.create.submit');
                        Route::post('/post/auction', 'AuctionController@post_auction')
                        ->name('post.auction');


                        // page admin
                        // quan ly  dau gia
                        Route::get('/management', 'AuctionController@management')
                        ->name('auction.management');
                        // xem danh sách những người đã đấu giá cho sản phẩm của mình
                        Route::get('/seenListBidder/{id}', 'AuctionController@seenListBidder')
                        ->name('seenListBidder');
                        // danh sách đã thực hiện hành động đấu giá
                        Route::get('/auctionedListing', 'AuctionController@auctionedListing')
                        ->name('auctionedListing');
                        //xoa
                        Route::get('/detele_auction/{id}','AuctionController@delete')->name('delete_auction');
                        // sua
                        Route::get('/edit_auction/{id}','AuctionController@edit')->name('edit_auction');
                        Route::post('/update_auction/{id}','AuctionController@update')->name('update_auction');

                        //them
                        Route::get('/index_cus','AuctionController@addAuctionBook')->name('add_auctionBook');
                        Route::post('/index_cus/store','AuctionController@store')->name('store_auction_book');

                        // kết thúc thười gian cho phép thanh toán sách đấu giá nhưng khách hàng không chịu thanh toán: chuyển attr ở bảng auction_book
                        // sang người trả giá cáo thứ hai .(dùng ajax)
                        Route::post('/endDurationAuction/{id}','AuctionController@endDurationAuction')->name('endDurationAuction');


                    });



//////////////////////////////////////////////////// admin
Route::get('/endAuction/{id}','Admin\AuctionController@endAuction')->name('endAuction');

Route::group(['prefix'=>'quan-tri','middleware'=>'Ad_login'],function(){         // ,'middleware'=>'Ad_login'
	Route::get('/','AdminController@home')->name('ad.home');

		Route::group(['prefix'=>'tac-gia'],function(){

			Route::get('/','AuthController@author')->name('auth.list');
			Route::get('/them-tac-gia','AuthController@add')->name('auth.add');
			Route::post('/them-tac-gia','AuthController@post_add')->name('auth.post.add');

			Route::get('/sua-tac-gia-{id}','AuthController@edit')->name('auth.edit');
			Route::post('/sua-tac-gia-{id}','AuthController@post_edit')->name('auth.post.edit');

			// Route::get('/xoa-tac-gia-{$id}','CategoryController@delete')->name('ctg.delete');

			Route::get('/xoa-tac-gia-{id}','AuthController@delete')->name('auth.delete');



		});
        // dau gia
        Route::group(['prefix'=>'admin/auction'],function(){
            // // dau gia:
            // Route::post('/create/{id}', 'AuctionController@store')
            // ->name('auction.create.submit');

            //hien thi page client
            //  Route::get('/index','Admin\AuctionController@index')->name('auction_index_admin');
            // page admin
            // quan ly  dau gia\
            Route::get('/list', 'Admin\AuctionController@list')
            ->name('auction.admin.list');
            // thay doi status
            Route::get('/change_status/{id}', 'Admin\AuctionController@change')
            ->name('auction.admin.change_status');
            //xoa
            Route::get('/detele_auction/{id}','AuctionController@delete')->name('delete_auction');

            Route::get('/duyet_thanh_cong/{id}','Admin\AuctionController@duyet')->name('duyetsuscess');
            Route::get('/duyet_khong_thanh-cong/{id}','Admin\AuctionController@koduyet')->name('duyetfail');
            Route::get('/huy_xet_duyet/{id}','Admin\AuctionController@huyxetduyet')->name('huyxetduyet');
            // chọn time endtime auction :
            Route::post('/post_endtime/{id}','Admin\AuctionController@endtimepost')->name('endtimepost');

        });


		Route::group(['prefix'=>'nha-xuat-ban'],function(){

			Route::get('/','Publishing_houseController@publishinghouse')->name('pbh.list');
			Route::get('/them-nha-xuat-ban','Publishing_houseController@add')->name('pbh.add');
			Route::post('/them-nha-xuat-ban','Publishing_houseController@post_add')->name('pbh.post.add');

			Route::get('/sua-nha-xuat-ban-{id}','Publishing_houseController@edit')->name('pbh.edit');
			Route::post('/sua-nha-xuat-ban-{id}','Publishing_houseController@post_edit')->name('pbh.post.edit');

			// Route::get('/xoa-nha-xuat-ban-{$id}','Publishing_houseController@delete')->name('pbh.delete');

			Route::get('/xoa-nha-xuat-ban-{id}','Publishing_houseController@delete')->name('pbh.delete');

		});



		Route::group(['prefix'=>'nha-phan-phoi'],function(){

			Route::get('/','Book_companyController@bookcompany')->name('cby.list');
			Route::get('/them-nha-phan-phoi','Book_companyController@add')->name('cby.add');
			Route::post('/them-nha-phan-phoi','Book_companyController@post_add')->name('cby.post.add');

			Route::get('/sua-nha-phan-phoi-{id}','Book_companyController@edit')->name('cby.edit');
			Route::post('/sua-nha-phan-phoi-{id}','Book_companyController@post_edit')->name('cby.post.edit');

			// Route::get('/xoa-nha-phan-phoi-{$id}','Publishing_houseController@delete')->name('pbh.delete');

			Route::get('/xoa-nha-phan-phoi-{id}','Book_companyController@delete')->name('cby.delete');

		});

		Route::group(['prefix'=>'danh-muc'],function(){

			Route::get('/','CategoryController@category')->name('ctg.list');
			Route::get('/them-danh-muc','CategoryController@add')->name('ctg.add');
			Route::post('/them-danh-muc','CategoryController@post_add')->name('ctg.post.add');

			Route::get('/sua-danh-muc-{id}','CategoryController@edit')->name('ctg.edit');
			Route::post('/sua-danh-muc-{id}','CategoryController@post_edit')->name('ctg.post.edit');

			// Route::get('/xoa-danh-muc-{$id}','CategoryController@delete')->name('ctg.delete');

			Route::get('/xoa-danh-muc-{id}','CategoryController@delete')->name('ctg.delete');

		});

		Route::group(['prefix'=>'danh-muc-con'],function(){

			Route::get('/','Sub_categoryController@sub_category')->name('s.ctg.list');
			Route::get('/them-danh-muc-con','Sub_categoryController@add')->name('s.ctg.add');
			Route::post('/them-danh-muc-con','Sub_categoryController@post_add')->name('s.ctg.post.add');

			Route::get('/sua-danh-muc-con-{id}','Sub_categoryController@edit')->name('s.ctg.edit');
			Route::post('/sua-danh-muc-con-{id}','Sub_categoryController@post_edit')->name('s.ctg.post.edit');

			// Route::get('/xoa-danh-muc-{$id}','CategoryController@delete')->name('ctg.delete');

			Route::get('/xoa-danh-muc-con-{id}','Sub_categoryController@delete')->name('s.ctg.delete');

		});



		Route::group(['prefix'=>'sach'],function(){

			Route::get('/','BookController@book')->name('b.list');
			Route::get('/them-sach','BookController@add')->name('b.add');
			Route::post('/them-sach','BookController@post_add')->name('b.post.add');

			Route::get('/sua-sach-{id}','BookController@edit')->name('b.edit');
			Route::post('/sua-sach-{id}','BookController@post_edit')->name('b.post.edit');

			// Route::get('/xoa-sach-{$id}','Publishing_houseController@delete')->name('pbh.delete');

			Route::get('/xoa-sach-{id}','BookController@delete')->name('b.delete');

		});

		Route::group(['prefix'=>'ajax'],function(){
 			Route::get('sub-category/{id_category}','BookController@get_subcategory')->name('idcategory');
 		});













});

Route::get('/play',function(){
	$user = new role;
	$user->role_name = 'Admin';
	$user->save();

	$user = new role;
	$user->role_name = 'Member';
	$user->save();

	$user = new status;
	$user->Status_name = 'Hiện';
	$user->Status_note = 'Sản phẩm còn hàng hoặc hiện đánh giá';

	$user->save();

	$user = new status;
	$user->Status_name = 'Ẩn';
	$user->Status_note = 'Sản phẩm hết hàng hoặc ẩn đánh giá';
	$user->save();

	$user = new status;
	$user->Status_name = 'Đang xử lý';
	$user->Status_note = 'Đơn hàng vừa được order';
	$user->save();

	$user = new status;
	$user->Status_name = 'Xác nhận đơn hàng';
	$user->Status_note = 'Đơn hàng được xác nhận';
	$user->save();

	$user = new status;
	$user->Status_name = 'Đang vận chuyển';
	$user->Status_note = 'Đơn hàng được đang vận chuyển';

	$user->save();

	$user = new status;
	$user->Status_name = 'Giao hàng';
	$user->Status_note = 'Đơn hàng đang được giao';
	$user->save();

	$user = new status;
	$user->Status_name = 'Giao hàng thành công';
	$user->Status_note = 'Đã giao hàng thành công';
	$user->save();

	$user = new status;
	$user->Status_name = 'Hủy đơn hàng';
	$user->Status_note = 'Đơn hàng đã hủy';
	$user->save();


	$user = new payment;
	$user->payment_name = 'Thanh toán khi nhận hàng';
	$user->payment_note = 'Giao hàng nhận tiền';
	$user->save();

	$user = new payment;
	$user->payment_name = 'Thanh toán khi Paypal';
	$user->payment_note = 'Thanh toán bẳng thẻ';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 1';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 2';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 3';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 4';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 5';
	$user->save();


	$user = new category;
	$user->category_name = 'Danh muc 6';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 7';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 8';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 9';
	$user->save();

	$user = new category;
	$user->category_name = 'Danh muc 10';
	$user->save();



});

Route::get('/banhbao',function(){
	$user = new vai_tro;
	$user->ten_vai_tro = 'Admin';
	$user->save();
	$user = new vai_tro;
	$user->ten_vai_tro = 'Thành viên';
	$user->save();
	$user = new vai_tro;
	$user->ten_vai_tro = 'Khách hàng';
	$user->save();
	// add user admin
	$user = new User;
	$user->username='admin';
	$user->password=bcrypt('123');
	$user->name='Phong Phu';
	$user->email = 'ntkd@gmail.com';
	$user->phone = '0762999994';
	$user->ngay_sinh = '1998-01-01';
	$user->trang_thai = '1';
	$user->dia_chi = 'Vĩnh Long';
	$user->vai_tro = '1';
	$user->create = Carbon::now('Asia/Ho_Chi_Minh');
	$user->save();


});

////////////////////////s
Route::get('foo', function () {
    return view('admin.book.test');
});

Route::get('/update', function () {
    $data = User::where('id',13)->update(['password'=>bcrypt('admin')]);

});


// Route::view('error', 'pages.admin.error')
//     ->name('error');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//updateSettings
// D:\LUAN VAN\bookshop\app\Http\Controllers\vendor\Chatify\MessagesController.php
// Route::post('/setting','vendor.Chatify.MessagesController@updateSettings')->name('avatar.update');
// Route::get('/chatify','vendor\Chatify\MessagesController@getContacts')->name('user');
