<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// user
Route::get('/catalog/basket', 'UserController@index')->name('user.cart')->middleware('is_user');
Route::get('/cart/shop/{id}', 'UserController@cartById')->name('user.addCart')->middleware('is_user');
Route::get('/cart/now/{id}', 'UserController@shopNow')->name('user.addNow')->middleware('is_user');
Route::get('/cart/plus/{id}', 'UserController@plus')->name('user.plus')->middleware('is_user');
Route::get('/cart/minus/{id}', 'UserController@minus')->name('user.minus')->middleware('is_user');
Route::get('/cart/delete/{id}', 'UserController@deleteCart')->name('user.cart.delete')->middleware('is_user');
Route::get('/cart/checkout', 'UserController@CheckOut')->name('user.cart.checkout')->middleware('is_user');

// admin
Route::get('/admin/home', 'AdminController@index')->name('admin.home')->middleware('is_admin');

// member
Route::get('/member/home', 'MemberController@index')->name('member.home')->middleware('is_member');
Route::get('/member/brg/tambah', 'MemberController@tambahBrg')->name('member.addBrg')->middleware('is_member');
Route::post('/member/brg/storeBrg', 'MemberController@storeBrg')->name('member.storeBrg')->middleware('is_member');
Route::get('/member/brg/delete/{id}', 'MemberController@deleteBrg')->name('member.deleteBrg')->middleware('is_member');
Route::get('/member/brg/edit/{id}', 'MemberController@editBrg')->name('member.editBrg')->middleware('is_member');
Route::post('/member/brg/update/{id}', 'MemberController@updateBrg')->name('member.updateBrg')->middleware('is_member');
Route::get('/member/ktgr/tambah', 'MemberController@tambahKtgr')->name('member.add_ktgr')->middleware('is_member');
Route::post('/member/ktgr/store', 'MemberController@storeKtgr')->name('member.store_ktgr')->middleware('is_member');
Route::get('/member/ktgr/list', 'MemberController@list_ktgr')->name('member.list_ktgr')->middleware('is_member');

Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});
