<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota: ') . $anggota->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('anggota.update', $anggota) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch') 

                        <div class="mt-4">
                            <x-input-label for="nama" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $anggota->nama)" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nim" :value="__('NIM')" />
                            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim', $anggota->nim)" required />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan" :value="old('jurusan', $anggota->jurusan)" required />
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="angkatan" :value="__('Angkatan (Tahun Masuk)')" />
                            <x-text-input id="angkatan" class="block mt-1 w-full" type="number" name="angkatan" :value="old('angkatan', $anggota->angkatan)" required min="2000" max="{{ date('Y') }}" />
                            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jabatan" :value="__('Jabatan (Opsional)')" />
                            <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan', $anggota->jabatan)" />
                            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Unggah Foto Baru (Kosongkan untuk mempertahankan yang lama)')" />
                            <input id="foto" class="block mt-1 w-full border border-gray-300 rounded-md p-2" type="file" name="foto" />
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            
                            @if ($anggota->foto)
                                <p class="mt-2 text-sm text-gray-600">Foto saat ini: **{{ $anggota->foto }}**</p>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ms-4">
                                {{ __('Perbarui Anggota') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>