<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl md:w-2/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST" class="max-w-md mx-auto">
                    @csrf

                    <label for="name" class="block font-medium text-sm text-gray-700">Nombre *</label>
                    <input class="form-input w-full rounded-md shadow-sm @error('name') border-red-500 @enderror" type="text" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $errors->first('name') }}
                    </span>
                    @endif

                    <label for="size" class="block font-medium text-sm text-gray-700">Tamaño *</label>
                    <select class="form-input w-full rounded-md shadow-sm @error('size') border-red-500 @enderror"  name="size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                    </select>
                    @if ($errors->has('size'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('size') }}
                        </span>
                    @endif

                    <label for="stock" class="block font-medium text-sm text-gray-700">Stock *</label>
                    <input class="form-input w-full rounded-md shadow-sm @error('stock') border-red-500 @enderror" type="number" name="stock" value="{{ old('stock') }}">
                    @if ($errors->has('stock'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $errors->first('stock') }}
                    </span>
                    @endif

                    <label for="brand_id" class="block font-medium text-sm text-gray-700">Marca *</label>
                    <select class="form-input w-full rounded-md shadow-sm @error('brand_id') border-red-500 @enderror"  name="brand_id">
                        @forelse ($brands as $brand)
                            <option value="{{$brand->id}}">{{ $brand->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @if ($errors->has('brand_id'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('brand_id') }}
                        </span>
                    @endif

                    <label for="shipment" class="block font-medium text-sm text-gray-700">Embarque *</label>
                    <input class="form-input w-full rounded-md shadow-sm @error('shipment') border-red-500 @enderror" type="date" name="shipment" value="{{ old('shipment') }}">
                    @if ($errors->has('shipment'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $errors->first('shipment') }}
                    </span>
                    @endif

                    <label for="observations" class="block font-medium text-sm text-gray-700">Observaciones *</label>
                    <textarea class="form-input w-full rounded-md shadow-sm @error('observations') border-red-500 @enderror" name="observations">
                        {{ old('observations') }}
                    </textarea>
                    @if ($errors->has('observations'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $errors->first('observations') }}
                    </span>
                    @endif

                    <hr class="my-4">

                    <input type="submit" value="Guardar" class="bg-blue-500 font-bold p-2 rounded-md w-full my-2">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
