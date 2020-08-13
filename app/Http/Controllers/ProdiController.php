<?php

namespace App\Http\Controllers;

use App\Prodi;
use App\Mahasiswa;
use DataTables;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prodi.index');
    }

    public function prodi_list()
    {
        $prodi = Prodi::all();
        return Datatables::of($prodi)
            ->addIndexColumn()
            ->addColumn('action', function ($prodi) {
                $action = '<a class="text-primary" href="/prodi/edit/'.$prodi->kode_prodi.'">Edit</a>';
                $action .= ' | <a class="text-danger" href="/prodi/delete/'.$prodi->kode_prodi.'">Hapus</a>';
                return $action;
            })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('prodi.create', compact('prodi'));
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
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
        ]);
        Prodi::create($request->all());
        return redirect()->route('prodi.index')
                        ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi, $id)
    {
        
        $prodi = Prodi::find($id);
        return view ('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required',
        ]);

        $prodi->update($request->all());

        return redirect()->route('prodi.index')
                        ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')
                        ->with('success', 'Data berhasil dihapus');
    }
}
