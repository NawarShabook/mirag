<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $settings_array=[];
        foreach ($settings as $setting){
            $settings_array[$setting->key] = $setting->value;
        }
     
        return view('settings.settings',compact('settings_array'));
    }

    public function updateSetting(Request $request)
    {
        // Validate the input
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'nullable|string',
        ]);

        // Update or create the setting
        Setting::updateOrCreate(
            ['key' => $request->key], // Search criteria
            ['value' => $request->value] // New value
        );

        return response()->json(['message' => 'Setting updated successfully.']);

    }
}
