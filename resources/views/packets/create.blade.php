<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <div class="p-6">
                                <form action="{{ route('packets.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Nama Paket
                                        </label>
                                        <input type="text"
                                            class="w-full rounded-lg  dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('nama_paket') border-red-500 @enderror"
                                            name="nama_paket" value="{{ old('nama_paket') }}"
                                            placeholder="Masukkan Judul Paket">
                                        @error('title')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Deskripsi
                                        </label>
                                        <textarea
                                            class="w-full rounded-lg  dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('deskripsi') border-red-500 @enderror"
                                            name="deskripsi" rows="5"
                                            placeholder="Masukkan Deskripsi Paket">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Harga Total
                                            </label>
                                            <input type="number"
                                                class="w-full rounded-lg  dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('harga_total') border-red-500 @enderror"
                                                name="harga_total" value="{{ old('harga_total') }}"
                                                placeholder="Masukkan Harga Paket">
                                            @error('harga')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Total Pembelian
                                            </label>
                                            <input type="number"
                                                class="w-full rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('total_pembelian') border-red-500 @enderror"
                                                name="total_pembelian" value="{{ old('total_pembelian') }}"
                                                placeholder="Masukkan Total Pembelian">
                                            @error('total_pembelian')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Rating
                                        </label>
                                        <div class="flex gap-4">
                                            @for($i = 1; $i <= 5; $i++)
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="form-radio text-indigo-600 focus:ring-indigo-500"
                                                        name="rating" value="{{ $i }}" @checked(old('rating') == $i)>

                                                    <span class="ml-3">{{ $i }}</span>
                                                </label>
                                            @endfor
                                        </div>
                                        @error('rating')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                        <div class="">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Destinasi
                                            </label>
                                            <input type="text"
                                                class="w-full rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('destinasi') border-red-500 @enderror"
                                                name="destinasi" value="{{ old('destinasi') }}"
                                                placeholder="Masukkan Destinasi Paket">
                                            @error('destinasi')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Hotel
                                            </label>
                                            <input type="text"
                                                class="w-full rounded-lg  dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('hotel') border-red-500 @enderror"
                                                name="hotel" value="{{ old('hotel') }}"
                                                placeholder="Masukkan Nama Hotel">
                                            @error('hotel')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Transportasi
                                            </label>
                                            <input type="text"
                                                class="w-full rounded-lg  dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('transport') border-red-500 @enderror"
                                                name="transport" value="{{ old('transport') }}"
                                                placeholder="Masukkan Transportasi">
                                            @error('transport')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Layanan Tambahan
                                        </label>
                                        <div class="space-y-2">
                                            @foreach(['Pemandu Wisata', 'Makan 3x Sehari', 'Dokumentasi', 'Asuransi'] as $layanan)
                                                <label class="inline-flex items-center mr-6">
                                                    <input type="checkbox" name="layanan_tambahan[]" value="{{ $layanan }}"
                                                        @checked(in_array($layanan, old('layanan_tambahan', [])))
                                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                    <span class="ml-2">{{ $layanan }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        @error('layanan_tambahan')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex gap-4">
                                        <x-primary-button type="submit">
                                            SAVE
                                        </x-primary-button>

                                        <x-secondary-button type="reset">
                                            RESET
                                        </x-secondary-button>

                                        <a href="{{ route('packets.index') }}"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            BACK
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>