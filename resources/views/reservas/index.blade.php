<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Codigo de vuelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-100 whitespace-nowrap">
                        {{$reserva->vuelo_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$reserva->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reserva->vuelo->salida->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reserva->vuelo->llegada->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reserva->vuelo->salida}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reserva->vuelo->llegada}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
