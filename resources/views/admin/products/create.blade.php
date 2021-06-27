@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Vytvoření nového produktu</h1>
                <form method="post" action="{{route('store_products')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Název</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="" placeholder="">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Krátký popis</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="short_des" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Popis</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="long_des" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cena</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="price" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary">Uložit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
