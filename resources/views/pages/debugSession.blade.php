@extends('layouts.mainV2')

@section('title', 'Debug Session - CLOTHIFY')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">All Session Data</h1>
        <a href="{{ route('product') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">← Back</a>
    </div>

    @php
        $allSession = session()->all();
    @endphp

    @if(empty($allSession))
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center">
            <p class="text-yellow-700 font-medium">Session kosong. Tidak ada data tersimpan.</p>
        </div>
    @else
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 w-1/3">Key</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Value</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 w-1/4">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allSession as $key => $value)
                        <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition">
                            <td class="py-3 px-4 font-mono text-xs text-blue-600">{{ $key }}</td>
                            <td class="py-3 px-4">
                                @if(is_array($value))
                                    <pre class="text-xs bg-gray-50 p-2 rounded border border-gray-100 overflow-x-auto whitespace-pre-wrap">{{ print_r($value, true) }}</pre>
                                @elseif(is_null($value))
                                    <span class="text-gray-400 italic">null</span>
                                @elseif(is_bool($value))
                                    <span class="{{ $value ? 'text-green-600' : 'text-red-600' }} font-medium">{{ $value ? 'true' : 'false' }}</span>
                                @else
                                    <span class="text-gray-900">{{ $value }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <span class="inline-block px-2 py-0.5 rounded text-xs font-medium
                                    @if(is_array($value)) bg-purple-100 text-purple-700
                                    @elseif(is_string($value)) bg-green-100 text-green-700
                                    @elseif(is_int($value) || is_float($value)) bg-blue-100 text-blue-700
                                    @elseif(is_bool($value)) bg-yellow-100 text-yellow-700
                                    @elseif(is_null($value)) bg-gray-100 text-gray-500
                                    @else bg-gray-100 text-gray-700
                                    @endif
                                ">{{ gettype($value) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-xs text-gray-400 text-right">
            Total: {{ count($allSession) }} session keys
        </div>
    @endif

    {{-- Quick Actions --}}
    <div class="mt-8 flex gap-3">
        <a href="{{ route('debug.session') }}"
            class="px-4 py-2 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition">
            🔄 Refresh
        </a>
        <a href="{{ url('/pages/clear-order') }}"
            class="px-4 py-2 bg-red-50 text-red-600 text-sm font-semibold rounded-lg hover:bg-red-100 transition border border-red-200">
            🗑️ Clear AddOrder
        </a>
    </div>

</div>
@endsection