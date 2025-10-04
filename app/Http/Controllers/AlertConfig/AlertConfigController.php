<?php

namespace App\Http\Controllers\AlertConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlertConfig;

class AlertConfigController extends Controller
{
    public function index()
    {
        // Fetch all alert configurations
        $configs = \App\Models\AlertConfig::latest()->get();

        // Pass them to the view
        return view('alert_config.index', compact('configs'));
    }
    public function email()
    {
        return view('alert_config.email_config.index');
    }

    public function saveEmailConfig(Request $request)
    {
        $validated = $request->validate([
            'alert_type' => 'required|string',
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'alert_msg' => 'required|string',
        ]);

        // Save to database
        \App\Models\AlertConfig::create($validated);

        // Redirect back with success message
        return back()->with('success', '✅ Email configuration saved successfully!');
    }


}
