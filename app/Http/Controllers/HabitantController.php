<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitant;
use App\Models\Ville;


class HabitantController extends Controller
{

    public function index()
    {
        $habitants = Habitant::all();
        return view('index', compact('habitants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Habitant::create([
            'cin' => $request->input('cin'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'ville_id' => $request->input('ville_id')
        ]);

        return redirect()->route('habitants.index')->with('success', 'Habitant ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $habitant = Habitant::find($id);
        return view('edit', compact('habitant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $habitant = Habitant::find($id);

        $habitant->update([
            'cin' => $request->input('cin'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'ville_id' => $request->input('ville_id')
        ]);

        return redirect()->route('habitants.index')->with('success', 'Habitant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $habitant = Habitant::find($id);
        $habitant->delete();
        return redirect()->route('habitants.index')->with('success', 'Habitant supprimé avec succès');
    }
}
