@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Editar Pokémon</h2>
    <form action="{{ url('pokemon/' . $pokemon->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="nome" class="block text-sm font-medium">Nome</label>
            <input type="text" name="nome" value="{{ $pokemon->nome }}"
                class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div>
            <label for="tipo" class="block text-sm font-medium">Tipo</label>
            <input type="text" name="tipo" value="{{ $pokemon->tipo }}"
                class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div>
            <label for="ponto_de_poder" class="block text-sm font-medium">Ponto de Poder</label>
            <input type="number" name="ponto_de_poder" value="{{ $pokemon->ponto_de_poder }}"
                class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-black py-2 px-4 rounded">Editar
            Pokémon</button>
    </form>
</div>
@endsection