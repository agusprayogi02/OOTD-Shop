<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use ImageResize;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => "Profile"
        ];
        return view('profile.profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = [
            'title' => Str::ucfirst(Auth::user()->role) . " - Edit Profile"
        ];
        return view('profile.edit_profile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'jk' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
        ]);
        if ($request->has('foto')) {
            $img = $request->file('foto');
            $filename = "IMG" . time() . "." . $img->getClientOriginalExtension();
            ImageResize::make($img->path())->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save('media/profile/' . $filename);
        } else {
            $filename = Auth::user()->foto;
        }
        $data = [
            'name' => $request->name,
            'JK' => $request->jk,
            'warung' => $request->warung,
            'alamat' => $request->alamat,
            'birthdate' => $request->birthdate,
            'foto' => $filename,
            'updated_at' => now()
        ];
        $update = User::where('id', Auth::user()->id)->update($data);
        if ($update) {
            return redirect()->route('edit_profile')->with('pesan', "Berhasil Merubah Profile!!");
        } else {
            return redirect()->route('edit_profile')->with('error', "Gagal Merubah Profile!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
