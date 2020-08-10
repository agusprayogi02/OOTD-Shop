<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Member - Home'
        ];
        return view('member.home', $data);
    }
}
