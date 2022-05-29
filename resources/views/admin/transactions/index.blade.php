@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row row-title-index mt-3">
        <h1 class="fw-bold">LE MIE TRANSAZIONI</h1>
    </div>
    <!--message delate-->
    <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table border border-success text-center">
                <thead>
                    <tr class="table-success">
                        <th>GRUPPO</th>
                        <th>CODICE</th>
                        <th>TIPO</th>
                        <th>TOTALE</th>
                        <th>DATA</th>
                        <th>MODIFICA</th>
                        <th>ELIMINA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                @switch($transaction->gruppo_id)
                                @case(1)
                                    Crypto
                                    @break
                                @case(2)
                                    Stocks
                                    @break
                                @case(3)
                                    Euro
                                    @break
                                @default
                                    Altro
                                @endswitch
                            </td>
                            <td>
                                @switch($transaction->codice_id)
                                @case(1)
                                    ETH
                                    @break
                                @case(2)
                                    stETH
                                    @break
                                @case(3)
                                    ATOM
                                    @break
                                @case(4)
                                    stATOM
                                    @break
                                @case(5)
                                    CRO
                                    @break
                                @case(6)
                                    CRE
                                    @break
                                @case(7)
                                    MEX
                                    @break
                                @case(8)
                                    EGLD
                                    @break
                                @case(9)
                                    CSPR
                                    @break
                                @case(10)
                                    NOM
                                    @break
                                @case(11)
                                    MEME
                                    @break
                                @case(12)
                                    IWDA-ETF-IE
                                    @break
                                @case(13)
                                    CSPX-ETF-IE
                                    @break
                                @case(14)
                                    IWMO-ETF-US
                                    @break
                                @case(15)
                                    EURO
                                    @break
                                @default
                                    Altro
                                @endswitch
                            </td>
                            <td>
                                @switch($transaction->tipo_id)
                                @case(1)
                                    Entrate
                                    @break
                                @case(2)
                                    Uscita
                                    @break
                                @default
                                    Altro
                                @endswitch
                            </td>
                            <td>{{ $transaction->totale }}&euro;</td>
                            <td>{{ $transaction->data }}</td>
                            <td>
                                <a class="btn btn-success text-white"
                                    href="{{ route('transactions.edit', $transaction->id) }}">MODIFICA</a>
                            </td>
                            <td>
                                <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="ELIMINA">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endsection

