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
            'china_delivery_fee' => 'nullable',
            'custom_fee' => 'nullable',
            'delivery_fee' => 'nullable',
            'payment_type' => 'required',
            'currency_exchange_rate' => 'required_if:payment_type,2',
            'currency_exchange_unit' => 'required_with:currency_exchange_rate,',

            // orderd details data
            'product_name.*' => 'required',
            'quantity.*' => 'required',
            'unit_id.*' => 'required',
            'unit_qty.*' => 'required',
            'price.*' => 'required',
        ];
    }
}
