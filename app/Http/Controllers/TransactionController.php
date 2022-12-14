<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show(){
        $transactions = Transaction::all()
        ->where('userid','=', auth()->id());

        return view('pages.transaction', ['transactions' => $transactions]);
    }
}
