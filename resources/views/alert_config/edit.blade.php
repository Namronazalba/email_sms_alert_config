<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Alert Configuration') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('alert.update', $config) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Alert Type</label>
                        <select id="alert_type" name="alert_type"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="email" {{ old('alert_type', $config->alert_type) === 'email' ? 'selected' : '' }}>Email</option>
                            <option value="sms" {{ old('alert_type', $config->alert_type) === 'sms' ? 'selected' : '' }}>SMS</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $config->name) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Company</label>
                        <input type="text" name="company" value="{{ old('company', $config->company) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Contact</label>
                        <input 
                            type="text" 
                            id="contact" 
                            name="contact"
                            value="{{ old('contact', $config->contact) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        
                        <small id="contactHelp" class="text-gray-500"></small>

                        <!-- Inline alert message -->
                        <p id="contactError" class="mt-2 text-sm text-red-600 hidden">
                            ⚠️ Invalid input. Please enter a valid contact.
                        </p>
                    </div>


                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Alert Message</label>
                        <textarea name="alert_msg" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3" required>{{ old('alert_msg', $config->alert_msg) }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('alert.config') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alertType = document.getElementById('alert_type');
            const contactInput = document.getElementById('contact');
            const contactHelp = document.getElementById('contactHelp');
            const contactError = document.getElementById('contactError');

            function validateContact() {
                const value = contactInput.value.trim();
                let isValid = true;

                if (alertType.value === 'sms') {
                    const phonePattern = /^[0-9]{10,15}$/;
                    isValid = phonePattern.test(value);
                    contactHelp.textContent = '📱 Only digits allowed (10–15). Example: 923001234567';
                    contactInput.type = 'text';
                } else {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    isValid = emailPattern.test(value);
                    contactHelp.textContent = '✉️ Enter a valid email address (e.g. name@example.com)';
                    contactInput.type = 'email';
                }

                // Toggle alert message
                if (!isValid && value.length > 0) {
                    contactError.classList.remove('hidden');
                } else {
                    contactError.classList.add('hidden');
                }

                return isValid;
            }

            // Validate on change or input
            alertType.addEventListener('change', validateContact);
            contactInput.addEventListener('input', validateContact);

            // Initialize once on load
            validateContact();

            // Optional: prevent form submission if invalid
            document.querySelector('form').addEventListener('submit', function(e) {
                if (!validateContact()) {
                    e.preventDefault();
                    contactInput.focus();
                }
            });
        });
    </script>

</x-app-layout>
