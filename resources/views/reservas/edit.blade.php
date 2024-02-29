<x-app-layout>
    <form action="{{route('reservas.update', $reserva)}}" method="POST">
            @csrf
            @method("PUT")
            <h1>Editar reserva</h1>
            <p>{{$reserva->vuelo->aeropuertoSalida->nombre}} // {{$reserva->vuelo->aeropuertoLlegada->nombre}}</p>
            <input type="hidden" name="vuelo_id" value="{{$reserva->vuelo->vuelo_id}}">
            <p>Asiento anterior: {{$reserva->plaza}}</p>
            <select name="plaza">
                @for ($n = 1; $n <= $reserva->vuelo->plazas; $n++)
                    @if (!$arrayFila->contains('campo', $n) && $n != $reserva->plaza)
                        <option value="{{$n}}" >{{$n}}</option>
                    @endif
                @endfor (;)
            </select>
            <p>Precio: {{$reserva->vuelo->precio}}</p>
            <button>Reservar</button>
        </form>
</x-app-layout>
