<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Produk::count();
        $pendingOrders = Pemesanan::where('status', 'pending')->count();
        $completedOrders = Pemesanan::where('status', 'completed')->count();

        $monthlyRevenue = Pemesanan::where('status', 'completed')
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('total_harga');

        $latestOrders = Pemesanan::with('pembeli')
            ->orderByDesc('tanggal')
            ->limit(5)
            ->get();

        $lowStockProducts = Produk::where(function ($query) {
            $query->where(DB::raw('stok_s + stok_m + stok_l + stok_xl'), '<', 10);
        })->limit(5)->get();

        return view('pages.admin.homeAdmin', compact(
            'totalProducts',
            'pendingOrders',
            'completedOrders',
            'monthlyRevenue',
            'latestOrders',
            'lowStockProducts'
        ));
    }
}
