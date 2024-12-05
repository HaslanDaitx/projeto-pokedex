<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
        public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('pokemon.create', compact('trainers'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nome'=>'required',
            'tipo'=>'required',
            'pontos_de_poder'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gifmwebp|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $pokemon = new Pokemon();
        $pokemon->nome = $request->nome;
        $pokemon->tipo = $request->tipo;
        $pokemon->pontos_de_poder = $request->pontos_de_poder;
        $pokemon->image = 'images/'.$imageName;
        $pokemon->trainer_id = $request->trainer_id;
        $pokemon->save();

        return redirect('pokemon')->with('success', 'pokemon created successfully.');
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $trainers = Trainer::all();
        return view('pokemon.edit', compact('pokemon', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());

        $pokemon->nome = $request->nome;
        $pokemon->tipo = $request->tipo;
        $pokemon->pontos_de_poder = $request->pontos_de_poder;
        
        if(!is_null($request->image))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $pokemon->image = 'images/'.$imageName;
        }
        $pokemon->save();
        
        return redirect('pokemon')->with('success', 'Pokémon updated successfully.');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect('pokemon')->with('success', 'Pokémon deleted successfully.');
    }
}