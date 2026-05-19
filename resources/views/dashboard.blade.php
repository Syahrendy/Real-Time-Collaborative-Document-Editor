@extends('layouts.app')

@section('content')
<div class="p-8 bg-slate-50 font-sans min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-sm border border-slate-200">
        
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-slate-100">
            <h1 class="text-3xl font-bold text-slate-800">My Documents</h1>
            
            <form action="{{ route('document.store') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="text" name="title" placeholder="Judul dokumen baru..." required 
                       class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-blue-500 bg-white shadow-sm text-slate-800 text-sm w-64">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg transition-all shadow-md text-sm whitespace-nowrap">
                    + Buat Dokumen
                </button>
            </form>
        </div>

        <div class="bg-white rounded-lg border border-slate-200 divide-y divide-slate-100 shadow-inner">
            @forelse($documents as $doc)
                <div class="p-4 flex justify-between items-center hover:bg-slate-50 transition-all">
                    <div>
                        <a href="{{ route('document.show', $doc->id) }}" class="text-lg font-semibold text-blue-600 hover:underline block">
                            📄 {{ $doc->title }}
                        </a>
                        <span class="text-xs text-slate-400">
    Dibuat: {{ $doc->created_at ? $doc->created_at->diffForHumans() : 'Waktu tidak tersedia' }}
</span>
                    </div>
                    <a href="{{ route('document.show', $doc->id) }}" class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium px-4 py-2 rounded-md transition-all">
                        Buka Editor →
                    </a>
                </div>
            @empty
                <div class="p-8 text-center text-slate-400 text-sm">
                    Belum ada dokumen. Tulis judul di atas untuk membuat dokumen pertamamu!
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection