<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function index()
    {
        $transactions = Transaction::where('userid', '=', Auth::id())->get();
        return view('pages.transaction', ['transactions' => $transactions]);
    }

    public function store($user_id)
    {
        $cart = Cart::where('userid', $user_id)->get();
        $new_transaction = new Transaction;
        $new_transaction->userid = $user_id;
        $new_transaction->date = Carbon::now()->toDate();
        $new_transaction->save();
        foreach ($cart as $content) {
            $new_transaction_detail = new TransactionDetail;
            $new_transaction_detail->transactionid = $new_transaction->id;
            $new_transaction_detail->productid = $content->product->id;
            $new_transaction_detail->quantity = $content->quantity;
            $new_transaction_detail->save();
        }
        Cart::where('userid', $user_id)->delete();
        return redirect(route('transactions.index', ['user_id'=>Auth::id()]));
    }
}
