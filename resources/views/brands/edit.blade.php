<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('brands.update', $brand->slug) }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    @method("PUT")
                    <label for="name" class="block font-medium text-sm text-gray-700">Nombre *</label>
                    <input class="form-input w-full rounded-md shadow-sm @error('name') border-red-500 @enderror" type="text" name="name" value="{{ old('name', $brand->name) }}">
                    @if ($errors->has('name'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $errors->first('name') }}
                    </span>
                    @endif

                    <hr class="my-4">

                    <input type="submit" value="Guardar" class="bg-blue-500 font-bold p-2 rounded-md">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>