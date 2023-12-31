<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-12">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    {{ $Daftarkerja->title }}
                </h2>
                <div class="md:flex-grow mr-8 mt-2 flex items-center justify-start">
                    @foreach($Daftarkerja->tags as $tag)
                    <a href="{{ route('Daftarkerja.index', ['tag' => $tag->slug]) }}"
                       class="inline-block mr-2 tracking-wide text-xs font-medium title-font py-1.5 px-5 border border-indigo-500 rounded-full text-xs font-medium leading-4 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}"
                    >{{ $tag->name }}</a>
                @endforeach
                </div>
            </div>
            <div class="-my-6">
                <div class="flex flex-wrap md:flex-nowrap">
                    <div class="content w-full md:w-3/4 pr-4 leading-relaxed text-base">
                        {!! $Daftarkerja->content !!}
                    </div>
                    <div class="w-full md:w-1/4 pl-4">
                        <img
                            src="/storage/{{ $Daftarkerja->logo }}"
                            alt="{{ $Daftarkerja->company }} logo"
                            class="max-w-full mb-4"
                        >
                        <p class="leading-relaxed text-base">
                            <strong>Type: </strong>{{ $Daftarkerja->type }}<br>
                            <strong>Company: </strong>{{ $Daftarkerja->company }}
                        </p>
                        <a 
                            @if (filter_var($Daftarkerja->apply_Link, FILTER_VALIDATE_EMAIL))
                                href="mailto:{{ $Daftarkerja->apply_Link }}"
                            @else
                                href="{{ route('Daftarkerja.apply', $Daftarkerja->slug) }}"
                            @endif
                            class="block text-center my-4 tracking-wide bg-white text-indigo-500 text-sm font-medium title-font py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase"
                        >
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>