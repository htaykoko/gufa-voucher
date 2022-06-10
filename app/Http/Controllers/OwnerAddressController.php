<?php

namespace App\Http\Controllers;

use App\Models\OwnerAddress;
use Illuminate\Http\Request;

class OwnerAddressController extends Controller
{

    public function edit(OwnerAddress $data)
    {
        return view("admin.owner_addresses.edit", [
            "data" => $data
        ]);
    }


    public function update(Request $request, OwnerAddress $model)
    {
        $data = $request->validate([
            'address1' => 'required',
            'address2' => 'required',
        ]);
        $model->update($data);
        return redirect()->route('admin.owner_addresses.edit')->with("success", config('messages.updateSuccess'));
    }
}
