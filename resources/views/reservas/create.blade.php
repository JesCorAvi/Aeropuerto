<x-app-layout>
    <form action="">

        <form action="" method="POST">
            @csrf
            <h1>Reservar vuelo</h1>
            <p>{{$vuelo->aeropuertoSalida->nombre}} // {{$vuelo->aeropuertoLlegada->nombre}}</p>
        </form>
</x-app-layout>
