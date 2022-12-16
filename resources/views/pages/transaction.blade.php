@include('partials.header', ['title' => 'Transaction History - MaiBoutique'])

<div class='h-auto p-5 mb-auto'>
    @if($transactions->empty())
        <h2 class="flex justify-center items-center text-3xl font-bold">No Transactions!!</h2>
    @endif
    @foreach ($transactions as $transaction)
        <div class="transaction-card rounded-lg bg-gray-200 p-4 my-2">
            <h4 class="font-bold text-xl">
                {{$transaction->date}}
            </h4>

            <div class="item-list my-1 px-4">
                @foreach ($transaction->details as $detail)
                <ul class="list-disc">
                    <li>{{$detail->quantity}} pc(s)  {{$detail->product->name}} &emsp; Rp. {{$detail->product->price}}
                    </li>
                </ul>
            @endforeach
            </div>


            <h4 class="font-bold text-xl">
                Total Price
                Rp. {{collect($transaction->details)->reduce(function ($acc, $new) {
                return $acc + $new->product->price * $new->quantity;
                })}}
            </h4>
        </div>
    @endforeach
</div>

@include('partials.footer')
