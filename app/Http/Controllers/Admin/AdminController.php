<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pembelian;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jual = Pembelian::all();
        $total = 0;
        $jumlah = 0;
        foreach ($jual as $item) {
            $total += $item->total;
            $jumlah += $item->jumlah;
        }
        $data = [
            'title' => "Admin - Home",
            'users' => User::where('role', 'user')->get(),
            'members' => User::where('role', 'member')->get(),
            'jumlah' => $jumlah,
            'total' => $total
        ];
        return view('admin.home', $data);
    }

    public function list_user()
    {
        $data = [
            'title' => "Admin - List Users",
            'users' => User::where('role', 'user')->get()
        ];
        return view('admin.list_user', $data);
    }

    public function list_member()
    {
        $data = [
            'title' => "Admin - List Members",
            'members' => User::where('role', 'member')->get()
        ];
        return view('admin.list_member', $data);
    }

    public function list_pesanan()
    {
        $data = [
            'title' => "Admin - List Pesanan",
            'pesanan' => Pembelian::all(),
            "users" => User::all()
        ];
        return view('admin.list_pesanan', $data);
    }

    public function blockir($id)
    {
        if ($id !== null) {
            User::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('pesan', "Berhasil MemBlokir User!!");
        } else {
            return redirect()->back()->with('error', "Tidak Ada Id yang dimasukkan!!");
        }
    }

    public function actived($id)
    {
        if ($id !== null) {
            User::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('pesan', "Berhasil MengAktifkan User!!");
        } else {
            return redirect()->back()->with('error', "Tidak Ada Id yang dimasukkan!!");
        }
    }

    public function delete($id)
    {
        if ($id !== null) {
            User::where('id', $id)->delete();
            return redirect()->back()->with('pesan', "Berhasil Menghapus User!!");
        } else {
            return redirect()->back()->with('error', "Tidak Ada Id yang dimasukkan!!");
        }
    }

    public function uang()
    {
        $data = [
            'title' => 'Admin - Uang',
            'peoples' => User::where('id', '!=', Auth::user()->id)->get()
        ];
        return view('admin.list_uang', $data);
    }

    public function add_saldo(Request $req)
    {
        $req->validate([
            'id' => ['required'],
            'uang' => ['required', 'integer']
        ]);

        $uangNow = User::find($req->id)->uang;
        $total = $uangNow + $req->uang;
        $update = User::where('id', $req->id)->update(['uang' => $total]);
        if ($update) {
            return redirect()->back()->with('pesan', "Berhasil TopUp User " . $req->username . "!!");
        } else {
            return redirect()->back()->with('error', "Gagal TopUp User" . $req->username . "!!");
        }
    }
}
