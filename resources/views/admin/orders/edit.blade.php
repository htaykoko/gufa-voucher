<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl-w-12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">
                                Order Edit
                            </h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.orders.index') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition:all .15s ease">
                                Orders
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('admin.orders.update', $data) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="date"
                                                class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" name="date"
                                                value="{{ old('date', $data->date) }}" id="date"
                                                autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="customer_id"
                                                class="block text-sm font-medium text-gray-700">Customer</label>
                                            <select id="customer_id" name="customer_id" autocomplete="customer_id"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        {{ $customer->id == old('customer_id', $data->customer_id) ? 'selected' : '' }}>
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- entry --}}
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-1 sm:col-span-1">
                                            <label
                                                class="block text-sm text-center font-bold text-gray-700">Code</label>
                                            <label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-bold text-gray-700">Quantity
                                            </label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-bold text-gray-700">Unit
                                            </label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-bold text-gray-700">Weight
                                            </label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-bold text-gray-700">Price
                                            </label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <button
                                                class="mt-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-red-700 focus:outline-none focus:ring-indigo-500"
                                                id="add_row" type="button">Add</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="add-order">
                                        @foreach ($data->orderDetail as $item)
                                            <div class="grid grid-cols-6 gap-6" id="row_id_{{ $item->iteration }}">
                                                <div class="col-span-1 sm:col-span-1">
                                                    <input type="text" name="product_name[]"
                                                        value={{ $item->product_name }} id="product_name"
                                                        autocomplete="product_name"
                                                        class="product_name mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-1 sm:col-span-1">
                                                    <input type="text" name="quantity[]"
                                                        value="{{ $item->quantity }}" id="quantity"
                                                        autocomplete="quantity"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-1 sm:col-span-1">
                                                    <select id="unit_id" name="unit_id[]" autocomplete="unit_id"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="1"
                                                            {{ $item->unit_id == 1 ? 'selected' : '' }}>
                                                            Kg</option>
                                                        <option value="2"
                                                            {{ $item->unit_id == 2 ? 'selected' : '' }}>
                                                            Cbm</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-1 sm:col-span-1">
                                                    <input type="text" name="unit_qty[]"
                                                        value="{{ $item->unit_qty }}" id="unit_qty"
                                                        autocomplete="unit_qty"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-1 sm:col-span-1">
                                                    <input type="text" name="price[]" value="{{ $item->price }}"
                                                        id="price" autocomplete="price"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <div class="col-span-1 sm:col-span-1">
                                                    <button
                                                        class="mt-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-indigo-500 remove_row"
                                                        id="{{ $item->iteration }}" type="button">X</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- end entry --}}
                                    <hr>
                                    <input type="hidden" id="total_order"
                                        value="{{ $data->orderDetail()->count() }}">


                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="china_delivery_fee"
                                                class="block text-sm font-medium text-gray-700">China
                                                Delivery
                                                Fee</label>
                                            <input type="text"
                                                value="{{ old('china_delivery_fee', $data->china_delivery_fee) }}"
                                                name="china_delivery_fee" id="china_delivery_fee"
                                                autocomplete="china_delivery_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="custom_fee"
                                                class="block text-sm font-medium text-gray-700">Custom Fee</label>
                                            <input type="text"
                                                value="{{ old('custom_fee', $data->custom_fee) }}"
                                                name="custom_fee" id="custom_fee" autocomplete="custom_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="payment_type"
                                                class="block text-sm font-medium text-gray-700">Payment
                                                Type</label>
                                            <select id="payment_type" name="payment_type"
                                                autocomplete="payment_type-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Select</option>
                                                <option value="1"
                                                    {{ $data->payment_type == old('payment_type', 1) ? 'selected' : '' }}>
                                                    Yuan</option>
                                                <option value="2"
                                                    {{ $data->payment_type == old('payment_type', 2) ? 'selected' : '' }}>
                                                    Kyat</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="currency_exchange_rate"
                                                class="block text-sm font-medium text-gray-700">Currency Exchange
                                                Rate</label>
                                            <input type="text"
                                                value="{{ old('currency_exchange_rate', $data->currency_exchange_rate) }}"
                                                name="currency_exchange_rate" id="currency_exchange_rate"
                                                autocomplete="currency_exchange_rate"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <select id="currency_exchange_unit" name="currency_exchange_unit"
                                                autocomplete="currency_exchange_unit"
                                                class="mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Select</option>
                                                <option value="yum"
                                                    {{ old('currency_exchange_rate') == old('currency_exchange_unit', 'Yum') ? 'selected' : '' }}>
                                                    Yum
                                                </option>
                                                <option value="kyat"
                                                    {{ old('currency_exchange_rate') == old('currency_exchange_unit', 'Kyat') ? 'selected' : '' }}>
                                                    Kyat
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="delivery_fee"
                                                class="block text-sm font-medium text-gray-700">Delivery
                                                Fee</label>
                                            <input type="text"
                                                value="{{ old('delivery_fee', $data->delivery_fee) }}"
                                                name="delivery_fee" id="delivery_fee" autocomplete="delivery_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="status"
                                                class="block text-sm font-medium text-gray-700">Order
                                                Status</label>
                                            <select id="status" name="status" autocomplete="status"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                                    Paid</option>
                                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>
                                                    UnPaid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                            <input type="hidden" name="total_item" id="total_item" value="1" />
                            <input type="hidden" name="save_final_total_amt" id="save_final_total_amt"
                                value="0" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

<script>
    // function addFun() {
    var count = $("#total_order").val() + 1;
    $(document).on('click', '#add_row', function() {
        count++;
        // $('#total_item').val(count);
        var html_code = '';
        html_code += '<div class="grid grid-cols-6 gap-6" id="row_id_' + count + '">';
        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <input type="text" name="product_name[]" id="product_name"';
        html_code += '            autocomplete="product_name"';
        html_code +=
            '            class="product_name mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
        html_code += '    </div>';

        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <input type="text" name="quantity[]" id="quantity" autocomplete="quantity"';
        html_code +=
            '            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
        html_code += '    </div>';

        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <select id="unit_id" name="unit_id[]" autocomplete="unit_id"';
        html_code +=
            '            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">';
        html_code += '            <option value="1">Kg</option>';
        html_code += '            <option value="2">Cbm</option>';
        html_code += '        </select>';
        html_code += '    </div>';

        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <input type="text" name="unit_qty[]" id="unit_qty"';
        html_code += '            autocomplete="unit_qty"';
        html_code +=
            '            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
        html_code += '    </div>';

        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <input type="text" name="price[]" id="price" autocomplete="price"';
        html_code +=
            '            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
        html_code += '    </div>';
        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <button';
        html_code +=
            '            class="mt-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 remove_row"';
        html_code += '           type="button" id="' + count + '">X</button>';
        html_code += '    </div>';
        html_code += '</div>';

        $('#add-order').append(html_code);
    });
    // }

    //Remove Item Row
    $(document).on('click', '.remove_row', function() {
        var row_id = $(this).attr("id");
        // var total_item_amount = $('#order_item_amount_ks' + row_id).val();
        // var final_amount = $('#final_total_amt').text();
        // var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
        // $('#final_total_amt').text(result_amount);
        $('#row_id_' + row_id).remove();
        count--;
        // $('#total_item').val(count);
    });
    //End Remove Item Row

    $(document).delegate(".product_name", "keypress", function() {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
</script>
