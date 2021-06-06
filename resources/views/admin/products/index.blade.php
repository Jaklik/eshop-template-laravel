@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Produkty</h1>
                <ul>
                    @foreach($products as $product)
                    <li>{{$product->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
