<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminOrderController extends Controller
{
    public function index()
    {
        $pendingOrders = Pemesanan::with('pembeli')
            ->where('status', 'pending')
            ->orderByDesc('tanggal')
            ->paginate(10, ['*'], 'pending_page');

        $processedOrders = Pemesanan::with('pembeli')
            ->where('status', 'processed')
            ->orderByDesc('tanggal')
            ->paginate(10, ['*'], 'processed_page');

        $completedOrders = Pemesanan::with('pembeli')
            ->where('status', 'completed')
            ->orderByDesc('tanggal')
            ->paginate(10, ['*'], 'completed_page');

        return view('pages.admin.orderManagement', compact('pendingOrders', 'processedOrders', 'completedOrders'));
    }

    public function detail($id)
    {
        $order = Pemesanan::with(['pembeli', 'detailPemesanan.produk'])->findOrFail($id);
        return view('admin.order_detail', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!$request->has('status')) {
            return back()->with('error', 'Status wajib dipilih.');
        }

        if (!in_array($request->status, ['processed', 'denied'])) {
            return back()->with('error', 'Status tidak valid. Hanya processed atau denied.');
        }

        $order = Pemesanan::find($id);
        if (!$order) {
            return back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Update status
        $order->status = $request->status;
        $order->save();

        $message = $request->status === 'processed'
            ? 'Order berhasil diterima (Processed)'
            : 'Order berhasil ditolak (Denied)';

        return back()->with('success', $message);
    }
}
