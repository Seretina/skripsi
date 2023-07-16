<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = Kriteria::orderBy('id','asc')->paginate(10);
        foreach($kriterias as $kriteria){
            $bobot = $kriteria->weight / 100;
            $kriteria->bobot = $bobot;
            // dd($bobot);
        }
        return view('admin.kriteria.index',[
            'kriterias'=> $kriterias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
        ]);

        $kriterias = new Kriteria;
        $kriterias->name = $request->name;
        $kriterias->weight = $request->weight;
        DB::transaction(function () use ($kriterias) {
            $kriterias->save();
        });
        return redirect()
            ->route('admin.kriteria.index')
            ->with([
                'success_message', 'Successfully Created Kriteria! '
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria, $kriteriaId)
    {
        $kriteria = Kriteria::where('id', $kriteriaId)->first();
        return view('admin.kriteria.show', [
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
        ]);

        $kriterias = Kriteria::find($id);
        $kriterias->name = $request->name;
        $kriterias->weight = $request->weight;
        DB::transaction(function () use ($kriterias) {
            $kriterias->save();
        });
        return redirect()
            ->route('admin.kriteria.index')
            ->with([
                'success_message', 'Successfully Created Kriteria! '
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
  /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria, Request $request)
    {
        $kriteria = Kriteria::find($request->id);
        DB::transaction(function () use ($kriteria) {
            $kriteria->delete();
        }, 5);

        return redirect()
            ->route('admin.kriteria.index')
            ->with('success_message', 'Successfully Delete Kriteria! ');
    }
}
