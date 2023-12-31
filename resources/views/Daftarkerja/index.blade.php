{{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <x-hero></x-hero>
    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="flex-justify-center">
                @foreach($tags as $tag)
    <a href="{{ route('Daftarkerja.index', ['tag' => $tag->slug]) }}"
        class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}"
    >{{ $tag->name }}</a>
@endforeach
            </div>
        </div>
        <div class="mb-12">
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">Pekerjaan tersedia ({{ $Daftarkerja->count() }})</h2>
        </div>
        <div class="-my-6">
            @foreach($Daftarkerja as $Daftarkerja)
                <a
                    href="{{ route('Daftarkerja.show', $Daftarkerja->slug)}}"
                    class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $Daftarkerja->is_highlighted ? 'bg-yellow-100 hover:bg-yellow-200' : 'bg-white hover:bg-gray-100' }}"
                >
                    <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                        <img src="/storage/{{ $Daftarkerja->logo }}" alt="{{ $Daftarkerja->company }} logo" class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $Daftarkerja->title }}</h2>
                        <p class="leading-relaxed text-gray-900">
                            {{ $Daftarkerja->company }} &mdash; <span class="text-gray-600">{{ $Daftarkerja->type }}</span>
                        </p>
                    </div>
                    <div class="md:flex-grow mr-8 flex items-center justify-start">
                        @foreach($Daftarkerja->tags as $tag)
                           <span class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}">
                               {{ $tag->name }}
                           </span>
                        @endforeach
                    </div>
                    <span class="md:flex-grow flex items-center justify-end">
                        <span>{{ $Daftarkerja->created_at->diffForHumans() }}</span>
                    </span>
                </a>
            @endforeach
        </div>
        </div>
    </section>
</x-app-layout> --}}
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <x-hero></x-hero>
    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="flex-justify-center">
                <div class="flex items-center space-x-2">
                    <div class="flex items-center space-x-2 overflow-x-auto">
                        <!-- "All" tag -->
                        <a href="{{ route('Daftarkerja.index') }}"
                            class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-2 px-5 border border-indigo-500 rounded-full text-xs font-medium leading-4 uppercase {{ empty(request()->get('tag')) ? 'bg-gray-500 text-white' : 'bg-white text-gray-500' }}"
                        >All</a>
                    
                        <!-- Other tags -->
                        @foreach($tags as $tag)
                            <a href="{{ route('Daftarkerja.index', ['tag' => $tag->slug]) }}"
                                class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-2 px-5 border border-indigo-500 rounded-full text-xs font-medium leading-4 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}"
                            >{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('.tag-link').on('click', function (e) {
                                e.preventDefault();
                                var tag = $(this).data('tag');
                                window.location.href = tag ? '{{ route("Daftarkerja.index", ["tag" => ""]) }}/' + tag : '{{ route("Daftarkerja.index") }}';
                            });
                        });
                    </script>
                </div>
            </div>
            <br>
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">Pekerjaan tersedia</h2>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($Daftarkerja as $daftarKerja)
            <a href="{{ route('Daftarkerja.show', $daftarKerja->slug) }}" class="lg:w-1/4 md:w-1/2 p-4 w-full hover:bg-gray-100">
                <div class="block relative h-40 overflow-hidden">
                    <img alt="{{ $daftarKerja->company }} logo" class="object-contain object-center w-full h-full block" src="/storage/{{ $daftarKerja->logo }}">
                </div>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $daftarKerja->type }}</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $daftarKerja->title }}</h2>
                    <p class="mt-1">{{ $daftarKerja->tags->implode('name', ', ') }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $Daftarkerja->links() }}
        </div>
    </section>
</x-app-layout>
