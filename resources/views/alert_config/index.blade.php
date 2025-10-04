<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alert Configurations') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Top Section -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700 mb-4">This is your Alert Configuration page.</p>

                <div class="flex justify-center space-x-6">
                    <!-- Email Configuration Button -->
                    <a href="{{ route('alert.email') }}"
                        class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-semibold rounded-xl shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition ease-in-out duration-150">
                        ✉️ Email Configuration
                    </a>

                    <!-- SMS Configuration Button -->
                    <a href="{{ route('alert.sms') }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition ease-in-out duration-150">
                        📱 SMS Configuration
                    </a>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Saved Configurations</h3>

                @if ($configs->isEmpty())
                    <p class="text-gray-500 text-center py-6">No alert configurations found.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">#</th>
                                    <th class="px-4 py-2 border-b text-left">Alert Type</th>
                                    <th class="px-4 py-2 border-b text-left">Name</th>
                                    <th class="px-4 py-2 border-b text-left">Company</th>
                                    <th class="px-4 py-2 border-b text-left">Contact</th>
                                    <th class="px-4 py-2 border-b text-left">Alert Message</th>
                                    <th class="px-4 py-2 border-b text-left">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($configs as $config)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border-b">{{ ucfirst($config->alert_type) }}</td>
                                        <td class="px-4 py-2 border-b">{{ $config->name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $config->company }}</td>
                                        <td class="px-4 py-2 border-b">{{ $config->contact }}</td>
                                        <td class="px-4 py-2 border-b">{{ $config->alert_msg }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-500">{{ $config->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
