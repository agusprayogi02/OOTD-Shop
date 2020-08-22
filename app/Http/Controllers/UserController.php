<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Keranjang Belanja',
        ];
        $cart = session()->get('cart');
        if ($cart) {
            $data['barang'] = $cart;
        }
        return view('user.basket', $data);
    }

    public function cartById($id = '')
    {
        if ($id == '') {
            return redirect()->back()->with('error', 'Tidak Ada Kode Barang yang Dimasukkan!!');
        }

        $brg = Barang::find($id);
        if (!$brg) {
            abort(404);
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $hrg = $brg->harga;
            $cart = [
                $id => [
                    'id' => $brg->id,
                    'nama' => $brg->nama,
                    'foto' => $brg->foto,
                    'stok' => $brg->stok,
                    'jumlah' => 1,
                    'harga' => $hrg,
                    'total' => $hrg - ($hrg * ($brg->diskon / 100)),
                    'diskon' => $hrg * ($brg->diskon / 100),
                    'subTotal' => $hrg
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('pesan', 'Berhasil Menambahkan Barang!!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['jumlah']++;
            $hrg = $brg->harga;
            $jum = $cart[$id]['jumlah'];
            $cart[$id]['total'] = ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum;
            $cart[$id]['diskon'] = ($hrg  * ($brg->diskon / 100)) * $jum;
            $cart[$id]['subTotal'] = $hrg * $jum;
            // $cart = [
            //     $id => [
            //         'total' => ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum,
            //         'diskon' => ($hrg  * ($brg->diskon / 100)) * $jum,
            //         'subTotal' => $hrg * $jum
            //     ]
            // ];
            session()->put('cart', $cart);
            return redirect()->back()->with('pesan', 'Berhasil Menambahkan Jumlah Barang Barang!!');
        }

        $hrg = $brg->harga;
        $cart[$id] = [
            'id' => $brg->id,
            'nama' => $brg->nama,
            'foto' => $brg->foto,
            'stok' => $brg->stok,
            'jumlah' => 1,
            'harga' => $hrg,
            'total' => $hrg - ($hrg * ($brg->diskon / 100)),
            'diskon' => $hrg * ($brg->diskon / 100),
            'subTotal' => $hrg
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('pesan', 'Berhasil Menambahkan Barang!!');
    }

    public function shopNow($id = '')
    {
        if ($id == '') {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Kode Barang yang Dimasukkan!!');
        }

        $brg = Barang::find($id);
        if (!$brg) {
            abort(404);
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $hrg = $brg->harga;
            $cart = [
                $id => [
                    'id' => $brg->id,
                    'nama' => $brg->nama,
                    'foto' => $brg->foto,
                    'stok' => $brg->stok,
                    'jumlah' => 1,
                    'harga' => $hrg,
                    'total' => $hrg - ($hrg * ($brg->diskon / 100)),
                    'diskon' => $hrg * ($brg->diskon / 100),
                    'subTotal' => $hrg
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('user.cart')->with('pesan', 'Berhasil Menambahkan Barang!!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['jumlah']++;
            $hrg = $brg->harga;
            $jum = $cart[$id]['jumlah'];
            $cart[$id]['total'] = ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum;
            $cart[$id]['diskon'] = ($hrg  * ($brg->diskon / 100)) * $jum;
            $cart[$id]['subTotal'] = $hrg * $jum;
            // $cart = [
            //     $id => [
            //         'total' => ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum,
            //         'diskon' => ($hrg  * ($brg->diskon / 100)) * $jum,
            //         'subTotal' => $hrg * $jum
            //     ]
            // ];
            session()->put('cart', $cart);
            return redirect()->route('user.cart')->with('pesan', 'Berhasil Menambahkan Jumlah Barang Barang!!');
        }

        $hrg = $brg->harga;
        $cart[$id] = [
            'id' => $brg->id,
            'nama' => $brg->nama,
            'foto' => $brg->foto,
            'stok' => $brg->stok,
            'jumlah' => 1,
            'harga' => $hrg,
            'total' => $hrg - ($hrg * ($brg->diskon / 100)),
            'diskon' => $hrg * ($brg->diskon / 100),
            'subTotal' => $hrg
        ];
        session()->put('cart', $cart);
        return redirect()->route('user.cart')->with('pesan', 'Berhasil Menambahkan Barang!!');
    }

    public function plus($id)
    {
        if (!$id) {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Kode Barang yang Dimasukkan!!');
        }

        $brg = Barang::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['jumlah']++;
            $hrg = $brg->harga;
            $jum = $cart[$id]['jumlah'];
            $cart[$id]['total'] = ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum;
            $cart[$id]['diskon'] = ($hrg  * ($brg->diskon / 100)) * $jum;
            $cart[$id]['subTotal'] = $hrg * $jum;
            session()->put('cart', $cart);
            return redirect()->route('user.cart')->with('pesan', 'Berhasil Menambahkan Jumlah Barang Barang!!');
        }
    }

    public function minus($id)
    {
        if (!$id) {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Kode Barang yang Dimasukkan!!');
        }

        $brg = Barang::find($id);
        $cart = session()->get('cart');

        if ($cart[$id]['jumlah'] == 1) {
            return redirect()->route('user.cart');
        }

        if (isset($cart[$id])) {
            $cart[$id]['jumlah']--;
            $hrg = $brg->harga;
            $jum = $cart[$id]['jumlah'];
            $cart[$id]['total'] = ($hrg - ($hrg  * ($brg->diskon / 100))) * $jum;
            $cart[$id]['diskon'] = ($hrg  * ($brg->diskon / 100)) * $jum;
            $cart[$id]['subTotal'] = $hrg * $jum;
            session()->put('cart', $cart);
            return redirect()->route('user.cart')->with('pesan', 'Berhasil menggurangi Jumlah Barang Barang!!');
        }
    }
}
