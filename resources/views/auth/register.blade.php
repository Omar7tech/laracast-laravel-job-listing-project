<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <x-form method="POST" action="{{ route('register') }}">
        <x-form-text-input name="name" id="name" type="name">Name</x-form-text-input>
        <x-form-text-input name="email" id="email" type="email">Email</x-form-text-input>
        <x-form-text-input name="password" id="password" type="password">Password</x-form-text-input>
        <x-form-text-input name="password_confirmation" id="password_confirmation" type="password">Confirm
            password</x-form-text-input>
        <x-form-submit-btn> Register</x-form-submit-btn>
    </x-form>
</x-layout>
