<title>vacuNacion | {{$centro->center_name}}</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$centro->center_name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Este es el centro de vacunacion:
                    <br>
                    <br>
                    <b>Nombre: {{$centro->center_name}}</b>
                    <br>
                    <b>Direccion:</b> {{$centro->center_adress}}
                    <br>
                    <b>Telefono:</b> {{$centro->center_phone}}
                    <br>
                    <b>Zona:</b> {{$centro->center_area}}
                    <br>
                    <b>Horario:</b> {{$centro->center_timetable}}
                    <br>
                    <br>
                    <img src="data:image/png;base64,{{$imagen}}" width="300" height="400"/>
                    <br>
                    <br>
                    <hr />
                    <br>
                    <a class="container mx-auto bg-white text-black font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-blue-dark hover:border-blue rounded" href="{{route('calificacion.index', $centro)}}">Ver calificaciones</a>
                    @if (Auth::user()->role === "admin")
                    <a class="container mx-auto bg-white text-black font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-blue-dark hover:border-blue rounded" href="{{route('calificacion.create', $centro)}}">Agregar calificacion</a>
                    <a class="container mx-auto bg-white text-black font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-blue-dark hover:border-blue rounded" href="{{route('centro.edit', $centro)}}">Editar centro</a>
                    @endif
                    <br>
                    <br>
                    <hr />
                    <br>
                    @if (Auth::user()->role === "admin")
                    <form action="{{route('centro.destroy', $centro)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-400 hover:bg-red-100 text-black-800 font-bold py-3 px-6 border border-gray-400 rounded shadow">Eliminar centro</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>