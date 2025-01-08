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


    private function get_user_orders(string $order_type, $user_id)
    {
        return \App\Models\Order::whereNotNull($order_type.'_id')
        ->where('user_id',$user_id)
        ->where('status','!=','cancelled')
        ->get(['id','status',$order_type.'_id','created_at']);
    }
}
