<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Models\Product;
//use PhpParser\Builder\Function;

class ProductController extends Controller
{

    public Function Index (Request $request)

        {
            // $users =\App\Models\User::pagination(10);
            $products= DB::table('products')
            ->when($request->input('name'), function ($query, $name) {
             return $query->where('name','like','%' . $name . '%');
            })
            ->orderBy('id', 'desc')
             ->paginate(10);
             return view('pages.products.index', compact('products'));

    }

    public Function Create ()
    {

     return view('pages.products.create');
    }




    public function store(Request $request)
    {

         //dd($request->all());
         $request->validate([
            'name' => 'required|min:3|unique:products',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|in:food,drink,snack',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/storage/products', $filename);
        $data = $request->all();

        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category = $request->category;
        $product->image = $filename;
        $product->save();

            return redirect()->route('products.index')->with('success', 'Product Success');
    }
    public function edit($id)
    {

        $product = \App\models\Product::FindOrFail($id);
        return view('pages.products.edit', compact ('product'));
    }
    public function update(Request $request, $id)
    {

        //dd($request->all());
        $data = $request->all();
        //$data = $request->validated();
        //$data['password'] = Hash::make($request->password);
        $product = \App\models\Product::FindOrFail($id);
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product Success');
    }

    public function destroy($id)
    {

        //dd($request->all());
        //$data = $request->all();
        //$data['password'] = Hash::make($request->password);
        $product = \App\models\Product::FindOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Success');
    }
}
