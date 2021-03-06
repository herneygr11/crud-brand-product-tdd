<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-end">
                <a href="{{ route('products.create') }}" class="bg-blue-500 font-bold p-2 rounded-md">Crear</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-3">
                <div class="flex items-center px-4">
                    <div class='overflow-x-auto w-full'>
                        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-gray-50">
                                <tr class="text-gray-600 text-left">
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Nombre
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Marca
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Talla
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Stock
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Embarque
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        slug
                                    </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($products as $product)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ $product->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ $product->brand->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ $product->size }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ $product->stock }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ \Carbon\Carbon::parse($product->shipment)->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="">
                                                    {{ $product->slug }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('products.edit', $product->slug) }}" class="bg-blue-700 font-bold p-2 rounded-md mx-1 text-white">Editar</a>
                                            <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="bg-red-500 font-bold p-2 rounded-md mx-1 text-white">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
