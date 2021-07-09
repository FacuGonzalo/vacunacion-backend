<title>vacuNacion | Editar {{$centro->center_name}}</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Ingrese los datos correspondientes para editar <b>{{$centro->center_name}}</b>

                    <br>
                    <br>
                    <hr />
                    <form action="{{route('centro.update', $centro)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="grid gap-4">
                                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg sm:rounded-lg">
                                    <b><font size=2>Puede actualizar la imagen desde aqui</font></b>
                                    <br><br>
                                    <input type="file" name="imagen" accept="image/*" class="bg-blue-300 hover:bg-blue-700 text-black font-bold py-1 px-2 rounded shadow-lg" autofocus />
                                    <br>
                                    @error('imagen')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="center_name" :value="__('Nombre')" />
                                    <x-input id="center_name" class="block mt-1 w-full" type="text" name="center_name" value="{{old('center_name', $centro->center_name)}}" autofocus />
                                    @error('center_name')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="center_adress" :value="__('Direccion')" />
                                    <x-input id="center_adress" class="block mt-1 w-full" type="text" name="center_adress" value="{{old('center_adress', $centro->center_adress)}}" autofocus />
                                    @error('center_adress')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="center_phone" :value="__('Telefono')" />
                                    <x-input id="center_phone" class="block mt-1 w-full" type="text" name="center_phone" value="{{old('center_phone', $centro->center_phone)}}" autofocus />
                                    @error('center_phone')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="center_area" :value="__('Zona')" />
                                    <x-input id="center_area" class="block mt-1 w-full" type="text" name="center_area" value="{{old('center_area', $centro->center_area)}}" autofocus />
                                    @error('center_area')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="center_timetable" :value="__('Horario')" />
                                    <x-input id="center_timetable" class="block mt-1 w-full" type="text" name="center_timetable" value="{{old('center_timetable', $centro->center_timetable)}}" autofocus />
                                    @error('center_timetable')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="latitud" :value="__('Latitud')" />
                                    <x-input id="latitud" class="block mt-1 w-full" type="text" name="latitud" value="{{old('latitud', $centro->latitud)}}" autofocus />
                                    @error('latitud')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="longitud" :value="__('Longitud')" />
                                    <x-input id="longitud" class="block mt-1 w-full" type="text" name="longitud" value="{{old('longitud', $centro->longitud)}}" autofocus />
                                    @error('longitud')
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
                        <button class="bg-green-400 hover:bg-green-100 text-white-800 font-bold py-3 px-6 border border-gray-400 rounded shadow" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>