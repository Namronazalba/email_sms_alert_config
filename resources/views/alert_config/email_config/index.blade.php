<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email Configuration') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-alert-config-form
                type="email"
                title="Email Alert Configuration"
                description="Manage your alert settings for email notifications."
                color="indigo"
                icon="📧"
                :action="route('alert.config.save', 'email')"
            />
        </div>
    </div>
</x-app-layout>
