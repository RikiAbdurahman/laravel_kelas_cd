<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use App\Prodi;
use DataTables;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');

    }

    public function mhs_list()
    {
        $mhs = Mahasiswa::with('mprodi')->get();
        return Datatables::of($mhs)
                ->addIndexColumn()
                ->addColumn('action', function ($mhs) {
                     $action = '<a class="text-primary" href="/mhs/edit/'.$mhs->nim.'">Edit</a>';
                     $action .= ' | <a class="text-danger" href="/mhs/delete/'.$mhs->nim.'">Hapus</a>';
            return $action;
        })
            ->make();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $prodi = Prodi::all();
             return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required|digits:10',
            'nama_lengkap' => 'required',
            ]);

            Mahasiswa::create($request->all());

             return redirect()->route('mhs.index')
                            ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa, $id)

    {
        $prodi = Prodi::all();
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('prodi', 'mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            ]);
            $mahasiswa->update($request->all());
            return redirect()->route('mhs.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mhs.index')->with('success','Data Berhasil Dihapus');


    }
}
