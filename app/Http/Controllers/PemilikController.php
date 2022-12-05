<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index() {
        $datas = DB::select('select * from pemilik');

        return view('pemilik.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pemilik.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pemilik' => 'required',
            'nama_pemilik' => 'required',
            'nik' => 'required',
            'plat_nomor' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pemilik(id_pemilik, nama_pemilik, nik, plat_nomor) VALUES (:id_pemilik, :nama_pemilik, :nik, :plat_nomor)',
        [
            'id_pemilik' => $request->id_pemilik,
            'nama_pemilik' => $request->nama_pemilik,
            'nik' => $request->nik,
            'plat_nomor' => $request->plat_nomor,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pemilik')->where('id_pemilik', $id)->first();

        return view('pemilik.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pemilik' => 'required',
            'nama_pemilik' => 'required',
            'nik' => 'required',
            'plat_nomor' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pemilik SET id_pemilik = :id_pemilik, nama_pemilik = :nama_pemilik, nik = :nik, plat_nomor = :plat_nomor WHERE id_pemilik = :id',
        [
            'id' => $id,
            'id_pemilik' => $request->id_pemilik,
            'nama_pemilik' => $request->nama_pemilik,
            'nik' => $request->nik,
            'plat_nomor' => $request->plat_nomor,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'nik' => $request->nik,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pemilik WHERE id_pemilik = :id_pemilik', ['id_pemilik' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_pemilik', $id)->delete();

        return redirect()->route('pemilik.index')->with('success', 'Data Admin berhasil dihapus');
    }


}
