<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history()
    {
        $orders = Pemesanan::with(['detailPemesanan.produk'])
            ->where('id_pembeli', Auth::id())
            ->orderByDesc('tanggal')
            ->get();

        return view('pages.history', compact('orders'));
    }

    public function markAsDone($id)
    {
        $order = Pemesanan::where('id_pemesanan', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        if ($order->status !== 'processed') {
            return back()->with('error', 'Only processed orders can be marked as done.');
        }

        $order->status = 'completed';
        $order->save();

        return back()->with('success', 'Order marked as completed!');
    }
}
