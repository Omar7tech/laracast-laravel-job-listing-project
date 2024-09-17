<a type="button" href="{{ $url }}"
    class="{{ request()->is($url) ? 'bg-gray-900 text-white cursor-default' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} {{ $class ?? '' }} rounded-md px-3 py-2 text-sm font-medium">
    {{ $slot }}
</a>
