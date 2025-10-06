<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SMS Configuration') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-alert-config-form
                type="sms"
                title="SMS Alert Configuration"
                description="Manage your alert settings for SMS notifications."
                color="green"
                icon="📱"
                :action="route('alert.config.save', 'sms')"
            />
        </div>
    </div>
</x-app-layout>
