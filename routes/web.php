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

Route::get('','HomeController@trangchu');

Route::get('phim/{idphim}','HomeController@chitietphim')->where(['idphim'=>'[0-9]+']);

Route::get('phimdangchieu','HomeController@phimdangchieu');

Route::get('phimsapchieu','HomeController@phimsapchieu');

Route::get('datve/{id}','HomeController@chitietdatve');
Route::get('datve','HomeController@chitietdatve2');

Route::get('review/{id}','HomeController@review');
Route::get('blog/{id}','HomeController@blog');
Route::get('rap/{id}','HomeController@rap');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
	Route::get('/','AdminController@homeadmin');
	Route::get('qlyphim','AdminController@Qlyphim');
	Route::get('qlytintuc','AdminController@Qlytintuc');
	Route::get('qlyrap','AdminController@Qlyrap');
	Route::get('qlylichchieu','AdminController@Qlylichchieu');
	Route::get('qlyphong','AdminController@Qlyphong');
	Route::get('qlyghe','AdminController@Qlyghe');
	Route::get('qlycombo','AdminController@Qlycombo');
	Route::get('qlyuser','AdminController@Qlyuser');
	Route::get('qlyve','AdminController@Qlyve');
	Route::get('addphim','AdminController@addphim');
	Route::post('formaddphim','AdminController@addphimmoi');
	Route::get('updatephim/{id}','AdminController@editphim');
	Route::post('formeditphim/{id}','AdminController@validationphim');
	Route::get('xoaphim/{idphim}','AdminController@xoap');
	Route::get('formtintuc','AdminController@formtintuc');
	Route::post('addtintuc','AdminController@addtintuc');
	Route::get('edittintuc/{id}','AdminController@formedittintuc');
	Route::post('edittintuc/{id}','AdminController@edittintuc');
	Route::get('xoatintuc/{idtt}','AdminController@xoatintuc');
	Route::get('addrap','AdminController@addrap');
	Route::post('addrap','AdminController@addmoirap');
	Route::get('editrap/{id}','AdminController@formeditrap');
	Route::post('editrap/{id}','AdminController@editrap');
	Route::get('xoarap/{id}','AdminController@xoarap');
	Route::get('addlichchieu','AdminController@formlich');
	Route::post('addlich','AdminController@addlich');
	Route::get('sualichchieu/{idlc}','AdminController@formsualich');
	Route::post('sualichchieu/{idlc}','AdminController@sualich');
	Route::get('xoalich/{id}','AdminController@xoalichchieu');
	Route::get('addphong','AdminController@formphong');
	Route::post('addphong','AdminController@addphong');
	Route::get('editphong/{id}','AdminController@formeditphong');
	Route::post('editphong/{id}','AdminController@editphong');
	Route::get('xoaphong/{id}','AdminController@xoaphong');
	Route::get('addcombo','AdminController@formcombo');
	Route::post('addcombo','AdminController@addcombo');
	Route::get('adduser','AdminController@formuser');
	Route::post('adduser','AdminController@adduser');
	Route::get('updateuser/{id}','AdminController@formupdateuser');
	Route::post('updateuser/{id}','AdminController@updateuser');
	Route::get('xoauser/{id}','AdminController@xoauser');
	Route::post('timkiemphim','AdminController@postTimkiemphim');

});
Route::get('ajax/ghe/{id}','AdminController@showghe');
Route::get('ajax/lichchieu/{id}','AdminController@getlich');
Route::get('ajax/phong/{id}','AdminController@getphong');
Route::get('dangnhap','HomeController@formdangnhap');
Route::post('login','Controller@dangnhap');
Route::get('dangky','Controller@getdangky');
Route::post('dangky','HomeController@postdangky');
Route::get('dangxuat','HomeController@dangxuat');
Route::get('xemlich','HomeController@lich');
// Route::resource('ajaxdatve', 'datveajax');
Route::get('/ajaxdatve','HomeController@datve');
Route::post('cmt/{id}','HomeController@postcmt')->middleware('admin');


Route::get('lienket', function() {
   // $lk=App\ve::where('id_lichchieu',1)->get();

   // foreach ($lk as $l) {
   // 	echo $l->ghe->id;
   // }
   $lich=App\ve::find(1)->lichchieu->phim;
   return $lich;
});
Route::get('themghe', 'HomeController@themghe');

Route::get('muave','MuaveController@muave');

Route::get('tintuc','TintucController@tintuc');

Route::get('hotro','HotroController@hotro');

Route::get('lienhe','LienheController@lienhe');

Route::get('rap','RapController@rap');

Route::post('timkiem','HomeController@postTimkiem');

Route::get('ajax/rap/{id}','HomeController@postAjaxrap');

Route::get('ajax/ngay/{id}/{idphim}','HomeController@postAjaxngay');

Route::get('ajax/time/{id}/{idphim}','HomeController@postAjaxgio');
// Route::get('ajax/time/{id}/{idphim}/{ngay}/{time}','HomeController@postAjaxgio');
Route::post('ajax/rap','HomeController@ajaxrap');