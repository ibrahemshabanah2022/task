<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $products = Product::get();

        return view('home', ['products' => $products]);
    }

    public function create(Request $request)
    {


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' =>  $request->description,
        ]);



        return redirect()->route('product.index');
    }
}
