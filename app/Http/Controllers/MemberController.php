<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Barang;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rows = DB::table('barang')->get();
        $data = [
            'title' => 'Member - Home',
            'rows' => $rows
        ];
        return view('member.home', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Barang',
        ];
        return view('member.tambahBrg', $data);
    }
}
