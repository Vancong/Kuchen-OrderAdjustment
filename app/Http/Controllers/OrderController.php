<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with([
            'items.product',
            'items.productVariant',
        ]);

        if ($request->filled('search')) {
            $query->where('code', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('channel')) {
            $query->where('channel', $request->channel);
        }

        $orders = $query->paginate(20)->withQueryString();

        return view('orders.index', compact('orders'));
    }
}
