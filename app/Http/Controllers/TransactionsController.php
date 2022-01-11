<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index()
    {
        $items = Transaction::where('users_id', Auth::user()->id)->with([
            'details', 'travel_package', 'user'
        ])->paginate(5);
        // var_dump($items);
        // die;
        // findOrFail(['users_id' => Auth::user()->id])
        return view('pages.pesanan', [
            'items' => $items,
            'page' => 'pesanan'
        ]);
    }

    public function detail($id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.pesanan-detail', [
            'item' => $item,
            'page' => 'pesanan'
        ]);
    }
}
