<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form method="post" action="{{ route('inventories.update', $product) }}" enctype="multipart/form-data">
                              @method('put')
                              @csrf
                                <div class="form-group row mb-1">
                                    <label for="InventoryStock"
                                        class="col-sm-3 col-form-label">{{ __('InventoryStock') }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="InventoryStock"
                                            name="InventoryStock" placeholder="{{ __('InventoryStock') }}"
                                            value="{{ $product->InventoryStock }}">
                                        @error('InventoryStock')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductName"
                                        class="col-sm-3 col-form-label">{{ __('ProductName') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ProductName" name="ProductName"
                                            placeholder="{{ __('ProductName') }}" value="{{ $product->ProductName }}">
                                        @error('ProductName')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductPurchasePrice"
                                        class="col-sm-3 col-form-label">{{ __('ProductPurchasePrice') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ProductPurchasePrice"
                                            name="ProductPurchasePrice" placeholder="{{ __('ProductPurchasePrice') }}"
                                            value="{{ $product->ProductPurchasePrice }}">
                                        @error('ProductPurchasePrice')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductImage"
                                        class="col-sm-3 col-form-label">{{ __('ProductImage') }}</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="ProductImage" name="ProductImage"
                                            placeholder="{{ __('ProductImage') }}"
                                            value="{{ $product->ProductImage }}">
                                        @error('ProductImage')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="EntryDate"
                                        class="col-sm-3 col-form-label">{{ __('EntryDate') }}</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="EntryDate" name="EntryDate"
                                            placeholder="{{ __('EntryDate') }}"
                                            value="{{ old('EntryDate', $product->EntryDate) }}">
                                        @error('EntryDate')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ExpirationDate"
                                        class="col-sm-3 col-form-label">{{ __('ExpirationDate') }}</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="ExpirationDate"
                                            name="ExpirationDate" placeholder="{{ __('ExpirationDate') }}"
                                            value="{{ old('ExpirationDate', $product->ExpirationDate) }}">
                                        @error('ExpirationDate')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    @php
                                        $alimentos = $product->ProductCategory == 'AL' ? 'selected' : '';
                                        $arenaGatos = $product->ProductCategory == 'AG' ? 'selected' : '';
                                        $farmacia = $product->ProductCategory == 'FM' ? 'selected' : '';
                                        $peluqueria = $product->ProductCategory == 'PL' ? 'selected' : '';
                                        $accesorios = $product->ProductCategory == 'AC' ? 'selected' : '';
                                        $mobiliarios = $product->ProductCategory == 'MB' ? 'selected' : '';
                                    @endphp
                                    <label for="ProductCategory"
                                        class="col-sm-3 col-form-label">{{ __('ProductCategory') }}</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="ProductCategory" id="Categoria">
                                            <option value="">{{ __('ProductCategory') }}</option>
                                            <option value="AL" {{ $alimentos }}>Alimentos</option>
                                            <option value="AG" {{ $arenaGatos }}>Arena de gatos</option>
                                            <option value="FM" {{ $farmacia }}>Farmacia</option>
                                            <option value="PL" {{ $peluqueria }}>Peluqueria</option>
                                            <option value="AC" {{ $accesorios }}>Accesorios</option>
                                            <option value="MB" {{ $mobiliarios }}>Mobiliarios</option>
                                        </select>
                                        @error('ProductCategory')
                                            <small><strong class="text-danger">*{{ $message }}</strong></small><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mx-auto">
                                        <button type="submit" class="btn btn-success">{{ __('Edit product') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
