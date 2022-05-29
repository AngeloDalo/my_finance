<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Transaction;
use App\Asset;
use App\Group;
use App\Type;
use App\Code;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Call\Call;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('data', 'desc')->paginate(10);
        $groups = Group::all();
        $codes = Code::all();
        $types = Type::all();
        return view('admin.transactions.index', ['transactions' => $transactions, 'groups' => $groups, 'types' => $types, 'codes' => $codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $codes = Code::all();
        $types = Type::all();
        return view('admin.transactions.create', ['groups' => $groups, 'codes' => $codes, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $group = Group::select('nome')->where('id', $data['groups'][0])->first();
        $group = $group->nome;
        $code = Code::select('code')->where('id', $data['codes'][0])->first();
        $code = $code->code;
        $type = Type::select('nome')->where('id', $data['types'][0])->first();
        $type = $type->nome;
        $validateData = $request->validate([
            'totale' => 'required',
            'data' => 'required',
            'groups.*' => 'nullable|exists:App\Group,id',
            'codes.*' => 'nullable|exists:App\Code,id',
            'types.*' => 'nullable|exists:App\Type,id',
        ]);
        $transaction = new Transaction();
        $transaction->fill($data);
        $transaction->gruppo_id = $data['groups'][0];
        $transaction->tipo_id = $data['types'][0];
        $transaction->codice_id = $data['codes'][0];
        $transaction->save();
        return view('admin.transactions.show', ['transaction' => $transaction, 'group' => $group, 'code' => $code, 'type' => $type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $group = Group::select('nome')->where('id', $transaction->gruppo_id)->first();
        $group = $group->nome;
        $type = Type::select('nome')->where('id', $transaction->tipo_id)->first();
        $type = $type->nome;
        $code = Code::select('code')->where('id', $transaction->codice_id)->first();
        $code = $code->code;
        return view('admin.transactions.show', ['transaction' => $transaction, 'group' => $group, 'code' => $code, 'type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $groups = Group::all();
        $codes = Code::all();
        $types = Type::all();
        return view('admin.transactions.edit', ['transaction' => $transaction, 'groups' => $groups, 'codes' => $codes, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'totale' => 'required',
            'data' => 'required',
            'groups.*' => 'nullable|exists:App\Group,id',
            'codes.*' => 'nullable|exists:App\Code,id',
            'types.*' => 'nullable|exists:App\Type,id',
        ]);
        if ($data['totale'] != $transaction->totale) {
            $transaction->totale = $data['totale'];
        }
        if ($data['data'] != $transaction->data) {
            $transaction->data = $data['data'];
        }
        if ($data['groups'][0] != $transaction->gruppo_id) {
            $transaction->gruppo_id = $data['groups'][0];
        }
        if ($data['types'][0] != $transaction->tipo_id) {
            $transaction->tipo_id = $data['types'][0];
        }
        if ($data['codes'][0] != $transaction->codice_id) {
            $transaction->codice_id = $data['codes'][0];
        }
        $transaction->update();
        return redirect()->route('transactions.show', $transaction->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('status', "Transazione id: $transaction->id cancellato");
        }
    }
}
