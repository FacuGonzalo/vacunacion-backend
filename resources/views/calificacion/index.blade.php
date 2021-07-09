<title>vacuNacion | Calificaciones</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    <ul>
                        @if(count($calificaciones) == 0)
                        <label style="color: red">Aun no hay calificaciones disponibles</label>
                        @else
                            @foreach($calificaciones as $calificacion)
                            <li>
                                <b>{{$calificacion->post_by}}</b> dice:
                                <br>
                                <b>Estrellas:</b> {{$calificacion->stars}}
                                <br>
                                <b>Tiempo de espera:</b> {{$calificacion->waiting}} hs
                                <br>
                                <b>Comentarios:</b> {{$calificacion->comment}}
                                <br>
                                <hr />
                                <br>
                                @if (Auth::user()->role === "moderador")
                                <form action="{{route('calificacion.destroy', $calificacion)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="color:red; font-weight: bold">Eliminar calificacion</button>
                                </form>
                                @endif
                            </li>
                            @endforeach
                        @endif
                        <br>
                        <a href="{{route('centro.index')}}"><button style="font-weight: bold">Volver</button></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>