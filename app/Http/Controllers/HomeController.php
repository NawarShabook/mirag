<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\HeavyMachine;
use App\Models\Workshop;
use App\Models\MaintenanceService;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('admin_overview');
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

        $settings_info = config('global_data.settings_info');
        $settings = \App\Models\Setting::all();

        foreach ($settings as $setting){
            $settings_info[$setting->key] = $setting->value;
        }

        return view('index',
        compact('posts','heavy_machines','workshops','maintenance_services','settings_info',
         'cities', 'property_types', 'sector_codes', 'block_numbers' ));
    }

    public function admin_overview()
    {
        $orders_type = config('global_data.orders_type');

        $orders = array();
        $categories = array();
        foreach ($orders_type as $type) {
            $type_orders = \App\Models\Order::whereNotNull($type.'_id')
            ->where('status', '!=', 'cancelled')->count();
            $orders[$type] = $type_orders;

            $type_array = explode('_', $type);

            $type_model = count($type_array)==1 ? $type_array = ucfirst($type_array[0]) : ucfirst($type_array[0]) . ucfirst($type_array[1]);
            $modelClass = "\\App\\Models\\$type_model";
            $categories[$type] = $modelClass::count();
        }

        return view('admin_overview',compact('orders','categories'));

    }
    public function mobile_app_download()
    {
        return view('mobile_app_download');
    }
    public function download_app()
    {

        $filePath = public_path('download/Mirag.apk');

        if (!File::exists($filePath)) {
            abort(404, 'APK not found');
        }

        return response()->download($filePath, 'Mirag.apk', [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);


    }
}
