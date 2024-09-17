@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded']) }}
        role="alert">
        <strong class="font-bold block">Error!</strong>
        <ul class="list-disc pl-5 space-y-1 overflow-hidden text-ellipsis">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
