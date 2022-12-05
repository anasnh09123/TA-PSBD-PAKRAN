<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{

    public function join(Request $request) {
        if($request->has('search')){
            $datas = DB::select('SELECT pemilik.id_pemilik, pajak.id_pajak, pajak.harga_pajak, pemilik.nama_pemilik, pemilik.plat_nomor, kendaraan.waktu_pajak, kendaraan.jenis_kendaraan, kendaraan.merk FROM `kendaraan` LEFT JOIN pemilik ON pemilik.plat_nomor = kendaraan.plat_nomor LEFT JOIN pajak on pajak.jenis_kendaraan = kendaraan.jenis_kendaraan WHERE pemilik.nama_pemilik like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

        return view('join')
            ->with('datas', $datas);
        }
        else {
            $datas = DB::select('SELECT pemilik.id_pemilik, pajak.id_pajak, pajak.harga_pajak, pemilik.nama_pemilik, pemilik.plat_nomor, kendaraan.waktu_pajak, kendaraan.jenis_kendaraan, kendaraan.merk FROM `kendaraan` LEFT JOIN pemilik ON pemilik.plat_nomor = kendaraan.plat_nomor LEFT JOIN pajak on pajak.jenis_kendaraan = kendaraan.jenis_kendaraan');

        return view('join')
            ->with('datas', $datas);
        }
    }


    public function index(Request $request) {
        if($request->has('search')){
        $datas = DB::select('select * from kendaraan WHERE jenis_kendaraan like :search AND recycle=0',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        $datasrecycle = DB::select('select * from kendaraan WHERE jenis_kendaraan like :search AND recycle=1',[
            'search'=>'%'.$request->search.'%',
        ]);

        return view('kendaraan.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);
        }
       else{
        $datas = DB::select('select * from kendaraan WHERE recycle=0');
        $datasrecycle = DB::select('select * from kendaraan WHERE recycle=1');

        return view('kendaraan.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);   
       } 
    }

    
    public function create() {
        return view('kendaraan.add');
    }

    public function store(Request $request) {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'merk' => 'required',
            'waktu_pajak' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kendaraan(plat_nomor, jenis_kendaraan, merk, waktu_pajak) VALUES (:plat_nomor, :jenis_kendaraan, :merk, :waktu_pajak)',
        [
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'merk' => $request->merk,
            'waktu_pajak' => $request->waktu_pajak,
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

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('kendaraan')->where('plat_nomor', $id)->first();

        return view('kendaraan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'merk' => 'required',
            'waktu_pajak' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kendaraan SET plat_nomor = :plat_nomor, jenis_kendaraan = :jenis_kendaraan, merk = :merk, waktu_pajak = :waktu_pajak WHERE plat_nomor = :id',
        [
            'id' => $id,
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'merk' => $request->merk,
            'waktu_pajak' => $request->waktu_pajak,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_biji' => $request->jenis_biji,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM kendaraan WHERE plat_nomor = :plat_nomor', ['plat_nomor' => $id]);
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }
    public function recycle($id) {
        DB::update('UPDATE kendaraan set recycle = 1 WHERE plat_nomor = :plat_nomor', ['plat_nomor' => $id]);
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }
    public function restore($id) {
        DB::update('UPDATE kendaraan set recycle = 0 WHERE plat_nomor = :plat_nomor', ['plat_nomor' => $id]);
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }
}
