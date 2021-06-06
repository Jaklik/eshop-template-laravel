<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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

    public function store_product(Request $request){
        $product = new Product();

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->short_description = $request->input('short_des');
        $product->description = $request->input('long_des');
        $product->price = $request->input('price');

        $product->user_created_id = Auth::id();

        $product->save();

        return redirect('/admin/products');
    }
}
