<form {{ $attributes->merge(['class' => 'max-w-md mx-auto mt-8 space-y-6']) }}>
    @if ($method == 'post' || $method == 'POST')
        @csrf
    @endif
    {{ $slot }}
</form>
