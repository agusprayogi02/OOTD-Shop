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
        $this->direct = redirect()->route('member.home');
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
            'title' => 'Member - Tambah Barang',
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
            'diskon' => 'integer|min:0|max:100',
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
            return $this->direct->with('pesan', 'Berhasil Memambahkan Barang!!');
        } else {
            return redirect()->route('member.addBrg')->with('error', "Gagal Memambahkan Barang!!");
        }
    }

    public function deleteBrg($id = '')
    {
        if ($id == '') {
            return $this->direct->with('error', "Tidak Ada Id yang Cocok!!");
        }
        $hpus = Barang::where('kd_brg', $id)->delete();
        if ($hpus) {
            return $this->direct->with('pesan', "Berhasil Menghapus Barang!!");
        } else {
            return $this->direct->with('error', "Gagal Menghapus Barang!!");
        }
    }

    public function editBrg($id = '')
    {
        if ($id == '') {
            $this->direct->with('error', "Tidak Ada Id yang Cocok!!");
        }

        $data = [
            'title' => "Member - Edit Barang",
            'kategori' => DB::table('kategori')->get(),
            'barang' => Barang::where('kd_brg', $id)->get()->first()
        ];
        return view('member.updateBrg', $data);
    }

    public function updateBrg(Request $req, $id = '')
    {
        if ($id == '') {
            return $this->redict->with('error', "Tidak Ada Id yang Cocok!!");
        }
        $req->validate([
            'nama' => 'required',
            'harga' => 'required|integer|min:1',
            'stok' => 'required|integer|min:1',
            'diskon' => 'integer|min:0|max:100',
            'kategori' => 'required'
        ]);

        $brg = Barang::where('kd_brg', $id)->get()->first();
        $img = $req->file('foto');
        if ($img == '') {
            $fileName = $brg->foto;
        } else {
            $fileName = "BRG" . rand(0, 99999) . "IMG" . rand(0, 9999) . '' . $img->getClientOriginalExtension();
            ImageResize::make($img->path())->resize(800, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save('app/images/barang' . '/' . $fileName);
        }

        $items = array(
            'id' => Auth::user()->id,
            'kd_ktgr' => $req->kategori,
            'nama' => $req->nama,
            'harga' => $req->harga,
            'foto' => $fileName,
            'stok' => $req->stok,
            'diskon' => $req->diskon,
            'updated_at' => now()
        );

        $up = Barang::where('kd_brg', $id)->update($items);
        if ($up) {
            return $this->direct->with('pesan', 'Berhasil Mengrubah Barang!!');
        } else {
            return redirect()->route('member.addBrg')->with('error', "Gagal Mengrubah Barang!!");
        }
    }

    public function tambahKtgr()
    {
        $data = [
            'title' => 'Member - Tambah Kategori'
        ];
        return view('member.tambah_kategori', $data);
    }
}
