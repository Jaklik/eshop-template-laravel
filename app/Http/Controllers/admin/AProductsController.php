<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;

class AProductsController extends Controller
{
    public function index (){
        $products = DB::table('products')->get();
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function create_product(){
        return view('admin.products.create');
    }

    public function store_product(StoreProductRequest $request){

        $validated = $request->validated();

        $product = new Product();

        $product->name = $request->input('name');
        $product->slug = Str::of($request->input('name'))->slug('-');
        if ($request->file('thumbnail_image')){
            $name = $request->file('thumbnail_image')->getClientOriginalName();
            $product->thumbnail_image = $request->file('thumbnail_image')->storeAs('products', $name, 'public');
        }
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->user_created_id = Auth::id();

        $product->save();

        return redirect('/admin/products');
    }
}
