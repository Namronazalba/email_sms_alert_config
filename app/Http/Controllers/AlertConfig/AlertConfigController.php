<?php

namespace App\Http\Controllers\AlertConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlertConfig;

class AlertConfigController extends Controller
{
    public function index()
    {
        $configs = AlertConfig::latest()->get();

        return view('alert_config.index', compact('configs'));
    }
    public function edit(AlertConfig $config)
    {
        return view('alert_config.edit', compact('config'));
    }

    public function update(Request $request, AlertConfig $config)
    {
        $validated = $request->validate([
            'alert_type' => 'required|string|max:50',
            'name'       => 'required|string|max:100',
            'company'    => 'nullable|string|max:100',
            'contact'    => [
                'required',
                function ($attribute, $value) use ($request) {
                    if ($request->alert_type === 'sms' && !preg_match('/^[0-9]{10,15}$/', $value)) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            'contact' => 'For SMS alerts, contact must be a valid phone number (10–15 digits).',
                        ]);
                    }

                    if ($request->alert_type === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            'contact' => 'For Email alerts, contact must be a valid email address.',
                        ]);
                    }
                },
            ],
            'alert_msg' => 'required|string|max:255',
        ]);

        $config->update($validated);

        return redirect()->route('alert.config')
            ->with('success', '✅ Alert configuration updated successfully.');
    }


    public function destroy(AlertConfig $config)
    {
        $config->delete();
        return redirect()->route('alert.config')->with('success', '🗑️ Alert configuration deleted.');
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
