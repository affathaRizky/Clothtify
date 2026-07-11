@extends('layouts.mainV2')

@section('title', 'Checkout - CLOTHIFY')

@section('content')
<div class="flex flex-wrap gap-8 max-w-[1200px] mx-auto px-4 py-8 min-h-screen">

    {{-- KOLOM KIRI: FORMS --}}
    <div class="flex-1 min-w-[300px]">
        <div class="flex flex-col gap-6">

            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <h2 class="text-lg font-semibold mb-4">Shipping Address</h2>

                <form id="filterForm" method="GET" action="{{ route('checkout') }}" class="mb-4">
                    <input type="hidden" name="full_name" value="{{ old('full_name', request('full_name')) }}">
                    <input type="hidden" name="phone" value="{{ old('phone', request('phone')) }}">
                    <input type="hidden" name="address_detail" value="{{ old('address_detail', request('address_detail')) }}">
                    <input type="hidden" name="shipping_method" value="{{ old('shipping_method', request('shipping_method', 'reguler')) }}">
                    <input type="hidden" name="payment_method" value="{{ old('payment_method', request('payment_method', 'qris')) }}">

                    <label class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                    <select name="provinsi_id" onchange="this.form.submit()" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm bg-white mb-4">
                        <option value="" disabled {{ !$selectedProvince ? 'selected' : '' }}>Select province</option>
                        @foreach($provinces as $prov)
                        <option value="{{ $prov->id }}" {{ $selectedProvince == $prov->id ? 'selected' : '' }}>{{ $prov->name }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <select name="kota_id" onchange="this.form.submit()" {{ !$selectedProvince ? 'disabled' : '' }} required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm bg-white mb-4 {{ !$selectedProvince ? 'bg-gray-50' : '' }}">
                        <option value="" disabled {{ !$selectedCity ? 'selected' : '' }}>
                            {{ $selectedProvince ? 'Select city' : 'Select province first' }}
                        </option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $selectedCity == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700 mb-1">District</label>
                    <select name="kecamatan_id" onchange="this.form.submit()" {{ !$selectedCity ? 'disabled' : '' }} required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm bg-white {{ !$selectedCity ? 'bg-gray-50' : '' }}">
                        <option value="" disabled {{ !$selectedDistrict ? 'selected' : '' }}>
                            {{ $selectedCity ? 'Select district' : 'Select city first' }}
                        </option>
                        @foreach($districts as $dist)
                        <option value="{{ $dist->id }}" {{ $selectedDistrict == $dist->id ? 'selected' : '' }}>{{ $dist->name }}</option>
                        @endforeach
                    </select>
                </form>

                @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
                    {{ session('error') }}
                </div>
                @endif

                <form id="addressForm" method="POST" action="{{ route('checkout.store.data') }}" enctype="multipart/form-data">
                    @csrf

                    <input type=" hidden" name="provinsi_id" value="{{ $selectedProvince ?? '' }}">
                    <input type="hidden" name="kota_id" value="{{ $selectedCity ?? '' }}">
                    <input type="hidden" name="kecamatan_id" value="{{ $selectedDistrict ?? '' }}">
                    <input type="hidden" name="shipping_method" id="selected_shipping" value="{{ old('shipping_method', request('shipping_method', 'reguler')) }}">
                    <input type="hidden" name="payment_method" id="selected_payment" value="{{ old('payment_method', request('payment_method', 'qris')) }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name', request('full_name')) }}" placeholder="John Doe" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm placeholder-gray-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone', request('phone')) }}" placeholder="08xxxxxxxxxx" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm placeholder-gray-400">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address_detail" class="block text-sm font-medium text-gray-700 mb-1">Detail Alamat</label>
                        <textarea name="address_detail" id="address_detail" rows="3" placeholder="Nama jalan, RT/RW, patokan, dll." required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition resize-none text-sm placeholder-gray-400">{{ old('address_detail', request('address_detail')) }}</textarea>
                    </div>
            </div>

            {{-- Shipping Method --}}
            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <h2 class="text-lg font-semibold mb-4">Shipping Method</h2>
                <button type="button" data-modal-target="shippingModal" data-modal-toggle="shippingModal"
                    class="w-full flex items-center gap-3 p-4 border border-gray-300 rounded-lg hover:border-gray-400 transition cursor-pointer bg-white text-left">
                    <div class="w-10 h-10 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-truck text-gray-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div id="shipping_label" class="text-sm font-medium text-gray-900">{{ old('shipping_method', request('shipping_method', 'Reguler (5 - 6 Days)')) }}</div>
                        <div class="text-xs text-gray-500">Tap to change</div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                </button>
            </div>

            {{-- Payment Method --}}
            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <h2 class="text-lg font-semibold mb-4">Payment Method</h2>
                <button type="button" data-modal-target="paymentModal" data-modal-toggle="paymentModal"
                    class="w-full flex items-center gap-3 p-4 border border-gray-300 rounded-lg hover:border-gray-400 transition cursor-pointer bg-white text-left">
                    <div class="w-10 h-10 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-qrcode text-gray-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div id="payment_label" class="text-sm font-medium text-gray-900">{{ old('payment_method', request('payment_method', 'QRIS')) }}</div>
                        <div class="text-xs text-gray-500">Tap to change</div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                </button>

                @if($selectedPayment === 'qris')
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <div class="flex flex-col items-center gap-3 mb-4">
                        <img src="{{ asset('images/qris-clothify.jpeg') }}" alt="QRIS Clothify" class="w-56 h-56 object-contain border-2 border-gray-200 rounded-xl">
                        <p class="text-xs text-gray-500 text-center">Scan QR di atas menggunakan e-wallet atau mobile banking Anda</p>
                    </div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" accept="image/*"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm bg-white">
                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG. Maks 2MB.</p>
                </div>
                @endif
            </div>

            <button type="submit"
                class="w-full py-3.5 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition cursor-pointer mt-2">
                BUY NOW
            </button>
            </form> 

        </div>
    </div>

    {{-- KOLOM KANAN: ORDER SUMMARY --}}
    <div class="w-full md:w-[384px] flex-shrink-0 sticky top-[100px] h-fit">
        <div class="bg-white border border-gray-200 rounded-xl p-6">

            @foreach($order as $index => $item)
            @php
            $produk = $produk->firstWhere('id_produk', $item['id_produk']);
            $harga = $item['harga_satuan'] ?? ($produk ? $produk->harga_produk : 0);
            $qty = $item['jumlah_produk'] ?? 1;
            @endphp

            <div class="flex gap-4 pb-6 border-b border-gray-100 {{ !$loop->last ? 'mb-6' : '' }}">
                <img src="{{ $produk && $produk->foto_produk ? asset('storage/' . $produk->foto_produk) : 'https://placehold.co/80x100/e2e8f0/64748b?text=IMG' }}"
                    alt="{{ $produk->nama_produk ?? 'Product' }}"
                    class="w-20 h-[100px] object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold truncate">{{ $produk->nama_produk ?? 'Product not found' }}</div>
                    <div class="text-xs text-gray-500 mt-1">Size: {{ strtoupper($item['size_produk'] ?? '-') }}</div>
                    <div class="text-xs text-gray-500 mt-1">Qty: {{ $qty }}</div>
                </div>
                <div class="text-sm font-semibold whitespace-nowrap">
                    Rp {{ number_format($harga * $qty, 0, ',', '.') }}
                </div>
            </div>
            @endforeach

            {{-- Summary --}}
            <div class="mt-6 text-sm space-y-3">
                <div class="flex justify-between text-gray-600">
                    <span>SUBTOTAL</span>
                    <span>Rp {{ number_format($paymentCalc['subtotal'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>SHIPPING</span>
                    <span>Rp {{ number_format($paymentCalc['ongkir'], 0, ',', '.') }}</span>
                </div>
            </div>

            <hr class="my-4 border-gray-200">

            <div class="flex justify-between items-center">
                <span class="font-semibold">TOTAL AMOUNT</span>
                <span class="text-lg font-bold">Rp {{ number_format($paymentCalc['total'], 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>
</div>

{{-- MODAL SHIPPING --}}
<x-modal id="shippingModal" title="Select Shipping Method">
    <div class="flex flex-col gap-3">
        <label onclick="selectShipping('reguler', 'Reguler (5 - 6 Days)')" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-gray-900 hover:bg-gray-50 transition">
            <div class="w-8 h-8 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-truck text-gray-600 text-sm"></i></div>
            <span class="text-sm font-medium text-gray-900">Reguler (5 - 6 Days)</span>
        </label>
        <label onclick="selectShipping('express', 'Express (3 - 4 Days)')" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-gray-900 hover:bg-gray-50 transition">
            <div class="w-8 h-8 bg-yellow-50 rounded-md flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-bolt text-yellow-600 text-sm"></i></div>
            <span class="text-sm font-medium text-gray-900">Express (3 - 4 Days)</span>
        </label>
    </div>
</x-modal>

{{-- MODAL PAYMENT --}}
<x-modal id="paymentModal" title="Select Payment Method">
    <div class="flex flex-col gap-3">
        <label onclick="selectPayment('qris', 'QRIS')" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-gray-900 hover:bg-gray-50 transition">
            <div class="w-8 h-8 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-qrcode text-gray-600 text-sm"></i></div>
            <span class="text-sm font-medium text-gray-900">QRIS</span>
        </label>
    </div>
</x-modal>

@endsection