<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pembelian;
use App\User;
use Illuminate\Http\Request;
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
}
