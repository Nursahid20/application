<?php

namespace App\Http\Controllers;

use App\Models\main;
use Illuminate\Http\Request;
use App\Http\Requests\StoremainRequest;
use App\Http\Requests\UpdatemainRequest;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.index', [
            'main' => Main::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'location' => 'required',
                'unit' => 'required'
            ],
            [
                'name.required' => 'nama harus di isi',
                'description.required' => 'keterangan harus di isi',
                'location.required' => 'lokasi harus di isi',
                'unit.required' => 'unit harus di isi',
            ]
        );
        Main::create($validateData);
        return redirect('/dashboard')->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(main $main)
    {
        $explode = explode('/', url()->current());
        return view('main.edit', [
            'data' => Main::where('id',  $explode[4])->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, main $main)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'location' => 'required',
                'unit' => 'required'
            ],
            [
                'name.required' => 'nama harus di isi',
                'description.required' => 'keterangan harus di isi',
                'location.required' => 'lokasi harus di isi',
                'unit.required' => 'unit harus di isi',
            ]
        );
        Main::where('id', $request->id)
            ->update($validateData);
        return redirect('/dashboard')->with('successEdit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(main $main)
    {
        $explode = explode('/', url()->current());
        Main::find(end($explode))->delete();
        return back()->with('successDelete', 'Informasi Berhasil dihapus!');
    }
    public function print()
    {
        return view('print.index');
    }
}
