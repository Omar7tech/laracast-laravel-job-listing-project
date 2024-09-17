<div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
    @forelse ($jobs as $job)
        <a href="jobs/{{ $job->id }}"
            class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100"
            title="{{ $job->title }} , {{ $job->salary }}">
            <div class="font-bold text-blue-600 text-lg mb-2">
                {{ $job->employer->name }}
            </div>
            <div class="text-lg">
                <strong>{{ $job->title }}</strong>, Salary: {{ $job->salary }}
            </div>
            <div class="text-gray-600 text-sm mt-2">
                {{ $job->description }}
            </div>
        </a>
    @empty
        <article class="text-red-600 text-lg text-center mt-10 col-span-full">No jobs available</article>
    @endforelse

</div>
<div>
    {{ $jobs->links('pagination::tailwind') }}
</div>
