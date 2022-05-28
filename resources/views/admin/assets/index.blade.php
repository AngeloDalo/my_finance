@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row row-title-index mt-3">
        <h1 class="fw-bold">I MIEI ASSET</h1>
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
                        <th>NOME</th>
                        <th>QUANTITA'</th>
                        <th>PREZZO SINGOLO</th>
                        <th>APY</th>
                        <th>TOTALE</th>
                        <th>GUADAGNA GIORNALIERO</th>
                        <th>GUADAGNO MENSILE</th>
                        <th>GUADAGNO ANNUALE</th>
                        <th>MODIFICA</th>
                        <th>ELIMINA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>
                                @switch($asset->gruppo_id)
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
                                @switch($asset->codice_id)
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
                            <td>{{ $asset->nome }}</td>
                            <td>{{ $asset->ammontare }}</td>
                            <td>{{ $asset->prezzo_singolo }}&euro;</td>
                            <td>{{ $asset->apy }}%</td>
                            <?php
                            $totale = $asset->ammontare * $asset->prezzo_singolo;
                            echo "<td>" . $totale . "€</td>";
                            $guadagno_annuale = (($totale/100)*$asset->apy);
                            $guadagno_mensile = $guadagno_annuale/12;
                            $guadagno_giornaliero = $guadagno_annuale/365;
                            echo "<td>" . round($guadagno_giornaliero, 2) . "€</td>";
                            echo "<td>" . round($guadagno_mensile, 2) . "€</td>";
                            echo "<td>" . round($guadagno_annuale, 2) . "€</td>";
                            ?>
                            {{-- <td><a class="btn btn-success text-white"
                                    href="{{ route('transactions.show', $transaction->id) }}">VEDI</a></td> --}}
                            <td>
                                <a class="btn btn-success text-white"
                                    href="{{ route('assets.edit', $asset->id) }}">MODIFICA</a>
                            </td>
                            <td>
                                <form action="{{ route('assets.destroy', $asset) }}" method="post">
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
            {{ $assets->links() }}
        </div>
    </div>
</div>
@endsection

