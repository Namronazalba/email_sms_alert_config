<?php

namespace App\Http\Controllers\AlertConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlertConfig;

class AlertConfigController extends Controller
{
    public function index()
    {
        $configs = \App\Models\AlertConfig::latest()->get();

        return view('alert_config.index', compact('configs'));
    }
    public function email()
    {
        return view('alert_config.email_config.index');
    }

    public function sms()
    {
        return view('alert_config.sms_config.index');
    }

    public function saveConfig(Request $request, $type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'alert_msg' => 'required|string',
        ]);

        $validated['alert_type'] = $type;

        \App\Models\AlertConfig::create($validated);

        $message = match ($type) {
            'email' => '✅ Email configuration saved successfully!',
            'sms' => '✅ SMS configuration saved successfully!',
            default => '✅ Configuration saved successfully!',
        };

        return back()->with('success', $message);
    }

}
