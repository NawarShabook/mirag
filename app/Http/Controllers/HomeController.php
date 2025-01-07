<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\HeavyMachine;
use App\Models\Workshop;
use App\Models\MaintenanceService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::latest()->take(4)->get();
        $heavy_machines=HeavyMachine::latest()->get();
        $workshops = Workshop::latest()->get();
        $maintenance_services = MaintenanceService::latest()->get();

        $cities = config('global_data.cities');
        $property_types = config('global_data.property_types');
        $sector_codes = config('global_data.sector_codes');
        $block_numbers = config('global_data.block_numbers');
        return view('index',compact('posts','heavy_machines','workshops','maintenance_services',
         'cities', 'property_types', 'sector_codes', 'block_numbers' ));
    }

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
