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

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::orderBy('ammontare', 'desc')->paginate(10);
        $groups = Group::all();
        $codes = Code::all();
        $types = Type::all();
        return view('admin.assets.index', ['assets' => $assets, 'groups' => $groups, 'types' => $types, 'codes' => $codes]);
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
        return view('admin.assets.create', ['groups' => $groups, 'codes' => $codes]);
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
        $validateData = $request->validate([
            'nome' => 'required|max:255',
            'ammontare' => 'required',
            'prezzo_singolo' => 'required',
            'apy' => 'required',
            'groups.*' => 'nullable|exists:App\Group,id',
            'codes.*' => 'nullable|exists:App\Code,id',
        ]);
        $asset = new Asset();
        $asset->fill($data);
        $asset->gruppo_id = $data['groups'][0];
        $asset->codice_id = $data['codes'][0];
        $asset->save();
        return view('admin.assets.show', ['asset' => $asset, 'group' => $group, 'code' => $code]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $group = Group::select('nome')->where('id', $asset->gruppo_id)->first();
        $group = $group->nome;
        $code = Code::select('code')->where('id', $asset->codice_id)->first();
        $code = $code->code;
        return view('admin.assets.show', ['asset' => $asset, 'group' => $group, 'code' => $code]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        {
            $asset->delete();
            return redirect()->route('assets.index')->with('status', "Asset nome: $asset->nome cancellato");
        }
    }
}
