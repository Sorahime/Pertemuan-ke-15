@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            📄 Detail Laporan
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Detail laporan fasilitas kampus yang diajukan mahasiswa.
        </p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-8 space-y-4">
        <div>
            <span class="text-sm text-gray-500">Pelapor</span>
            <p class="font-semibold text-gray-800 dark:text-gray-100">
                {{ $ticket->user->name }}
            </p>
        </div>

        <div>
            <span class="text-sm text-gray-500">Lokasi</span>
            <p class="text-gray-800 dark:text-gray-100">
                {{ $ticket->location }}
            </p>
        </div>

        <div>
            <span class="text-sm text-gray-500">Deskripsi</span>
            <p class="text-gray-800 dark:text-gray-100">
                {{ $ticket->description }}
            </p>
        </div>

        <div>
            <span class="text-sm text-gray-500">Status</span><br>
            @if ($ticket->status === 'Pending')
                <span class="inline-block mt-1 px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                    Pending
                </span>
            @elseif ($ticket->status === 'In Progress')
                <span class="inline-block mt-1 px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                    In Progress
                </span>
            @else
                <span class="inline-block mt-1 px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                    Resolved
                </span>
            @endif
        </div>

        <!-- Foto -->
        @if ($ticket->image_path)
            <div>
                <span class="text-sm text-gray-500">Bukti Foto</span>
                <img src="{{ asset('storage/' . $ticket->image_path) }}"
                     class="mt-2 max-w-xs rounded-lg border">
            </div>
        @endif
    </div>

    <!-- Komentar -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">
            💬 Komentar
        </h2>

        <!-- List Komentar -->
        <div class="space-y-4 mb-6">
            @forelse ($ticket->comments as $comment)
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3">
                    <div class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                        {{ $comment->user->name }}
                    </div>
                    <div class="text-gray-700 dark:text-gray-300">
                        {{ $comment->message }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar.</p>
            @endforelse
        </div>

        <!-- Form Komentar -->
        <form method="POST" action="/comments" class="space-y-3">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

            <textarea name="message" rows="3"
                      class="w-full rounded-md border-gray-300 dark:border-gray-700
                             dark:bg-gray-900 dark:text-white"
                      placeholder="Tulis komentar..." required></textarea>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Kirim
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
