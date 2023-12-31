<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="mb-12 flex items-center">
                <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                    Daftar Pekerjaan & Course ({{ $Daftarkerja->count() }})
                </h2>
                <a href="{{ route('profile.edit') }}" class="text-indigo-500 hover:text-indigo-700 focus:outline-none">
                    Edit Profile
                </a>
            </div>
            <div class="-my-6">
                @foreach($Daftarkerja as $Daftarkerja)
                    <div class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $Daftarkerja->is_highlighted ? 'bg-yellow-100 hover:bg-yellow-200' : 'bg-white hover:bg-gray-100' }}">
                        <!-- Konten pekerjaan -->
                        <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                            <img src="/storage/{{ $Daftarkerja->logo }}" class="w-16 h-16 rounded-full object-cover">
                        </div>
                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                            <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $Daftarkerja->title }}</h2>
                            <p class="leading-relaxed text-gray-900">{{ $Daftarkerja->company }} &mdash; <span class="text-gray-600">{{ $Daftarkerja->location }}</span></p>
                        </div>
                        <div class="md:flex-grow mr-8 mt-2 flex items-center justify-start">
                            @foreach($Daftarkerja->tags as $tag)
                                <span class="tag-link inline-flex items-center px-3 py-1.5 mr-2 border border-indigo-500 rounded-full text-xs font-medium leading-4 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }} hover:bg-indigo-100 hover:border-indigo-700 transition duration-300 ease-in-out">{{ strtoupper($tag->name) }}</span>
                            @endforeach
                        </div>
                        
                        <!-- Tombol Delete -->
                        <div class="flex items-end ml-auto">
                            <form action="{{ route('Daftarkerja.destroy', $Daftarkerja->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this job?')" class="text-red-500 hover:text-red-700 focus:outline-none">
                                    Delete
                                </button>
                            </form>
                        </div>
            
                        <!-- Informasi Waktu dan Jumlah Klik -->
                        <div class="md:flex-grow flex flex-col items-end justify-center ml-4">
                            <span>{{ $Daftarkerja->created_at->diffForHumans() }}</span>
                            <span><strong class="text-bold">{{ $Daftarkerja->kliks()->count() }}</strong> Apply Button Clicks</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
