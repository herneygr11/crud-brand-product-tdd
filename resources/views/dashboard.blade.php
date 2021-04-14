<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center justify-center">
                    <div class="bg-white p-4 rounded w-full">
                        <h2 class="text-xl">
                            Estadísticas
                        </h2>
                        <div class="md:grid md:grid-cols-3 md:gap-4 space-y-4 md:space-y-0 mt-4">
                            <div class="shadow border rounded-lg">
                                <div class="flex items-center space-x-4 p-4">
                                    <div class="flex-1">
                                        <p class="text-gray-500 font-semibold">Total de marcas</p>
                                        <div class="flex items-baseline space-x-4">
                                            <h2 class="text-2xl font-semibold">
                                                34,567
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="block p-3 text-lg font-semibold bg-purple-50 text-purple-800 hover:bg-purple-100 cursor-pointer">
                                    Ver
                                </a>
                            </div>
                            <div class="shadow border rounded-lg">
                                <div class="flex items-center space-x-4 p-4">
                                    <div class="flex-1">
                                        <p class="text-gray-500 font-semibold">Total de productos</p>
                                        <div class="flex items-baseline space-x-4">
                                            <h2 class="text-2xl font-semibold">
                                                34,567
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="block p-3 text-lg font-semibold bg-purple-50 text-purple-800 hover:bg-purple-100 cursor-pointer">
                                    Ver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
