<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>


    {{-- ? Form - POST --}}
    <form action="/jobs" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Job Information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a new job listing.</p>


                {{-- * Job input --}}
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="job-name" class="block text-sm font-medium leading-6 text-gray-900">Job Name</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="job-name" placeholder="Sales Manager"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    {{-- * Salary Input --}}
                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="number" name="salary" id="salary" placeholder="$50,000 per year"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                </div>

                <x-validation-error class="mt-3"></x-validation-error>
            </div>
        </div>
        <br>
        {{-- ! Submit BTN --}}
        <button type="submit"
            class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </form>

    
</x-layout>
