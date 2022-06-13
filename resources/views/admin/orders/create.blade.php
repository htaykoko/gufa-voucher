<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl-w-12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('admin.orders.store') }}" method="POST" id="form">
                            @method('post')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="date"
                                                class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" name="date" value="{{ old('date') }}" id="date"
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
                                                        {{ $customer->id == old('customer_id') }}>
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- entry --}}
                                    <div id="add-order">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-1 sm:col-span-1">
                                                <label for="product_name"
                                                    class="block text-sm text-center font-medium text-gray-700">Code</label>
                                                <input type="text" name="product_name[]" id="product_name"
                                                    autocomplete="product_name-name"
                                                    class="product_name mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-1 sm:col-span-1">
                                                <label for="quantity"
                                                    class="block text-sm text-center font-medium text-gray-700">Quantity</label>
                                                <input type="text" name="quantity[]" id="quantity"
                                                    autocomplete="quantity"
                                                    class="quantity mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-1 sm:col-span-1">
                                                <label for="unit_id"
                                                    class="block text-sm text-center font-medium text-gray-700">Unit</label>
                                                <select id="unit_id" name="unit_id[]" autocomplete="unit_id"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="1">Kg</option>
                                                    <option value="2">Cbm</option>
                                                </select>
                                            </div>

                                            <div class="col-span-1 sm:col-span-1">
                                                <label for="unit_qty"
                                                    class="block text-sm text-center font-medium text-gray-700">Weight</label>
                                                <input type="text" name="unit_qty[]" id="unit_qty"
                                                    autocomplete="unit_qty"
                                                    class="unit_qty mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-1 sm:col-span-1">
                                                <label for="price"
                                                    class="block text-sm text-center font-medium text-gray-700">Price</label>
                                                <input type="text" name="price[]" id="price" autocomplete="price"
                                                    class="price mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-1 sm:col-span-1">
                                                <button
                                                    class="mt-5 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-indigo-500"
                                                    id="add_row" type="button">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end entry --}}

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="china_delivery_fee"
                                                class="block text-sm font-medium text-gray-700">China
                                                Delivery
                                                Fee</label>
                                            <input type="text" name="china_delivery_fee"
                                                value="{{ old('china_delivery_fee') }}" id="china_delivery_fee"
                                                autocomplete="china_delivery_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="custom_fee"
                                                class="block text-sm font-medium text-gray-700">Custom Fee</label>
                                            <input type="text" name="custom_fee" value="{{ old('custom_fee') }}"
                                                id="custom_fee" autocomplete="custom_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="delivery_fee"
                                                class="block text-sm font-medium text-gray-700">Delivery
                                                Fee</label>
                                            <input type="text" name="delivery_fee" value="{{ old('delivery_fee') }}"
                                                id="delivery_fee" autocomplete="delivery_fee"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="payment_type"
                                                class="block text-sm font-medium text-gray-700">Payment
                                                Type</label>
                                            <select id="payment_type" name="payment_type" autocomplete="payment_type"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Select</option>
                                                <option value="1" {{ old('payment_type') ? 'selected' : '' }}>Yuan
                                                </option>
                                                <option value="2" {{ old('payment_type') == 2 ? 'selected' : '' }}>
                                                    Kyat
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="currency_exchange_rate"
                                                class="block text-sm font-medium text-gray-700">Currency Exchange
                                                Rate</label>
                                            <input type="text" name="currency_exchange_rate"
                                                value="{{ old('currency_exchange_rate') }}"
                                                id="currency_exchange_rate" autocomplete="currency_exchange_rate"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <select id="currency_exchange_unit" name="currency_exchange_unit"
                                                autocomplete="currency_exchange_unit"
                                                class="mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Select</option>
                                                <option value="yum"
                                                    {{ old('currency_exchange_rate') == 'Yum' ? 'selected' : '' }}>
                                                    Yum
                                                </option>
                                                <option value="kyat"
                                                    {{ old('currency_exchange_rate') == 'Kyat' ? 'selected' : '' }}>
                                                    Kyat
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" id="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                            <input type="hidden" name="total_item" id="total_item" value="1" />
                            <input type="hidden" name="save_final_total_amt" id="save_final_total_amt" value="0" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

<script>
    // function addFun() {
    var count = 1;
    $(document).on('click', '#add_row', function() {
        count++;
        // $('#total_item').val(count);
        var html_code = '';
        html_code += '<div class="grid grid-cols-6 gap-6" id="row_id_' + count + '">';
        html_code += '    <div class="col-span-1 sm:col-span-1">';
        html_code += '        <input type="text" name="product_name[]" id="product_name"';
        html_code += '            autocomplete="product_name-name"';
        html_code +=
            '            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
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
        $('#row_id_' + row_id).remove();
        count--;
    });
    //End Remove Item Row'

    //validate before submit
    // $(document).on('click', '#submit', function(e) {
    //     console.log("clkl");
    //     var product_name, quantity, unit_qty, price;

    //     $('#add-order').find(".product_name").each(function(k, v) {
    //         console.log(k, v);
    //         product_name = v;
    //     });
    //     if (product_name <= 0) {
    //         alert("Promotion product Item are required");
    //         // $(e.target).closest('tbody').find(".promo-error").first().html(
    //         //     '<span class="error mt-2 text-danger">At Least One Promotion Product Quantity is Required</span>'
    //         // );
    //         // $(e.target).closest('tbody').find(".pro-quantity").first().focus();
    //         return false;
    //     }

    //     $("#form").submit();
    // });
</script>
