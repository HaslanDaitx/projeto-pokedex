@extends('layouts.base')

@section('content')
<div class="container mt-0">
    <form class="mx-auto bg-white mt-2 px-5" action="{{ url('pokemon') }}" method="POST" enctype="multipart/form-data"
        style="border-radius:10px; width:800px; margin-left:350px;">
        @csrf
        <div class="mb-5 mx-auto">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900"
                style="margin-top: 80px; padding-top:10px;">Nome do Pokémon:</label>
            <input type="text" name="nome" id="nome"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="tipo" class="block mb-2 text-sm font-medium text-white">Tipo:</label>
            <input type="text" name="tipo" id="tipo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="pontos_de_poder" class="block mb-2 text-sm font-medium text-white">Poder:</label>
            <input type="text" name="pontos_de_poder" id="pontos_de_poder"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-white">Imagem:</label>
            <input type="file" name="image" id="image"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="trainer_id" class="block mb-2 text-sm font-medium text-white">Trainer:</label>
            <select name="trainer_id" id="trainer_id">
                <option value="">Selecione um treinador:</option>
                @foreach ($trainers as $trainer)
                <option value="{{$trainer->id}}">{{$trainer->nome}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Criar
            Pokémon</button>
    </form>
</div>
@endsection