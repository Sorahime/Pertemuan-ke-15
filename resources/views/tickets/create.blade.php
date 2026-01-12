@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            📝 Buat Laporan Baru
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Silakan isi form di bawah untuk melaporkan keluhan fasilitas kampus.
        </p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <form method="POST"
              action="{{ route('tickets.store') }}"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Judul Laporan
                </label>
                <input type="text" name="title"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                              dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Deskripsi
                </label>
                <textarea name="description" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                                 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                          required></textarea>
            </div>

            <!-- Lokasi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Lokasi
                </label>
                <input type="text" name="location"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                              dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Kategori
                </label>
                <select name="category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                               dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Bukti Foto (jpg/png, max 2MB)
                </label>
                <input type="file" name="image"
                       class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('tickets.index') }}"
                   class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700
                          text-gray-800 dark:text-gray-200 hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
    

</div>
@endsection
