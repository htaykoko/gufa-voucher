<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'currency_exchange_rate' => 'nullable',

            // orderd details data
            'product_name.*' => 'required',
            'quantity.*' => 'required',
            'unit_id.*' => 'required',
            'unit_qty.*' => 'required',
            'price.*' => 'required',
        ];
    }
}
