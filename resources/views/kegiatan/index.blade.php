<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kegiatan UKM POFKIP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-end">
                <a href="{{ route('kegiatan.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    + Tambah Kegiatan Baru
                </a>
            </div>

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6 text-indigo-700">Daftar Kegiatan</h3>

                    @forelse ($kegiatans as $kegiatan)
                        {{-- Pengecekan ID untuk menghindari error parameter hilang --}}
                        @if ($kegiatan->id)
                        <div class="border-b border-gray-200 py-6 mb-6 last:border-b-0">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800">{{ $kegiatan->nama }}</h4>
                                    
                                    <p class="text-sm text-indigo-600 mt-1 mb-3">
                                        Tanggal: {{ $kegiatan->tanggal->translatedFormat('d F Y') }}
                                        &bull;
                                        Tempat: {{ $kegiatan->tempat }}
                                    </p>
                                    
                                    <p class="mt-2 text-gray-600 leading-relaxed">{{ $kegiatan->deskripsi }}</p>
                                    
                                    @if ($kegiatan->gambar)
                                        <p class="mt-3 text-xs text-gray-500">File Gambar: {{ $kegiatan->gambar }}</p>
                                    @endif
                                </div>
                                
                                <div class="flex space-x-2">
                                    {{-- Menggunakan ID eksplisit --}}
                                    <a href="{{ route('kegiatan.edit', ['kegiatan' => $kegiatan->id]) }}" 
                                       class="text-sm text-blue-600 hover:text-blue-900 font-semibold">
                                        Edit
                                    </a>

                                    {{-- Menggunakan ID eksplisit --}}
                                    <form action="{{ route('kegiatan.destroy', ['kegiatan' => $kegiatan->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                        <div class="text-center py-10">
                            <p class="text-lg text-gray-600">Belum ada kegiatan yang tersedia saat ini.</p>
                            <p class="text-sm text-gray-500 mt-2">Klik tombol "Tambah Kegiatan Baru" untuk mulai.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>