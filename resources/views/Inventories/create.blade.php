<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form method="post" action="{{route('inventories.store')}}">
                                @csrf
                                <div class="form-group row mb-1">
                                    <label for="ProductCode" class="col-sm-3 col-form-label">{{__('ProductCode')}}</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ProductCode" name="ProductCode" placeholder="{{__('ProductCode')}}" value="{{ old('ProductCode') }}">
                                    @error('ProductCode')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductName" class="col-sm-3 col-form-label">{{__('ProductName')}}</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="{{__('ProductName')}}" value="{{ old('ProductName') }}">
                                    @error('ProductName')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductDescription" class="col-sm-3 col-form-label">{{__('ProductDescription')}}</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ProductDescription" name="ProductDescription" placeholder="{{__('ProductDescription')}}" value="{{ old('ProductDescription') }}">
                                    @error('ProductDescription')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="PurchaseDate" class="col-sm-3 col-form-label">{{__('PurchaseDate')}}</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" id="PurchaseDate" name="PurchaseDate" placeholder="{{__('PurchaseDate')}}" value="{{ old('PurchaseDate') }}">
                                    @error('PurchaseDate')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ExpirationDate" class="col-sm-3 col-form-label">{{__('ExpirationDate')}}</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" id="ExpirationDate" name="ExpirationDate" placeholder="{{__('ExpirationDate')}}" value="{{ old('ExpirationDate') }}">
                                    @error('ExpirationDate')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="InventoryStock" class="col-sm-3 col-form-label">{{__('InventoryStock')}}</label>
                                    <div class="col-sm-9">
                                    <input type="number" class="form-control" id="InventoryStock" name="InventoryStock" placeholder="{{__('InventoryStock')}}" value="{{ old('InventoryStock') }}">
                                    @error('InventoryStock')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="ProductPrice" class="col-sm-3 col-form-label">{{__('ProductPrice')}}</label>
                                    <div class="col-sm-9">
                                    <input type="number" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="{{__('ProductPrice')}}" value="{{ old('ProductPrice') }}">
                                    @error('ProductPrice')<small><strong>*{{ $message }}</strong></small><br>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">{{__('Add product')}}</button>
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
