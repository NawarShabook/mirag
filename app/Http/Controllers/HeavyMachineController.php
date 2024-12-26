<?php

namespace App\Http\Controllers;

use App\Models\HeavyMachine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
class HeavyMachineController extends Controller
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
        $heavy_machines=HeavyMachine::latest()->get();
        return view('heavy_machines.create',compact('heavy_machines'));
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
            $imagePath = $image->storeAs('uploads/heavy_machines', $newImageName, 'public'); // Use Laravel's storage system
            //mass assignment
            HeavyMachine::create([
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
    public function show(HeavyMachine $heavyMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeavyMachine $heavyMachine)
    {
        return view('heavy_machines.edit', ['heavyMachine' => $heavyMachine]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeavyMachine $heavyMachine)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle image upload if provided
            if ($request->hasFile('image')) {
                if ($heavyMachine->image && File::exists(public_path($heavyMachine->image))) {
                    File::delete(public_path($heavyMachine->image));
                }
                $image = $request->file('image');
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('uploads/heavy_machines', $newImageName, 'public'); // Use Laravel's storage system
                $heavyMachine->image = 'storage/' . $imagePath; // Save the public storage path
            }
            $heavyMachine->name = $request->name;
            $heavyMachine->save();

            return redirect()->route('heavy_machines.create');
        } catch (\Throwable $th) {
            return redirect()->route('heavy_machines.create')->with('errors',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeavyMachine $heavyMachine)
    {
        try {
            if ($heavyMachine->image && File::exists(public_path($heavyMachine->image))) {
                File::delete(public_path($heavyMachine->image));
            }
    
            // Delete the heavyMachine
            $heavyMachine->delete();
    
            return redirect()->back()->with('success', 'heavyMachine deleted successfully.');
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
        
    }
}
