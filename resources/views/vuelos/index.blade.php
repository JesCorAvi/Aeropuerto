<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Aeropuerto de origen/destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Compañía aérea
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de salida/llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asientos disponibles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($vuelos as $vuelo)

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">

                    <td class="px-6 py-4">
                        {{$vuelo->aeropuertoLlegada->nombre}} // {{$vuelo->aeropuertoSalida->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vuelo->compañia->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vuelo->salida}} // {{$vuelo->llegada}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vuelo->precio}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vuelo->asientosDisponibles()}}
                    </td>
                    <td class="px-6 py-4">
                        <a href={{route('reservas.create', ['vuelo' => $vuelo])}} class="font-medium text-blue-600 hover:underline">Reservar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
