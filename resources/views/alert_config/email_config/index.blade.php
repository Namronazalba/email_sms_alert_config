<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email Configuration') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                
                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-8 py-4">
                    <h3 class="text-xl font-semibold text-white tracking-wide">
                        📧 Email Alert Configuration
                    </h3>
                    <p class="text-indigo-100 text-sm">Manage your alert settings for email notifications.</p>
                    
                    <a href="{{ route('alert.config') }}"
                        class="inline-flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-lg font-medium hover:bg-white/30 transition ease-in-out duration-150">
                        ⬅ Back
                    </a>
                </div>

                <!-- Body -->
                <div class="p-8">
                    <form method="POST" action="{{ route('alert.email.save') }}" class="space-y-6">
                        @csrf

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="mb-6 flex items-center justify-between p-4 rounded-lg bg-green-100 text-green-800 border border-green-200">
                                <span>{{ session('success') }}</span>
                                <button type="button" onclick="this.parentElement.remove()" 
                                    class="text-green-700 hover:text-green-900 font-bold">
                                    ✕
                                </button>
                            </div>
                        @endif

                        <input type="hidden" name="alert_type" value="email">

                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter your full name" required>
                        </div>

                        <!-- Company Name -->
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">
                                Company Name
                            </label>
                            <input type="text" id="company" name="company"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter your company name" required>
                        </div>

                        <!-- Contact (Email) -->
                        <div>
                            <label for="contact" class="block text-sm font-medium text-gray-700 mb-1">
                                Contact (Email)
                            </label>
                            <input type="text" id="contact" name="contact"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter email address" required>
                        </div>

                        <!-- Alert Message -->
                        <div>
                            <label for="alert_msg" class="block text-sm font-medium text-gray-700 mb-1">
                                Alert Message
                            </label>
                            <textarea id="alert_msg" name="alert_msg" rows="4"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter the message to be sent in the alert..." required></textarea>
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-indigo-600 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition ease-in-out duration-150">
                                💾 Save Configuration
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
