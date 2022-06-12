<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required',
            'date' => 'required',
            'china_delivery_fee' => 'nullable|numeric|gt:0|numeric|gt:0',
            'custom_fee' => 'nullable|numeric|gt:0',
            'delivery_fee' => 'nullable|numeric|gt:0',
            'payment_type' => 'required',
            'currency_exchange_rate' => 'required_if:payment_type,2|numeric|gt:0',
            'currency_exchange_unit' => 'required_with:currency_exchange_rate,',

            // orderd details data
            'product_name.*' => 'required',
            'quantity.*' => 'required|numeric|gt:0',
            'unit_id.*' => 'required',
            'unit_qty.*' => 'required|numeric|gt:0',
            'price.*' => 'required|numeric|gt:0',
        ];
    }
}
