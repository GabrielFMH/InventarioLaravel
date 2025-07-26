<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Views\product\list;


class ProductController extends Controller
{
    // Listar productos
    public function index()
    {
        $products = Product::all();
        return view('product.list', compact('products'));
    }

    // Agregar producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);
        Product::create($validated);
        return redirect()->route('product.list');
    }

    // Editar producto
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('product.list');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list');
    }
}
