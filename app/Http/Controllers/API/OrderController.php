<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index' ,'show']);
        // $this->middleware('auth')->only(['show' ,'index']);
        $this->middleware('auth:sanctum');
        // $this->middleware(['isAdmin'])->except(['index','show']);

    }

    public function user_orders()
    {
        $user = auth()->user();

        $orders_type = config('global_data.orders_type');

        $user_orders = [];
        foreach ($orders_type as $type) {
            $user_orders[$type] = $this->get_user_orders($type,$user->id);
            // return $user_orders[$type];

        }

        return $user_orders;
    }

    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            Order::create($data);
            return response()->json([
                'message' => 'Success',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error',
            ], 422);
        }

    }

    public function cancel_order($order_id)
    {
        $order = Order::findOrFail($order_id);
        if($order->user_id!==auth()->user()->id)
        {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }
        try {
            $order->status = 'cancelled';
            $order->save();
            return response()->json([
                'message' => 'Success.',
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Error.',
            ], 404);
        }
    }

    private function get_user_orders(string $order_type, $user_id)
    {
        $status_map = ['waiting'=>2, 'accepted'=>3, 'completed'=>4];
        return \App\Models\Order::whereNotNull($order_type . '_id')
        ->where('user_id', $user_id)
        ->where('status', '!=', 'cancelled')
        ->with("$order_type:id,name")
        ->orderBy('created_at')
        ->orderBy('status')
        ->get(['id', 'status', $order_type . '_id', 'created_at'])
        ->map(function ($order) use ($status_map, $order_type) {
            return [
                'id' => $order->id,
                'created_at' => $order->created_at,
                'status' => $order->status,
                'status_number' => $status_map[$order->status],
                $order_type . '_id' => $order->$order_type->id ?? null,
                $order_type . '_name' => $order->$order_type->name ?? null,
            ];
        });

    }
}
