<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl-w-12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">
                                Order Details
                            </h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.orders.edit', $data) }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition:all .15s ease">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label class="text-sm font-bold text-gray-700">Date : </label>
                                        <label class="text-sm font-medium text-gray-700 ml-3">
                                            {{ $data->date }}
                                        </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="customer_id" class="text-sm font-bold text-gray-700">Customer Name
                                            :
                                        </label>
                                        <label class="text-sm font-medium text-gray-700 ml-3">
                                            {{ $data->customer->name }}
                                        </label>
                                    </div>
                                </div>

                                {{-- entry --}}
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-1 sm:col-span-1">
                                        <label class="block text-sm text-center font-bold text-gray-700">Product
                                            Name</label>
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
                                        <label class="block text-sm text-center font-bold text-gray-700">Amount
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                @php
                                    $sub_total = 0;
                                @endphp
                                @foreach ($data->orderDetail as $item)
                                    @php
                                        $amount = $item->price * $item->unit_qty;
                                        $sub_total += $amount;
                                    @endphp
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $item->product_name }}
                                            </label>
                                        </div>

                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $item->quantity }}
                                            </label>
                                        </div>

                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $item->unit_id ? 'Kg' : 'Cbm' }}
                                            </label>
                                        </div>

                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $item->unit_qty }}
                                            </label>
                                        </div>

                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $item->price }}
                                            </label>
                                        </div>
                                        <div class="col-span-1 sm:col-span-1">
                                            <label class="block text-sm text-center font-medium text-gray-700">
                                                {{ $amount }}
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-4 sm:col-span-4">
                                    </div>

                                    <div class="col-span-1 sm:col-span-1 text-center">
                                        <label class="block text-sm font-bold text-gray-700">Sub Total :
                                        </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label
                                            class="block text-sm text-center font-bold text-gray-700">{{ $sub_total }}
                                        </label>
                                    </div>
                                </div>
                                <hr>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-4 sm:col-span-4">
                                    </div>

                                    <div class="col-span-1 sm:col-span-1 text-left">
                                        <label class="text-sm font-bold text-gray-700">China
                                            Delivery Fee :
                                        </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1 md:mr-4">
                                        <label
                                            class="block text-sm text-center font-bold text-gray-700">{{ $data->china_delivery_fee }}
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-4 sm:col-span-4">
                                    </div>

                                    <div class="col-span-1 sm:col-span-1 text-left">
                                        <label class="text-sm font-bold text-gray-700">Net Total : </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1 md:mr-4">
                                        <label class="block text-sm font-bold text-center text-gray-700">
                                            {{ $sub_total + $data->china_delivery_fee + $data->custom_fee }}
                                        </label>
                                    </div>
                                </div>
                                <hr>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-4 sm:col-span-4">
                                    </div>

                                    <div class="col-span-1 sm:col-span-1 text-left">
                                        <label class="text-sm font-bold text-gray-700">Custom
                                            Fee : </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label class="block text-sm font-bold text-center text-gray-700">
                                            {{ $data->custom_fee }}
                                        </label>
                                    </div>
                                </div>
                                <hr>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-4 sm:col-span-4">
                                        <label class="text-sm font-bold text-gray-700">Payment
                                            Type : </label>
                                        <label class="text-sm font-medium text-gray-700 ml-3">
                                            {{ $data->payment_type == 1 ? 'Cash' : 'Banking' }}</label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label class="text-sm font-bold text-gray-700">Currency Exchange
                                            Rate : </label>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label class="block text-sm font-bold text-center text-gray-700">
                                            {{ $data->currency_exchange_rate }}
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="text-sm font-bold text-gray-700">Delivery
                                            Fee : </label>
                                        <label
                                            class="text-sm font-medium text-gray- ml-3">{{ $data->delivery_fee }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
