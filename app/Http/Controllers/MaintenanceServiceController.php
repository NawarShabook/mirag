<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class MaintenanceServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maintenance_services = MaintenanceService::latest()->get();
        return view('maintenance_services.create',compact('maintenance_services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $image = $request->file('image');
            $newImageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/maintenance_services', $newImageName, 'public'); // Use Laravel's storage system
            //mass assignment
            MaintenanceService::create([
                'name' => $request->name,
                'image' => 'storage/' . $imagePath,
            ]);
            return back()->with('success','');

        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MaintenanceService $maintenanceService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceService $maintenanceService)
    {
        return view('maintenance_services.edit', ['service' => $maintenanceService]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintenanceService $maintenanceService)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle image upload if provided
            if ($request->hasFile('image')) {
                if ($maintenanceService->image && File::exists(public_path($maintenanceService->image))) {
                    File::delete(public_path($maintenanceService->image));
                }
                $image = $request->file('image');
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('uploads/maintenance_services', $newImageName, 'public'); // Use Laravel's storage system
                $maintenanceService->image = 'storage/' . $imagePath; // Save the public storage path
            }
            $maintenanceService->name = $request->name;
            $maintenanceService->save();

            return redirect()->route('maintenance_services.create');
        } catch (\Throwable $th) {
            return redirect()->route('maintenance_services.create')->with('errors',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintenanceService $maintenanceService)
    {
        try {
            if ($maintenanceService->image && File::exists(public_path($maintenanceService->image))) {
                File::delete(public_path($maintenanceService->image));
            }

            // Delete the maintenanceService
            $maintenanceService->delete();

            return redirect()->back()->with('success', 'maintenance service deleted successfully.');
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
    }
}
