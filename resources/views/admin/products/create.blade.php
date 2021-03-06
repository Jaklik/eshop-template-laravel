@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h1>Vytvoření nového produktu</h1>
                <form method="post" action="{{ route('store_products') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Název</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="product_name"
                            name="name" value="{{ old('name') }}" aria-describedby="" placeholder="">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbnail_image">Náhledový obrázek</label>
                        <input type="file" class="form-control-file @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image" id="thumbnail_image">
                    </div>
                    @error('thumbnail_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="product_short_description">Krátký popis</label>
                        <textarea id="product_short_description"
                            class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                            rows="3">{{ old('short_description') }}</textarea>
                    </div>
                    @error('short_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="product_description">Popis</label>
                        <textarea id="product_description" class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="product_price">Cena</label>
                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror"
                            id="product_price" name="price" value="{{ old('price') }}" placeholder="">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Uložit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
