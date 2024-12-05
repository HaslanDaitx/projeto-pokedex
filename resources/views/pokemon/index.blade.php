@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($pokemon as $bolsomostro)
    <div class="bg-white p-4 rounded shadow-md flex flex-col items-center text-center">
        <img src="{{asset('ponto_de_poder/' . $bolsomostro->image)}}" alt="imagemPokemon" class="w-48
        <h3 class=" text-xl font-bold">{{ $bolsomostro->nome }}</h3>
        <p class="text-gray-700">{{ $bolsomostro->tipo }}</p>
        <p class="text-gray-500">Pontos de Poder: {{ $bolsomostro->ponto_de_poder }}</p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ url('pokemon/'.$bolsomostro->id.'/edit') }}"
                class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Editar</a>
            <form action="{{ url('pokemon/'.$bolsomostro->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Apagar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection