@extends('layouts.main')

@section('title', 'Admin Orders - CLOTHIFY')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-10">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Order Management</h1>
        <span class="text-sm text-gray-500">Clothify Admin Panel</span>
    </div>

    <!-- TABLE -->
    <div class="bg-white shadow-md rounded-2xl overflow-hidden">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left">Customer</th>
                    <th class="px-6 py-3 text-left">Order ID</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody>

                @php
                $orders = [
                    [
                        'id' => '#ORD001',
                        'name' => 'Affatha',
                        'total' => 270000,
                        'status' => 'pending',
                        'items' => [
                            ['name' => 'T-Shirt Oversize', 'price' => 150000],
                            ['name' => 'Casual Pants', 'price' => 120000],
                        ]
                    ],
                    [
                        'id' => '#ORD002',
                        'name' => 'Rizky',
                        'total' => 200000,
                        'status' => 'process',
                        'items' => [
                            ['name' => 'Cargo Pants', 'price' => 200000],
                        ]
                    ],
                ];
                @endphp

                @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $order['name'] }}</td>
                    <td class="px-6 py-4">{{ $order['id'] }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($order['total']) }}</td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs text-white
                            @if($order['status'] == 'pending') bg-yellow-500
                            @elseif($order['status'] == 'process') bg-blue-500
                            @else bg-green-500
                            @endif">
                            {{ ucfirst($order['status']) }}
                        </span>
                    </td>

                    <td class="px-6 py-4 flex gap-2">
                        <button onclick='openModal(@json($order))'
                            class="bg-gray-900 text-white px-3 py-1 rounded-lg text-xs hover:bg-black">
                            Detail
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

<!-- MODAL -->
<div id="modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white w-[400px] rounded-2xl p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Order Detail</h2>
            <button onclick="closeModal()" class="text-gray-500">&times;</button>
        </div>

        <!-- CONTENT -->
        <div id="modalContent"></div>

        <!-- ACTION -->
        <div class="mt-6 flex justify-end gap-2">
            <button onclick="closeModal()" 
                class="px-4 py-2 bg-gray-200 rounded-lg">
                Close
            </button>

            <button onclick="acceptOrder()" 
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Accept Order
            </button>
        </div>

    </div>
</div>

<!-- SCRIPT -->
<script>
function openModal(order) {
    let html = `
        <p class="text-sm text-gray-500 mb-2">${order.id}</p>
        <p class="font-medium mb-4">${order.name}</p>

        <div class="space-y-2">
    `;

    order.items.forEach(item => {
        html += `
            <div class="flex justify-between text-sm">
                <span>${item.name}</span>
                <span>Rp ${item.price.toLocaleString()}</span>
            </div>
        `;
    });

    html += `
        </div>

        <div class="border-t mt-4 pt-3 flex justify-between font-semibold">
            <span>Total</span>
            <span>Rp ${order.total.toLocaleString()}</span>
        </div>
    `;

    document.getElementById('modalContent').innerHTML = html;
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function acceptOrder() {
    alert('Order Accepted (dummy)');
    closeModal();
}
</script>

@endsection