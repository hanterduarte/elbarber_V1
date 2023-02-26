<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
       // return view('orders.index', ['orders' => $orders,'products' => $products ]);
    }

    public function create()
    {

        $products = Product::all();
        $orders = Order::all();

        return view('orders.create', ['orders' => $orders,'products' => $products ]);
       // return view('orders.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->id_products = $request->input('id_products');
        //$order->total_amount = $request->input('total_amount');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->total_amount = $request->input('total_amount');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}