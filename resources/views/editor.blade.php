@extends('layouts.app')

@section('content')
<div id="editor-app" class="p-8 bg-slate-50 font-sans min-h-screen" data-document-id="{{ $document->id }}" data-user-id="{{ auth()->id() }}">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-blue-600">← Kembali ke daftar</a>
                <h1 class="text-2xl font-bold text-slate-800 mt-1">{{ $document->title }}</h1>
            </div>
            <span id="editor-status" class="text-xs text-slate-400">Menghubungkan...</span>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <textarea
                id="editor"
                class="w-full min-h-[400px] p-4 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 resize-y"
                placeholder="Mulai menulis..."
            >{{ old('content', $document->content) }}</textarea>
        </div>

        @if($document->revisions->isNotEmpty())
        <div class="mt-8 bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-800 mb-4">Riwayat Revisi</h2>
            <ul id="revision-list" class="divide-y divide-slate-100">
                @foreach($document->revisions as $revision)
                <li class="py-3 flex justify-between items-center">
                    <span class="text-sm text-slate-600">
                        {{ $revision->user->name ?? 'User' }} — {{ $revision->created_at->diffForHumans() }}
                    </span>
                    <form action="{{ route('revision.restore', $revision->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm text-blue-600 hover:underline">Pulihkan</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/editor.js'])
@endpush
