<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kegiatan UKM POFKIP') }} </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6 text-indigo-700">Kegiatan UKM POFKIP</h3>

                    @forelse ($kegiatans as $kegiatan)
                        <div class="border-b border-gray-200 py-6 mb-6">
                            @if ($kegiatan->gambar)
                                <img src="{{ asset('storage/kegiatan/' . $kegiatan->gambar) }}" 
                                     alt="Gambar Kegiatan {{ $kegiatan->nama }}" 
                                     class="mb-4 w-full h-64 object-cover rounded-lg shadow-md">
                            @endif
                            
                            <h4 class="text-xl font-bold text-gray-800">{{ $kegiatan->nama }}</h4>
                            
                            <p class="text-sm text-indigo-600 mt-1 mb-3">
                                <i class="fas fa-calendar-alt"></i> 
                                Tanggal: {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
                                &bull;
                                <i class="fas fa-map-marker-alt"></i> 
                                Tempat: {{ $kegiatan->tempat }}
                            </p>
                            
                            <p class="mt-2 text-gray-600 leading-relaxed">{{ $kegiatan->deskripsi }}</p>

                        </div>
                    @empty
                        <div class="text-center py-10">
                            <p class="text-lg text-gray-600">Belum ada kegiatan yang tersedia saat ini.</p>
                            <p class="text-sm text-gray-500 mt-2">Silakan tambahkan data kegiatan baru di database.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>