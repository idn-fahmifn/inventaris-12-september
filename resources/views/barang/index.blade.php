<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daftar Aset Barang
            </h2>

            <button onclick="document.getElementById('createBarangModal').showModal()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                + Tambah Barang
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class="overflow-x-auto">
                    {{-- Tabel untuk menampilkan data barang (kosong) --}}
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nama Barang</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Merk</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Ruangan</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kondisi</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            {{-- Placeholder jika data kosong --}}
                            <tr>
                                <td colspan="5"
                                    class="px-6 py-4 text-center text-sm italic text-gray-500 dark:text-gray-400">
                                    Belum ada data barang yang tercatat.
                                </td>
                            </tr>

                            {{-- Loop data barang akan masuk di sini --}}
                            {{-- @foreach ($barangs as $barang) ... @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Create Data Barang --}}
    <dialog id="createBarangModal" class="p-0 backdrop:bg-black/50 rounded-lg shadow-2xl dark:bg-gray-900">
        <div class="p-6 w-[400px]">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">
                Input Barang Baru</h3>
            <form method="POST" action="#">
                @csrf
                <div class="space-y-4">
                    <div>
                        <x-input-label for="nama_barang" value="Nama Barang" />
                        <x-text-input id="nama_barang" name="nama_barang" type="text" class="mt-1 block w-full"
                            required />
                    </div>
                    <div>
                        <x-input-label for="kode_ruangan" value="Kode Ruangan (Tempat Penyimpanan)" />
                        {{-- Input text untuk kode ruangan yang akan dicari ID-nya di Controller --}}
                        <x-text-input id="kode_ruangan" name="kode_ruangan_input" type="text" class="mt-1 block w-full"
                            placeholder="Contoh: R-01" required />
                    </div>
                    <div>
                        <x-input-label for="merk" value="Merk" />
                        <x-text-input id="merk" name="merk" type="text" class="mt-1 block w-full" />
                    </div>
                    <div>
                        <x-input-label for="tanggal_pembelian" value="Tanggal Pembelian" />
                        <x-text-input id="tanggal_pembelian" name="tanggal_pembelian" type="date"
                            class="mt-1 block w-full" />
                    </div>
                    <div>
                        <x-input-label for="kondisi" value="Kondisi Barang" />
                        <select id="kondisi" name="kondisi"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                            <option value="sedang diperbaiki">Sedang Diperbaiki</option>
                        </select>
                    </div>
                     <div>
                        <x-input-label for="tanggal_pembelian" value="Deskripsi" />
                        <textarea name="deskripsi" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id=""></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('createBarangModal').close()"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition duration-150">
                        Batal
                    </button>
                    <x-primary-button class="ml-3">
                        Simpan Barang
                    </x-primary-button>
                </div>
            </form>
        </div>
    </dialog>
</x-app-layout>