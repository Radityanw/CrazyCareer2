<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    Buat lowongan baru
                </h2>
            </div>
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                action="{{ route('Daftarkerja.store') }}"
                id="job_form"
                method="post"
                enctype="multipart/form-data"
                class="bg-gray-100 p-4"
            >
            @csrf
            <div class="mb-4 mx-2">
                <x-label for="title" value="Job Title" />
                <x-text-input
                    id="title"
                    class="block mt-1 w-full"
                    type="text"
                    name="title"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <x-label for="company" value="Company Name" />
                <x-text-input
                    id="company"
                    class="block mt-1 w-full"
                    type="text"
                    name="company"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <x-label for="logo" value="Company Logo" />
                <x-text-input
                    id="logo"
                    class="block mt-1 w-full"
                    type="file"
                    name="logo" />
            </div>
            <div class="mb-4 mx-2">
                <x-label for="type" value="Type (Jobs, Courses, or Internship)" />
                <select
                    id="type"
                    name="type"
                    class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required
                >
                    <option value="Courses">Courses</option>
                    <option value="Jobs">Jobs</option>
                    <option value="Internship">Internship</option>
                </select>
            </div>
            <div class="mb-4 mx-2">
                <x-label for="apply_link" value="Link or E-mail To Apply" />
                <x-text-input
                    id="apply_link"
                    class="block mt-1 w-full"
                    type="text"
                    name="apply_link"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <x-label for="tags" value="Tags (separate by comma)" />
                <x-text-input
                    id="tags"
                    class="block mt-1 w-full"
                    type="text"
                    name="tags" />
            </div>
            <div class="mb-4 mx-2">
                <x-label for="content" value="Description" />
                <textarea
                    id="content"
                    rows="8"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                    name="content"
                ></textarea>
            </div>
            <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Continue</button>
            </div>
        </form>
        </div>
    </section>
</x-app-layout>