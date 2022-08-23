<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\dish;
use App\Models\menu;
use App\Models\restaurant;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::all();

        return view('order.index', ['orders' => $orders]);
    }

    public function confirmOrder(Request $request, order $order)
    {
        $order->status = 1;

        $order->save();

        return redirect()->route('orders-index')->with('success', 'Order confirmed!');
    }

    public function cancelOrder(Request $request, order $order)
    {
        $order->status = -1;

        $order->save();

        return redirect()->route('orders-index')->with('success', 'Order canceled!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        $menus = Menu::all();

        return view('order.create', ['restaurants' => $restaurants, 'dishes' => $dishes, 'menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;

        $order->dish_id = $request->create_order_dish_id;
        $order->count = $request->create_order_count;
        $order->user_id = Auth::user()->id;

        $order->save();

        return redirect()->route('orders-index')->with('success', 'Created new order!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
