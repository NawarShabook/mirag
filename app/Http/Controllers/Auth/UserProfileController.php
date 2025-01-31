<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function show_delete_account()
    {
        return view('auth.delete_account');
    }

    public function delete_account(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        try {
            $user = auth()->user();
            if (Hash::check($data['password'], $user->password)) {
                $user->delete();
                return redirect()->route('home')->with('delete_success','تم حذف الحساب بنجاح');
            }
            else{
                return back()->with('errors','كلمة السر خاطئة');
            }
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }

    }
}
