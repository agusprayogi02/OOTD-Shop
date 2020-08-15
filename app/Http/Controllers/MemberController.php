<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Facades\Auth;
use ImageResize;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rows = Barang::all();
        $data = [
            'title' => 'Member - Home',
            'rows' => $rows
        ];
        return view('member.home', $data);
    }

    public function tambahBrg()
    {
        $data = [
            'title' => 'Tambah Barang',
            'kategori' => DB::table('kategori')->get()
        ];
        return view('member.tambahBrg', $data);
    }

    public function storeBrg(Request $req)
    {
        $validate = $req->validate([
            'nama' => 'required',
            'harga' => 'required|integer|min:1',
            'stok' => 'required|integer|min:1',
            'diskon' => 'required|integer|min:0|max:100',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'kategori' => 'required'
        ]);
        $img = $req->file('foto');
        $fileName = "BRG" . rand(0, 99999) . "IMG" . rand(0, 9999) . "." . $img->getClientOriginalExtension();
        ImageResize::make($img->path())->resize(800, 1200, function ($constraint) {
            $constraint->aspectRatio();
        })->save('app/images/barang' . '/' . $fileName);
        $items = array(
            'kd_brg' => "KD" . time() . "BRG" . rand(0, 999),
            'id' => Auth::user()->id,
            'kd_ktgr' => $req->kategori,
            'nama' => $req->nama,
            'harga' => $req->harga,
            'foto' => $fileName,
            'stok' => $req->stok,
            'diskon' => $req->diskon,
            'created_at' => now()
        );

        $post = Barang::insert($items);
        if ($post) {
            return redirect()->route('member.home')->with('pesan', 'Berhasil Memambahkan Barang!!');
        } else {
            return redirect()->route('member.addBrg')->with('error', "Gagal Memambahkan Barang!!");
        }
    }
}
