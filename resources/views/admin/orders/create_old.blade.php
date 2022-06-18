    @if (old('product_name') != '' || old('quantity') != '' || old('unit_qty') != '' || old('price') != '')
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-1 sm:col-span-1">
                <label for="product_name" class="block text-sm text-center font-medium text-gray-700">Code</label>
                <input type="text" name="product_name[]" id="product_name" autocomplete="product_name"
                    value="{{ old('product_name')[0] }}"
                    class="product_name mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="quantity" class="block text-sm text-center font-medium text-gray-700">Quantity</label>
                <input type="text" name="quantity[]" id="quantity" autocomplete="quantity"
                    value="{{ old('quantity')[0] }}"
                    class="quantity mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="unit_id" class="block text-sm text-center font-medium text-gray-700">Unit</label>
                <select id="unit_id" name="unit_id[]" autocomplete="unit_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1" {{ old('unit_id')[0] == 1 ? 'selected' : '' }}>Kg</option>
                    <option value="2" {{ old('unit_id')[0] == 2 ? 'selected' : '' }}>Cbm</option>
                </select>
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="unit_qty" class="block text-sm text-center font-medium text-gray-700">Weight</label>
                <input type="text" name="unit_qty[]" id="unit_qty" autocomplete="unit_qty"
                    value="{{ old('unit_qty')[0] }}"
                    class="unit_qty mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-1 sm:col-span-1">
                <label for="price" class="block text-sm text-center font-medium text-gray-700">Price</label>
                <input type="text" name="price[]" id="price" autocomplete="price" value="{{ old('price')[0] }}"
                    class="price mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-1 sm:col-span-1">
                <button
                    class="mt-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-indigo-500"
                    id="add_row" type="button">Add</button>
            </div>
        </div>
    @endif
    @if (sizeof(old('product_name')) > 1)
        @foreach (old('product_name') as $i => $value)
            @if ($i == 0)
                @php
                    continue;
                @endphp
            @endif
            <div class="grid grid-cols-6 gap-6" id="row_id_{{ $loop->iteration }}">
                <div class="col-span-1 sm:col-span-1">
                    <input type="text" name="product_name[]" id="product_name" autocomplete="product_name"
                        value="{{ old('product_name')[$i] }}"
                        class="product_name mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <input type="text" name="quantity[]" id="quantity" autocomplete="quantity"
                        value="{{ old('quantity')[$i] }}"
                        class="quantity mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <select id="unit_id" name="unit_id[]" autocomplete="unit_id" value="{{ old('unit_id')[$i] }}"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1" {{ old('unit_id')[$i] == 1 ? 'selected' : '' }}>Kg</option>
                        <option value="2" {{ old('unit_id')[$i] == 2 ? 'selected' : '' }}>Cbm</option>
                    </select>
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <input type="text" name="unit_qty[]" id="unit_qty" autocomplete="unit_qty"
                        value="{{ old('unit_qty')[$i] }}"
                        class="unit_qty mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <input type="text" name="price[]" id="price" autocomplete="price"
                        value="{{ old('price')[$i] }}"
                        class="price mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-1 sm:col-span-1">
                    <button
                        class="mt-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-indigo-500 remove_row"
                        id="{{ $loop->iteration }}" type="button">X</button>
                </div>
            </div>
        @endforeach
    @endif
