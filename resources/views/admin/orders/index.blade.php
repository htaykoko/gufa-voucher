<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl-w-12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">
                                Order lists
                            </h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.orders.create') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition:all .15s ease">
                                Create
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <div class="col-span-3 sm:col-span-3">
                                <label for="payment_type" class="block text-sm font-medium text-gray-700">Payment
                                    Type</label>
                                <select id="payment_type" name="payment_type" autocomplete="payment_type-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Status</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.orders.create') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition:all .15s ease">
                                Search
                            </a>
                        </div>
                    </div>
                </div> --}}

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    ID</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Voucher ID</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Code</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Date</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Total</td>
                                <td colspan="3"
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Action</td>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $loop->iteration }}</td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $order->code }}</td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <a href="{{ route('admin.') }}">{{ $order->code }}</a>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $order->date }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $order->sub_totals }}
                                    </td>
                                    <td
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-2">
                                        <div class="flex flex-row">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" title="View"
                                                class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white  hover:bg-indigo-700">
                                                <i class="fas fa-eye text-red-500 mr-4"></i>
                                            </a>

                                            <a href="{{ route('admin.orders.edit', $order->id) }}" title="Edit"
                                                class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white  hover:bg-indigo-700">
                                                <i class="fas fa-edit text-red-500 mr-4"></i>
                                            </a>

                                            <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Delete" onclick="return confirm('Are You Sure?');"
                                                    class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white  hover:bg-indigo-700">
                                                    <i class="fas fa-trash text-red-500 mr-4"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-admin-app-layout>
