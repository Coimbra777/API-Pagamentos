<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InvoiceResource::collection(Invoice::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = $this->validation($request);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $invoice = Invoice::create($validation->validated());
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new InvoiceResource(Invoice::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function validation(Request $request)
    {
        $validation = [
            'user_id' => 'required',
            'type' => 'required|max:1',
            'paid' => 'required|numeric|between:0,1',
            'payment_date' => 'nullable',
            'value' => 'required|numeric|between:0,99999.99',
        ];

        $messages = [
            'user_id.required' => 'O campo user_id é obrigatório',
            'type.required' => 'O campo type é obrigatório',
            'paid.required' => 'O campo paid é obrigatório',
            'paid.numeric' => 'O campo paid deve ser um número',
            'paid.between' => 'O campo paid deve ter um valor entre 0 e 1',
            'value.required' => 'O campo value é obrigatório',
            'value.numeric' => 'O campo value deve ser um número',
            'value.between' => 'O campo value deve ter um valor entre 0 e 99999.99',
            'payment_date.numeric' => 'O campo payment_date deve ser um número',
        ];

        return Validator::make($request->all(), $validation, $messages);
    }
}
