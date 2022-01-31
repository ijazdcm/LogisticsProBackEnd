<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bank\BankInfoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Bank\Bank_info;
use App\Http\Requests\Bank\BankStoreRequest;

class BankMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cache::remember('bank', now()->addDecade(), function () {

            return BankInfoResource::collection(Bank_info::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankStoreRequest $request)
    {
         $new_bank =Bank_info::create($request->validated());
        return  BankInfoResource::make(Bank_info::find($new_bank->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank_active = Bank_info::where('bank_status', 1)
        ->where('id', $id)
        ->first();

    if ($bank_active) {
        return  BankInfoResource::make($bank_active);
    }

    return response()->json(['message' => 'Bank  Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankStoreRequest $request, $id)
    {
        $old_bank = Bank_info::where('bank_status', 1)
            ->where('id', $id)
            ->first();

        if ($old_bank) {
            $old_bank->update($request->validated());
            return  BankInfoResource::make($old_bank);
        }

        return response()->json(['message' => 'Bank Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank_info::where('id', $id)->first();
        if ($bank) {
             $status=($bank->bank_status==0)?1:0;
            $bank->update([$bank->bank_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Bank Not found'], 404);
        }
    }
}
