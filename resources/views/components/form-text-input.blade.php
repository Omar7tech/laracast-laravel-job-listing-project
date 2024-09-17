<div>
    <label for="{{$name}}" class="block text-sm font-medium text-gray-700">{{ $slot }}</label>
    <input id="{{$id}}" type="{{$type}}" name="{{$name}}" value="{{ old($name) }}" {{$attributes}}
           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
