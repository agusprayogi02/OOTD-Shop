<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'barang' => DB::select('select * from barang where MONTH(created_at) = ?', [now()->month])
        ];
        return view('user.welcome', $data);
    }
}
