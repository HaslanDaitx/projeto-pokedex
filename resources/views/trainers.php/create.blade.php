@extends('layouts.base')

@section('content')
<div class="container mt-0">
    <form class="mx-auto bg-white mt-2 px-5" action="{{ url('trainers') }}" method="POST" enctype="multipart/form-data"
        style="border-radius:10px; width:800px; margin-left:350px;">
        @csrf
        <div class="mb-5 mx-auto">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900"
                style="margin-top: 80px; padding-top:10px;">Name do Trainer:</label>
            <input type="text" name="nome" id="nome"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-white">Imagem:</label>
            <input type="file" name="image" id="image"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <br>
        <button type="submit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Criar
            Trainer</button>
    </form>
</div>
@endsection