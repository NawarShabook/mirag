<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function global_data()
    {
        $global_data=[];
        $global_data['cities'] = config('global_data.cities');
        $global_data['property_types'] = config('global_data.property_types');
        $global_data['sector_codes'] = config('global_data.sector_codes');
        $global_data['block_numbers'] = config('global_data.block_numbers');

        return $global_data;
    }
    public function maintenance_services_index()
    {
        $maintenance_services = \App\Models\MaintenanceService::all();
        return $maintenance_services;
    }
    public function workshops_index()
    {
        $maintenance_services = \App\Models\Workshop::all();
        return $maintenance_services;
    }
    public function heavy_machines_index()
    {
        $heavy_machines = \App\Models\HeavyMachine::all();
        return $heavy_machines;
    }
}
