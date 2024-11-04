<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($product) {
                                $product->where('users_id', Auth::user()->id);
                            })->get();

        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id);
                            })->get();

        return view('pages.dashboard-transaction', [
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details()
    {
        return view('pages.dashboard-transaction-details');
    }
}
