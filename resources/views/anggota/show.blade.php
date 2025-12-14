<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-3xl font-extrabold mb-6 text-indigo-800">{{ $anggota->nama }}</h3>

                    <div class="flex flex-col md:flex-row items-start md:space-x-8">
                        
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            @if ($anggota->foto)
                                <img src="{{ asset('storage/anggotas/' . $anggota->foto) }}" 
                                     alt="Foto {{ $anggota->nama }}" 
                                     class="w-full h-auto object-cover rounded-lg shadow-md border border-gray-200">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg text-gray-500">
                                    Tidak Ada Foto
                                </div>
                            @endif
                        </div>

                        <div class="md:w-2/3 space-y-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tr>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm font-semibold text-gray-700 w-1/3">NIM</td>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-600">: {{ $anggota->nim }}</td>
                                </tr>
                                <tr>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm font-semibold text-gray-700">Jurusan</td>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-600">: {{ $anggota->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm font-semibold text-gray-700">Angkatan</td>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-600">: {{ $anggota->angkatan }}</td>
                                </tr>
                                <tr>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm font-semibold text-gray-700">Jabatan</td>
                                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-600">: {{ $anggota->jabatan ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-between border-t pt-6">
                        <a href="{{ route('anggota.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            &larr; Kembali ke Daftar
                        </a>
                        
                        <a href="{{ route('anggota.edit', ['anggota' => $anggota->id]) }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit Data Anggota
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>