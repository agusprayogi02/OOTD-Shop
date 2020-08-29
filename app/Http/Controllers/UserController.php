<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Historys;
use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'diskon' => 0,
            'total' => 0,
            'subTotal' => 0,
            'delivery' => 0,
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

    public function deleteCart($id)
    {
        if (!$id) {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Kode Barang yang Dimasukkan!!');
        }

        $cart = session()->get('cart');

        if ($cart[$id]) {
            $carts = [];
            foreach ($cart as $key => $value) {
                if ($key != $id) {
                    $carts[$key] = $value;
                }
            };
            session()->put('cart', $carts);
        }
        return redirect()->route('user.cart');
    }

    public function CheckOut()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('user.cart')->with('error', 'Tidak Ada Barang yang Dimasukkan!!');
        }
        $total = 0;
        $subtotal = 0;
        $diskon = 0;
        $delivery = 0;
        $data = array();
        $kd = "TR" . time() . "KD" . random_int(0, 9999);

        $data = [
            'kd_transaksi' => $kd,
            'id' => Auth::user()->id,
            'subTotal' => $subtotal,
            'total' => $total,
            'diskon' => $diskon,
            'delivery' => $delivery,
            'status' => '0',
            'created_at' => now()
        ];
        $post = Historys::insert($data);
        if ($post) {
            foreach ($cart as $dt => $item) {
                $total += $item['total'];
                $diskon += $item['diskon'];
                $subtotal = $total + $diskon;
                $data = [
                    'kd_transaksi' => $kd,
                    'kd_brg' => $dt,
                    'jumlah' => $cart[$dt]['jumlah'],
                    'diskon' => $cart[$dt]['diskon'],
                    'total' => $cart[$dt]['total'],
                    'created_at' => now()
                ];
                $add = Pembelian::insert($data);
                if (!$add) {
                    return redirect()->back()->with('error', "Gagal Membeli Barang!!");
                } else {
                    $update = [
                        'subTotal' => $subtotal,
                        'total' => $total,
                        'diskon' => $diskon,
                        'delivery' => $delivery,
                        'status' => '0',
                    ];
                    Historys::where('kd_transaksi', $kd)->update($update);
                }
            }
        }

        if ($post) {
            session()->forget('cart');
            return redirect()->route('user.history')->with('pesan', "Berhasil Membeli Barang!!");
        } else {
            return redirect()->back()->with('error', "Gagal Membeli Barang!!");
        }
    }
}
