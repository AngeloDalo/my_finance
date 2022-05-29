@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <?php
                global $totale_complessivo_stocks;
                ?>
            @foreach ($assets as $asset)
            @if ($asset->gruppo_id == 2)
                <?php
                $totale_complessivo_stocks += $asset->ammontare * $asset->prezzo_singolo;
                ?>
            @endif
            @endforeach
            <h1>STOCKS</h1>

            @foreach ($assets as $asset)
                <div class="row">
                @if ($asset->gruppo_id == 2)
                    <?php
                    $totale = $asset->ammontare * $asset->prezzo_singolo;
                    ?>
                    <div class="col-4">{{ $asset->nome }}</div>
                    <div class="col-4">{{ $totale }}&euro;</div>
                    <div class="col-4">
                        <?php
                            $totale_stocks = ($totale*100)/$totale_complessivo_stocks;
                            echo round($totale_stocks, 2) . '%';
                        ?>
                    </div>
                @endif
                </div>
            @endforeach
            </div>
            <div class="col-12">
                <?php
                global $totale_complessivo_crypto;
                ?>
            @foreach ($assets as $asset)
            @if ($asset->gruppo_id == 1)
                <?php
                $totale_complessivo_crypto += $asset->ammontare * $asset->prezzo_singolo;
                ?>
            @endif
            @endforeach
            <h1>CRYPTO</h1>

            @foreach ($assets as $asset)
                <div class="row">
                @if ($asset->gruppo_id == 1)
                    <?php
                    $totale = $asset->ammontare * $asset->prezzo_singolo;
                    ?>
                    <div class="col-4">{{ $asset->nome }}</div>
                    <div class="col-4">{{ $totale }}&euro;</div>
                    <div class="col-4">
                        <?php
                            $totale_crypto = ($totale*100)/$totale_complessivo_crypto;
                            echo round($totale_crypto, 2) . '%';
                        ?>
                    </div>
                @endif
                </div>
            @endforeach
            </div>
            <div class="col-12">
                <?php
                global $totale_complessivo_euro;
            ?>
            @foreach ($assets as $asset)
            @if ($asset->gruppo_id == 3)
                <?php
                $totale_complessivo_euro += $asset->ammontare * $asset->prezzo_singolo;
                ?>
            @endif
            @endforeach
            <h1>LIQUIDITA'</h1>

            @foreach ($assets as $asset)
                <div class="row">
                @if ($asset->gruppo_id == 3)
                    <?php
                    $totale = $asset->ammontare * $asset->prezzo_singolo;
                    ?>
                    <div class="col-4">{{ $asset->nome }}</div>
                    <div class="col-4">{{ $totale }}&euro;</div>
                    <div class="col-4">
                        <?php
                            $totale_euro = ($totale*100)/$totale_complessivo_euro;
                            echo round($totale_euro, 2) . '%';
                        ?>
                    </div>
                @endif
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
