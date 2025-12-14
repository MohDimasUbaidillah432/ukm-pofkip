<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard UKM POFKIP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                
                {{-- Card Total Anggota --}}
                <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-indigo-500 transform hover:scale-[1.02] transition duration-300">
                    <p class="text-sm font-medium text-gray-500">Total Anggota Aktif</p>
                    <p class="text-4xl font-extrabold text-indigo-700 mt-1">{{ $totalAnggota ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">Data Anggota terdaftar</p>
                </div>
                
                {{-- Card Total Kegiatan --}}
                <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-green-500 transform hover:scale-[1.02] transition duration-300">
                    <p class="text-sm font-medium text-gray-500">Kegiatan Terlaksana</p>
                    <p class="text-4xl font-extrabold text-green-700 mt-1">{{ $totalKegiatan ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">Total riwayat kegiatan yang tercatat</p>
                </div>
                
                {{-- Card Menu Cepat --}}
                <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-yellow-500 transform hover:scale-[1.02] transition duration-300">
                    <p class="text-sm font-medium text-gray-500">Aksi Cepat</p>
                    <div class="mt-2 space-y-2">
                        <a href="{{ route('kegiatan.create') }}" class="text-indigo-600 hover:text-indigo-800 block text-lg font-semibold border-b border-indigo-100 pb-1">
                            + Tambah Kegiatan Baru
                        </a>
                        <a href="{{ route('anggota.create') }}" class="text-indigo-600 hover:text-indigo-800 block text-lg font-semibold">
                            + Tambah Anggota Baru
                        </a>
                    </div>
                </div>

            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Kolom Kiri (2/3): Kegiatan Terbaru --}}
                <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">📅 3 Kegiatan Terbaru</h3>
                    
                    @forelse ($kegiatanTerbaru ?? [] as $kegiatan)
                        <div class="mb-4 p-4 border border-gray-100 rounded-md hover:bg-gray-50 transition duration-150">
                            <a href="{{ route('kegiatan.show', ['kegiatan' => $kegiatan->id]) }}" class="text-lg font-semibold text-indigo-600 hover:text-indigo-800">
                                {{ $kegiatan->nama }}
                            </a>
                            <p class="text-sm text-gray-500 mt-1">
                                Tanggal: {{ $kegiatan->tanggal->translatedFormat('d F Y') }} di {{ $kegiatan->tempat }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada data kegiatan yang dicatat.</p>
                    @endforelse

                    <div class="mt-4 text-right">
                        <a href="{{ route('kegiatan.index') }}" class="text-sm text-indigo-500 hover:text-indigo-700 font-semibold">
                            Lihat Semua Kegiatan &rarr;
                        </a>
                    </div>
                </div>

                {{-- Kolom Kanan (1/3): Info Singkat --}}
                <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-xl border-t-4 border-red-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">💡 Info UKM</h3>
                    <p class="text-gray-600 mb-4">
                        Selamat datang di halaman manajemen internal UKM POFKIP. Gunakan navigasi di samping untuk mengelola data anggota, kegiatan, dan aset UKM.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>
                            <span class="font-semibold">Manajer:</span> {{ Auth::user()->name ?? 'Administrator' }}
                        </li>
                        <li>
                            <span class="font-semibold">Status Sistem:</span> Optimal
                        </li>
                        <li>
                            <span class="font-semibold">Versi Aplikasi:</span> Laravel 11
                        </li>
                    </ul>
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>