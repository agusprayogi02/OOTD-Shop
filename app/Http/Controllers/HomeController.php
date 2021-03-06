<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\RangePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'barang' => DB::select('select * from barang where MONTH(created_at) = ?', [now()->month]),
        ];
        return view('user.welcome', $data);
    }

    public function contact()
    {
        $data = [
            'title' => "Contact Me"
        ];
        return view('user.contact', $data);
    }

    public function about()
    {
        $data = [
            'title' => "About Me"
        ];
        return view('user.about', $data);
    }

    public function shop()
    {
        $data = [
            'title' => 'Shop',
            'barang' => Barang::all(),
            'kategori' => Kategori::all(),
            'range' => RangePrice::all()
        ];
        return view('user.shop', $data);
    }

    public function shopId($id)
    {
        $data = [
            'title' => 'Shop',
            'kategori' => Kategori::all(),
            'barang' => Barang::where('kd_ktgr', $id)->get(),
            'range' => RangePrice::all()
        ];
        return view('user.shop', $data);
    }

    public function shopPost(Request $req)
    {
        $data = [
            'title' => 'Shop',
            'barang' => Barang::whereBetween('harga', [$req->from, $req->to])->get(),
            'kategori' => Kategori::all(),
            'range' => RangePrice::all()
        ];
        return view('user.shop', $data);
    }
}
