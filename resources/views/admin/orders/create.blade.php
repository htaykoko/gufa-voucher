<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('admin.orders.store') }}" method="POST">
                            @method('post')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="date"
                                                class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" name="date" id="date" autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="customer_id"
                                                class="block text-sm font-medium text-gray-700">Customer</label>
                                            <select id="customer_id" name="customer_id" autocomplete="customer_id-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="carry_fee" class="block text-sm font-medium text-gray-700">Carry
                                                Fee</label>
                                            <input type="text" name="carry_fee" id="carry_fee"
                                                autocomplete="carry_fee-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="delivery_fee"
                                                class="block text-sm font-medium text-gray-700">Delivery
                                                Fee</label>
                                            <input type="text" name="delivery_fee" id="delivery_fee"
                                                autocomplete="family-name"
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
                                                <option value="1">Cash</option>
                                                <option value="2">Banking</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="currency_exchange_rate"
                                                class="block text-sm font-medium text-gray-700">Currency Exchange
                                                Rate</label>
                                            <input type="text" name="currency_exchange_rate" id="currency_exchange_rate"
                                                autocomplete="currency_exchange_rate-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
