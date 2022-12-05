<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PajakController extends Controller
{
    
    public function index() {
        $datas = DB::select('select * from pajak');

        return view('pajak.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pajak.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pajak' => 'required',
            'harga_pajak' => 'required',
            'jenis_kendaraan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pajak(id_pajak, harga_pajak, jenis_kendaraan) VALUES (:id_pajak, :harga_pajak, :jenis_kendaraan)',
        [
            'id_pajak' => $request->id_pajak,
            'harga_pajak' => $request->harga_pajak,
            'jenis_kendaraan' => $request->jenis_kendaraan,
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

        return redirect()->route('pajak.index')->with('success', 'Data Pajak berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pajak')->where('id_pajak', $id)->first();

        return view('pajak.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pajak' => 'required',
            'harga_pajak' => 'required',
            'jenis_kendaraan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pajak SET id_pajak = :id_pajak, harga_pajak = :harga_pajak, jenis_kendaraan = :jenis_kendaraan WHERE id_pajak = :id',
        [
            'id' => $id,
            'id_pajak' => $request->id_pajak,
            'harga_pajak' => $request->harga_pajak,
            'jenis_kendaraan' => $request->jenis_kendaraan,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_kendaraan' => $request->jenis_kendaraan,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pajak.index')->with('success', 'Data Pajak berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pajak WHERE id_pajak = :id_pajak', ['id_pajak' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_pajak', $id)->delete();

        return redirect()->route('pajak.index')->with('success', 'Data Admin berhasil dihapus');
    }


}
