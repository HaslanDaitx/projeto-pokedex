<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nome'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gifmwebp|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $trainer = new Trainer();
        $trainer->nome = $request->nome;
        $trainer->image = 'images/'.$imageName;
        $trainer->save();

        return redirect('trainers')->with('success', 'treinador created successfully.');
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->update($request->all());

        $trainer->nome = $request->nome;
        
        if(!is_null($request->image))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $trainer->image = 'images/'.$imageName;
        }
        $trainer->save();
        
        return redirect('trainers')->with('success', 'Trainer updated successfully.');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
        return redirect('trainers')->with('success', 'Trainer deleted successfully.');
    }
}