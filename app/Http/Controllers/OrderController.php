<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index' ,'show']);
        // $this->middleware('auth')->only(['show' ,'index']);
        $this->middleware('auth');
        $this->middleware(['isAdmin'])->except(['store','cancel_order']);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $workshops = Order::where('workshop_id',true)->latest()->get('status');
        // $maintenance_services = Order::where('maintenance_service_id',true)->latest()->get('status');
        // $heavy_machines = Order::where('heavy_machine_id',true)->latest()->get('status');

        $orders_type = config('global_data.orders_type');
        $order_status = config('global_data.order_status');

        $order_status_counts = [];
        foreach ($orders_type as $type) {
            foreach ($order_status as $status) {
                $order_status_counts[$type.'_'.$status] = $this->get_order_status_count($type, $status);
            }
        }

        return view('orders.index', compact('order_status_counts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            Order::create($data);
            return back()->with('success','success');
        } catch (\Throwable $th) {
            return back()->with('errors', $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $order_type, string $status)
    {
        $orders_type = config('global_data.orders_type');
        $order_status = config('global_data.order_status');

        if (!in_array($order_type, $orders_type) || !in_array($status, $order_status)){

            return back()->with('errors', 'error arguments are not valid');
        }

        $orders = Order::whereNotNull($order_type.'_id')
        ->where('status', $status)->get();
        // dd($orders);

        return view("orders.$status", compact('orders','order_type'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order_status = config('global_data.order_status');

        $request->validate([
            'status' => ['required', Rule::in($order_status)],
        ]);
        try {
            $order->status = $request->status;
            $order->save();
            return back()->with('success', 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('errors', $th->getMessage());
        }

    }

    public function cancel_order($order_id)
    {
        $order = Order::findOrFail($order_id);
        if($order->user_id!==auth()->user()->id)
        {
            return back()->with('errors', ('errors'));
        }
        try {
            $order->status = 'cancelled';
            $order->save();
            return back()->with('success', 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    private function get_order_status_count(string $order_type, string $status)
    {

        return Order::whereNotNull($order_type.'_id')
        ->where('status', $status)
        ->count();
    }
}