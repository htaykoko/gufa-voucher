<?php

namespace App\Http\Controllers;

use App\Models\OwnerAddress;
use Illuminate\Http\Request;

class OwnerAddressController extends Controller
{

    public function edit($id)
    {
        return view("admin.owner_addresses.edit", [
            "data" => OwnerAddress::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'address1' => 'required',
            'address2' => 'required',
        ]);
        $model = OwnerAddress::find($id);
        $model->update($data);
        return view("admin.owner_addresses.edit", [
            "data" => $model
        ])->with("success", config('messages.updateSuccess'));
    }
}
