<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('orders.form', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $order = new Order;
        //$order->data = $request->data;
        $order->preco = $request->preco;
        $order->save();

        $order->products()->attach($request->produtos);

        return redirect()->route('orders.index')->with('success', 'Venda criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();

        return view('orders.form', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        //$order->data = $request->data;
        $order->preco = $request->preco;
        $order->save();

    $order->products()->sync($request->produtos);

    return redirect()->route('orders.index')->with('success', 'Venda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Venda excluída com sucesso.');
    }

    public function searchProducts(Request $request)
{
    $products = Product::where('name', 'LIKE', '%'.$request->term.'%')->get();

    $formatted_products = [];

    foreach ($products as $product) {
        $formatted_products[] = [
            'id' => $product->id,
            'text' => $product->name,
            'price' => $product->price
        ];
    }

    return response()->json($formatted_products);
}
}
