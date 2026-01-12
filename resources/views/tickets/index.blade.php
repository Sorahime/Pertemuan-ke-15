@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            📋 Daftar Laporan
        </h1>

        <a href="{{ route('tickets.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Buat Laporan
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                        Judul
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                        Kategori
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($tickets as $ticket)
                <tr>
                    <td class="px-6 py-4 text-gray-800 dark:text-gray-100">
                        {{ $ticket->title }}
                    </td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                        {{ $ticket->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($ticket->status === 'Pending')
                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                                Pending
                            </span>
                        @elseif ($ticket->status === 'In Progress')
                            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                                In Progress
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                Resolved
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('tickets.show', $ticket->id) }}"
                           class="text-blue-600 hover:underline">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                        Belum ada laporan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
