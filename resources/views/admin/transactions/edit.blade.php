@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container border border-success rounded-3 p-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase"><span class="text-success">MODIFICA TRANSAZIONE: </span> {{ $transaction->id }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('transactions.update', $transaction->id) }}" method="post"
                    enctype="multipart/form-data" id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                            @error('groups.*')
                            <div class="alert alert-success mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                            <fieldset class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">GRUPPO</label>
                                <div class="container">
                                    <div class="d-flex row">
                                        @foreach ($groups as $group)
                                            <div class="form-check col-12 col-md-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $group->id }}"
                                                    name="groups[]"
                                                    {{ in_array($group->id, old('groups', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $group->nome }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            @error('codes.*')
                            <div class="alert alert-success mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                            <fieldset class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">CODICE</label>
                                <div class="container">
                                    <div class="d-flex row">
                                        @foreach ($codes as $code)
                                            <div class="form-check col-12 col-md-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $code->id }}"
                                                    name="codes[]"
                                                    {{ in_array($code->id, old('codes', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $code->code }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            @error('types.*')
                            <div class="alert alert-success mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                            <fieldset class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">TIPO</label>
                                <div class="container">
                                    <div class="d-flex row">
                                        @foreach ($types as $type)
                                            <div class="form-check col-12 col-md-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $type->id }}"
                                                    name="types[]"
                                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $type->nome }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">TOTALE</label>
                                <input type="text" class="form-control" id="totale" name="totale"
                                    value="{{ $transaction->totale }}">
                            </div>
                            <p id="demo1"></p>
                            @error('totale')
                                <div class="alert alert-success">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">DATA TRANSAZIONE</label>
                                <input type="date" onload="getDate()" class="form-control" id="data" value="{{ $transaction->data }}"
                                name="data">
                            </div>
                    </div>
                        <button type="button" class="btn btn-success text-white" onclick="validationForm()"
                            value="Submit form">SALVA</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function getDate(){
            var today = new Date();
            document.getElementById("data").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        }

        function validationForm() {
            let nome = document.getElementById('totale').value;
            let error1 = document.getElementById('demo1');

            let message = "";
            let error = 0;

            if (!totale) {
                message = 'TOTALE NON VALIDO';
                error = 1;
                error1.innerHTML = message;
                error1.classList.add("alert");
                error1.classList.add("alert-danger");
            } else {
                error1.innerHTML = "";
                error1.classList.remove("alert");
                error1.classList.remove("alert-danger");
            }

            if (error == 0) {
                message = "";
                document.getElementById('MyForm').submit();
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
