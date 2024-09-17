<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <x-form method="post" action="{{ route('login') }}">
        <x-form-text-input name="email" id="email" type="email">Email</x-form-text-input>
        <x-form-text-input name="password" id="password" type="password">Password</x-form-text-input>
        <x-form-submit-btn>Login</x-form-submit-btn>

        <!-- Display general authentication error for invalid credentials -->
        @error('credentials')
            <x-error-card>
                {{ $message }}
            </x-error-card>
        @enderror
    </x-form>
</x-layout>
