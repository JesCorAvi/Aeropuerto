<x-app-layout>
    <form action="{{route('reservas.store')}}" method="POST">
            @csrf
            <h1>Reservar vuelo</h1>
            <p>{{$salida}} // {{$llegada}}</p>
            <input type="hidden" name="vuelo_id" value="{{$vuelo_id}}">
            <select name="plaza">
                @for ($n = 1; $n <= $plazas; $n++)
                    @if (!$arrayFila->contains('campo', $n))
                        <option value="{{$n}}" >{{$n}}</option>
                    @endif
                @endfor (;)
            </select>
            <p>Precio: {{$precio}}</p>
            <button>Reservar</button>
        </form>
</x-app-layout>
