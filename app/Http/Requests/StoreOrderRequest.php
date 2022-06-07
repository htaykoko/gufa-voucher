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
        return false;
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
            'carry_fee' => 'nullable',
            'delivery_fee' => 'nullable',
            'payment_type' => 'required',
            'currency_exchange_rate' => 'nullable',
        ];
    }
}
