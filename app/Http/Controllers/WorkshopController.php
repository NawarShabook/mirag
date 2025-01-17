<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class WorkshopController extends Controller
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
        $workshops=Workshop::latest()->get();
        return view('workshops.create',compact('workshops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'workers_count' => 'required|int|min:1|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $image = $request->file('image');
            $newImageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/workshops', $newImageName, 'public'); // Use Laravel's storage system
            //mass assignment
            Workshop::create([
                'name' => $request->name,
                'workers_count' => $request->workers_count,
                'image' => 'storage/' . $imagePath,
            ]);
            return back()->with('success','تمت العملية بنجاح');

        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        return view('workshops.edit', ['workshop' => $workshop]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'workers_count' => 'required|int|min:1|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle image upload if provided
            if ($request->hasFile('image')) {
                if ($workshop->image && File::exists(public_path($workshop->image))) {
                    File::delete(public_path($workshop->image));
                }
                $image = $request->file('image');
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('uploads/workshops', $newImageName, 'public'); // Use Laravel's storage system
                $workshop->image = 'storage/' . $imagePath; // Save the public storage path
            }
            $workshop->name = $request->name;
            $workshop->workers_count = $request->workers_count;
            $workshop->save();

            return redirect()->route('workshops.create')->with('success','تمت العملية بنجاح');
        } catch (\Throwable $th) {
            return redirect()->route('workshops.create')->with('errors',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        try {
            if ($workshop->image && File::exists(public_path($workshop->image))) {
                File::delete(public_path($workshop->image));
            }

            // Delete the workshop
            $workshop->delete();

            return redirect()->back()->with('success', 'workshop deleted successfully.');
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
    }
}
