<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
    
        //
        $products = Product::latest()->paginate(5);

        

        return view('products.index',compact('products'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View

    {
        
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse  
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image' => 'required|mimes:jpeg,jpg,gif,png|max:2048',
            'ratings'=>'required',
           
           
        ]);
          
        $image = time()."_".$request->image->extension();
        $request->image->move(public_path('uploads'),$image);

        product::create([
            "name" => $request->input('name'),
            "description"=>$request->input('description'),
            "price"=>$request->input('price'),
            "ratings"=>$request->input('ratings'),
            $image]);

        return redirect()->route('products.index')
                         ->with('success','U have created ur new product');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product) :View
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product) :View
    {
     return view('products.edit',compact('product'));     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product):RedirectResponse
    {
        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success','U have created ur new product');

       
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success','u have successfully deleted the product');
    }
}
