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
