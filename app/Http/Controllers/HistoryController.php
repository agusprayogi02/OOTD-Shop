<?php

namespace App\Http\Controllers;

use App\Historys;
use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'User - History',
            'historys' => Historys::where('id', Auth::user()->id)->get()
        ];

        return view('user.history', $data);
    }

    public function delete($id)
    {
        if (!$id) {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Barang yang Dimasukkan!!');
        }
        $post = Historys::where('kd_transaksi', $id)->update(['user' => '0']);
        if ($post) {
            return redirect()->route('user.history')->with('pesan', "Berhasil Membeli Barang!!");
        } else {
            return redirect()->route('user.history')->with('error', "Gagal Membeli Barang!!");
        }
    }

    public function detail($kd = '')
    {
        if (!$kd) {
            return redirect()->route('user.history')->with('error', 'Tidak Ada Barang yang Dimasukkan!!');
        }

        // $data = [
        //     'histori' => Pembelian::where('kd_transaksi', $kd)
        // ];
        echo $kd;
        dd(Pembelian::where('kd_transaksi', $kd)->get());
    }
}
