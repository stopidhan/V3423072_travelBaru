<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('packets.create') }}"
                            class="inline-flex items-center px-4 py-2 dark:bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200">
                            ADD PAKET
                        </a>
                    </div>

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm border-collapse bg-gray-900">
                            <thead class="bg-gray-500">
                                <tr>
                                    <th
                                        class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-32 whitespace-nowrap">
                                        NAMA PAKET</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-40">
                                        DESKRIPSI</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-32">
                                        HARGA TOTAL</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-24">
                                        RATING</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-24">
                                        TOTAL PEMBELIAN</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-32">
                                        DESTINASI</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-32">
                                        HOTEL</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-32">
                                        TRANSPORT</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-40">
                                        LAYANAN TAMBAHAN</th>
                                    <th class="p-3 border border-gray-700 font-semibold text-gray-200 text-center w-24">
                                        ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packets as $packet)
                                    <tr class="hover:bg-gray-800 transition-colors duration-150">
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2 hover:line-clamp-none">
                                                {{ $packet->nama_paket }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="relative group">
                                                <div class="w-full line-clamp-2 group-hover:line-clamp-none">
                                                    {{ $packet->deskripsi }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2">
                                                {{ "Rp" . number_format($packet->harga_total, 2, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            {{ $packet->rating }}
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            {{ $packet->total_pembelian }}
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2 hover:line-clamp-none">
                                                {{ $packet->destinasi }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2 hover:line-clamp-none">
                                                {{ $packet->hotel }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2 hover:line-clamp-none">
                                                {{ $packet->transport }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center text-gray-300">
                                            <div class="w-full line-clamp-2 hover:line-clamp-none">
                                                {{ implode(', ', json_decode($packet->layanan_tambahan, true)) }}
                                            </div>
                                        </td>
                                        <td class="p-3 border border-gray-700 text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('packets.destroy', $packet->id) }}" method="POST"
                                                class="flex flex-col gap-2">
                                                <a href="{{ route('packets.edit', $packet->id) }}"
                                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                                    EDIT
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors duration-200">
                                                    DELETE
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="p-4 text-center">
                                            <div class="p-4 text-sm text-red-400 bg-red-900 rounded">
                                                Data Packets belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $packets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>