<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kegiatan: ') . $kegiatan->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('kegiatan.update', $kegiatan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch') <div class="mt-4">
                            <x-input-label for="nama" :value="__('Nama Kegiatan')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $kegiatan->nama)" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi Kegiatan')" />
                            <textarea id="deskripsi" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="deskripsi" rows="4" required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tanggal" :value="__('Tanggal Pelaksanaan')" />
                            <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" :value="old('tanggal', $kegiatan->tanggal->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tempat" :value="__('Tempat Pelaksanaan')" />
                            <x-text-input id="tempat" class="block mt-1 w-full" type="text" name="tempat" :value="old('tempat', $kegiatan->tempat)" required />
                            <x-input-error :messages="$errors->get('tempat')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="gambar" :value="__('Unggah Gambar Baru (Biarkan kosong untuk mempertahankan yang lama)')" />
                            <input id="gambar" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="file" name="gambar" />
                            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                            
                            @if ($kegiatan->gambar)
                                <p class="mt-2 text-sm text-gray-600">Gambar saat ini: **{{ $kegiatan->gambar }}**</p>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ms-4">
                                {{ __('Perbarui Kegiatan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>