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
                <h2 class="text-uppercase"><span class="text-success">MODIFICA ASSET: </span> {{ $asset->nome }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('assets.update', $asset->id) }}" method="post"
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

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">NOME</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="{{ $asset->nome }}">
                            </div>
                            <p id="demo1"></p>
                            @error('nome')
                                <div class="alert alert-success">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">QUANTITA'</label>
                                <input type="text" class="form-control" id="ammontare" name="ammontare" value="{{ $asset->ammontare }}">
                            </div>
                            <p id="demo2"></p>
                            @error('ammontare')
                                <div class="alert alert-success">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">PREZZO SINGOLO</label>
                                <input type="text" class="form-control" id="prezzo_singolo" name="prezzo_singolo" value="{{ $asset->prezzo_singolo }}">
                            </div>
                            <p id="demo3"></p>
                            @error('prezzo_singolo')
                                <div class="alert alert-success">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold">APY</label>
                                <input type="text" class="form-control" id="apy" name="apy" value="{{ $asset->apy }}">
                            </div>
                            <p id="demo4"></p>
                            @error('apy')
                                <div class="alert alert-success">{{ $message }}</div>
                            @enderror
                    </div>
                        <button type="button" class="btn btn-success text-white" onclick="validationForm()"
                            value="Submit form">SALVA</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validationForm() {
            let nome = document.getElementById('nome').value;
            let error1 = document.getElementById('demo1');
            let ammontare = document.getElementById('ammontare').value;
            let error2 = document.getElementById('demo2');
            let prezzo_singolo = document.getElementById('prezzo_singolo').value;
            let error3 = document.getElementById('demo3');
            let apy = document.getElementById('apy').value;
            let error4 = document.getElementById('demo4');

            let message = "";
            let error = 0;

            if (!nome || !nome.trim()) {
                message = 'NOME NON VALIDO';
                error = 1;
                error1.innerHTML = message;
                error1.classList.add("alert");
                error1.classList.add("alert-danger");
            } else {
                error1.innerHTML = "";
                error1.classList.remove("alert");
                error1.classList.remove("alert-danger");
            }

            if (!ammontare) {
                message = 'QUANTITA\' NON VALIDA NON VALIDA';
                error = 1;
                error2.innerHTML = message;
                error2.classList.add("alert");
                error2.classList.add("alert-danger");
            } else {
                error2.innerHTML = "";
                error2.classList.remove("alert");
                error2.classList.remove("alert-danger");
            }

            if (!prezzo_singolo || prezzo_singolo<0) {
                message = 'PREZZO PER UNITA\' NON VALIDO';
                error = 1;
                error3.innerHTML = message;
                error3.classList.add("alert");
                error3.classList.add("alert-danger");
            } else {
                error3.innerHTML = "";
                error3.classList.remove("alert");
                error3.classList.remove("alert-danger");
            }

            if (!apy || apy<0) {
                message = 'APY NON VALIDO';
                error = 1;
                error4.innerHTML = message;
                error4.classList.add("alert");
                error4.classList.add("alert-danger");
            } else {
                error4.innerHTML = "";
                error4.classList.remove("alert");
                error4.classList.remove("alert-danger");
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
