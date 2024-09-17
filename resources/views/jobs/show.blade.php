<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>


<div class="job-details max-w-3xl mx-auto p-4 md:p-6 lg:p-8 bg-white rounded shadow-md">
    <h1 class="font-bold text-3xl mb-4">Job Details</h1>
    <div class="flex flex-wrap justify-between mb-4">
        <h2 class="text-lg font-bold">Salary: <span class="text-teal-800">{{ $job->salary }}</span></h2>
        <h2 class="text-lg font-bold">Employer: {{ $job->employer->name }}</h2>
    </div>
    <hr class="my-4">
    @if ($job->tags->isNotEmpty())
        <h2 class="text-lg font-bold mb-2">Tags:</h2>
        <ul class="flex flex-wrap mb-4">
            @foreach ($job->tags as $tag)
                <li class="bg-gray-200 rounded px-2 py-1 mr-2 mb-2">{{ $tag->name }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No tags</p>
    @endif
    <a class="text-blue-500 hover:text-blue-700" href="/jobs">Back to Jobs</a>


    <form action="/jobs/{{$job->id}}" method="post">
        @csrf
        @method("delete")
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded-sm float-end">delete<button/>
    </form>
</div>

</x-layout>

