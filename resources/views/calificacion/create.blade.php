<title>vacuNacion | Cargar calificacion</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Ingrese su calificacion

                    <br>
                    <br>
                    <hr />
                    <form action="{{route('calificacion.store', $centro)}}" method="POST">

                        @csrf

                        <br>
                        <label>
                            <b>Estrellas</b>
                            <br>
                            <input type="radio" id="1" name="stars" value="1">
                            <label for="1">1</label>
                            <input type="radio" id="2" name="stars" value="2">
                            <label for="2">2</label>
                            <input type="radio" id="3" name="stars" value="3">
                            <label for="3">3</label>
                            <input type="radio" id="4" name="stars" value="4">
                            <label for="4">4</label>
                            <input type="radio" id="5" name="stars" value="5">
                            <label for="5">5</label>
                        </label>
                        @error('stars')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                        @enderror
                        <br>
                        <br>
                        <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="post_by" :value="__('Ingrese su nombre')" />
                                    <x-input id="post_by" class="block mt-1 w-full" type="text" name="post_by" value="{{old('post_by')}}" autofocus />
                                    @error('post_by')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror   
                                </div>
                                <div>
                                    <x-label for="waiting" :value="__('Tiempo de espera (En HS, en caso de ser menos de 1 hora complete con un 0)')" />
                                    <x-input id="waiting" class="block mt-1 w-full" type="text" name="waiting" value="{{old('waiting')}}" autofocus />
                                    @error('waiting')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                
                                <div>
                                    <x-label for="comment" :value="__('Comentarios')" />
                                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" value="{{old('comment')}}" autofocus />
                                    @error('comment')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                        </div>
                        <br>
                        <br>
                        <hr />
                        <br>
                        <button class="bg-green-400 hover:bg-green-100 text-white-800 font-bold py-3 px-6 border border-gray-400 rounded shadow" type="submit">Cargar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>