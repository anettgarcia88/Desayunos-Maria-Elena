<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = new Producto($request->all());

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $producto->image = $imageName;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto->fill($request->all());

        if ($request->hasFile('image')) {
            if ($producto->image) {
                Storage::delete('public/images/' . $producto->image);
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $producto->image = $imageName;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->image) {
            Storage::delete('public/images/' . $producto->image);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
    public function reserve(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:0',
        ]);
  
        $producto = Producto::find($request->id);
  
  
        $producto->cantidad += $request->cantidad;
        $producto->save();
  
        return response()->json(['success' => true, 'new_quantity' => $producto->cantidad]);
    }
}
