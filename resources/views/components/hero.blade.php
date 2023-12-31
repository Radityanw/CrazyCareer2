<section class="text-gray-600 body-font border-b border-gray-100">
    <div class="container mx-auto flex flex-col px-5 pt-16 pb-8 justify-center items-center">
        <div class="w-full md:w-2/3 flex flex-col items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Karier Hebat Dimulai dari Pilihan Gila!</h1>
            <p class="mb-8 leading-relaxed">Apakah Anda berencana untuk beralih ke pekerjaan baru, meningkatkan keterampilan, atau hanya ingin melihat apa yang tersedia? Kami telah mengumpulkan daftar lengkap posisi terbuka dan kursus yang ditawarkan oleh berbagai perusahaan untuk Anda pilih.</p>
            <form class="flex w-full justify-center items-end" action="{{ route('Daftarkerja.index') }}" method="get">
                <div class="relative mr-4 w-full lg:w-1/2 text-left">
                    <input type="text" id="s" name="s" value="{{ request()->get('s') }}" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
            </form>
        </div>
    </div>
</section>