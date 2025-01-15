<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        $orders_type = config('global_data.orders_type');

        $user_orders = [];
        foreach ($orders_type as $type) {
            $user_orders[$type] = $this->get_user_orders($type,$user->id);
        }

        return view('auth.profile', compact('user','user_orders'));
    }

    private function get_user_orders(string $order_type, $user_id)
    {
        return \App\Models\Order::whereNotNull($order_type.'_id')
        ->where('user_id',$user_id)
        ->where('status','!=','cancelled')
        ->get(['id','status',$order_type.'_id','created_at']);
    }
}
