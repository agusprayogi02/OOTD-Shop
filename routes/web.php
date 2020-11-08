<?php

use App\Http\Resources\Apis;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

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

Auth::routes();
// guest
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/contact', 'HomeController@contact')->name('contact');
Route::get('/home/about', 'HomeController@about')->name('about');
Route::get('/catalog/shop', 'HomeController@shop')->name('shop');
Route::post('/catalog/shop', 'HomeController@shopPost')->name('shop.post');
Route::get('/catalog/shop/{id}', 'HomeController@shopId')->name('shop.get');

// profile Admin dan Member
Route::get('/home/profile', 'ProfileController@index')->name("profile");

// user
Route::get('/catalog/basket', 'User\UserController@index')->name('user.cart')->middleware('is_user');
Route::get('/cart/shop/{id}', 'User\UserController@cartById')->name('user.addCart')->middleware('is_user');
Route::get('/cart/now/{id}', 'User\UserController@shopNow')->name('user.addNow')->middleware('is_user');
Route::get('/cart/plus/{id}', 'User\UserController@plus')->name('user.plus')->middleware('is_user');
Route::get('/cart/minus/{id}', 'User\UserController@minus')->name('user.minus')->middleware('is_user');
Route::get('/cart/delete/{id}', 'User\UserController@deleteCart')->name('user.cart.delete')->middleware('is_user');
Route::get('/cart/checkout', 'User\UserController@CheckOut')->name('user.cart.checkout')->middleware('is_user');
Route::get('/catalog/history', 'User\HistoryController@index')->name('user.history')->middleware('is_user');
Route::get('/catalog/history/delete/{id}', 'User\HistoryController@delete')->name('user.history.delete')->middleware('is_user');
Route::get('/catalog/history/detail/{kd}', 'User\HistoryController@detail')->name('user.history.detail')->middleware('is_user');


// admin
Route::get('/admin/home', 'Admin\AdminController@index')->name('admin.home')->middleware('is_admin');
Route::get('/admin/list/user', 'Admin\AdminController@list_user')->name('admin.users')->middleware('is_admin');
Route::get('/admin/list/member', 'Admin\AdminController@list_member')->name('admin.members')->middleware('is_admin');
Route::get('/admin/list/pesanan', 'Admin\AdminController@list_pesanan')->name('admin.pesanan')->middleware('is_admin');
Route::get('/admin/list/blockir/{id}', 'Admin\AdminController@blockir')->name('admin.blokir')->middleware('is_admin');
Route::get('/admin/list/delete/{id}', 'Admin\AdminController@delete')->name('admin.delete')->middleware('is_admin');
Route::get('/admin/list/actived/{id}', 'Admin\AdminController@actived')->name('admin.actived')->middleware('is_admin');
Route::get('/admin/uang', 'Admin\AdminController@uang')->name('admin.uang')->middleware('is_admin');
Route::post('/admin/uang/add', 'Admin\AdminController@add_saldo')->name('admin.add_saldo')->middleware('is_admin');

// member
Route::get('/member/home', 'Member\MemberController@index')->name('member.home')->middleware('is_member');
Route::get('/member/brg/tambah', 'Member\MemberController@tambahBrg')->name('member.addBrg')->middleware('is_member');
Route::post('/member/brg/storeBrg', 'Member\MemberController@storeBrg')->name('member.storeBrg')->middleware('is_member');
Route::get('/member/brg/delete/{id}', 'Member\MemberController@deleteBrg')->name('member.deleteBrg')->middleware('is_member');
Route::get('/member/brg/edit/{id}', 'Member\MemberController@editBrg')->name('member.editBrg')->middleware('is_member');
Route::post('/member/brg/update/{id}', 'Member\MemberController@updateBrg')->name('member.updateBrg')->middleware('is_member');
Route::get('/member/ktgr/tambah', 'Member\MemberController@tambahKtgr')->name('member.add_ktgr')->middleware('is_member');
Route::post('/member/ktgr/store', 'Member\MemberController@storeKtgr')->name('member.store_ktgr')->middleware('is_member');
Route::get('/member/ktgr/list', 'Member\MemberController@list_ktgr')->name('member.list_ktgr')->middleware('is_member');
Route::get('/member/pesanan',  'Member\MemberController@pesanan')->name('member.pesanan')->middleware('is_member');
Route::get('/member/{kd}/kirim', 'Member\MemberController@kirim')->name('member.kirim')->middleware('is_member');
Route::get('/member/{kd}/tolak', 'Member\MemberController@tolak')->name('member.tolak')->middleware('is_member');

// profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/edit', 'ProfileController@edit')->name('edit_profile');
Route::post('/profile/update', 'ProfileController@update')->name('update_profile');

// examples
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});

Route::get('api/user', function () {
    return Apis::collection(User::all());
});
Route::get('api/user/{id}', function ($id) {
    return Apis::collection(User::where('id', $id)->get());
});
