<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center justify-between">
        <a href="{{ route('Daftarkerja.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
            <span class="ml-3 text-xl">CrazyCareer</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            {{-- <a class="mr-5 hover:text-gray-900">First Link</a>
            <a class="mr-5 hover:text-gray-900">Second Link</a>
            <a class="mr-5 hover:text-gray-900">Third Link</a> --}}
        </nav>
        <div class="flex items-center">
          <div class="mr-4">
            <a href="{{ route('dashboard') }}" class="hover:underline">Hai, {{ Auth::user()->name }}</a>
        </div>
        <div class="mr-4">
            <a href="{{ route('Daftarkerja.create') }}" class="text-green-500 hover:underline">Tambah lowongan baru</a>
          </div>
            <div>
                <h2 href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</h2>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
