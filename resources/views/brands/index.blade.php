<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-end">
                <a href="{{ route('brands.create') }}" class="bg-blue-500 font-bold p-2 rounded-md">Crear</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-3">
                <div class="flex items-center px-4">
                    <div class='overflow-x-auto w-full'>
                        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-gray-50">
                                <tr class="text-gray-600 text-left">
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        Name
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
                                @forelse ($brands as $brand)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="text-center">
                                                    {{ $brand->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <p class="">
                                                    {{ $brand->slug }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('brands.edit', $brand->slug) }}" class="bg-blue-700 font-bold p-2 rounded-md mx-1 text-white">Editar</a>
                                            <form action="{{ route('brands.destroy', $brand->slug) }}" method="POST">
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