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

                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <form action="{{ route('admin.orders.index') }}" method="get">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="payment_type" class="block text-sm font-medium text-gray-700">Payment
                                        Type</label>
                                    <select id="payment_type" name="paymentType" autocomplete="payment_type"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Status</option>
                                        <option value="1" {{ request('paymentType')==1 ? 'selected' : '' }}>
                                            Paid
                                        </option>
                                        <option value="0" {{ request('paymentType')==2 ? 'selected' : '' }}>
                                            Unpaid
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="from_date" class="block text-sm font-medium text-gray-700">From
                                        Date</label>
                                    <input type="date" name="fromDate" value="{{ request('fromDate') }}" id="from_date"
                                        autocomplete="from_date"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="to_date" class="block text-sm font-medium text-gray-700">From
                                        Date</label>
                                    <input type="date" name="toDate" value="{{ request('toDate') }}" id="to_date"
                                        autocomplete="to_date"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button type="submit"
                                    class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition:all .15s ease">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    ID</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Voucher ID</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Code</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Date</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Customer Name</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Customer Code</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Status</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                                    Total</td>
                                <td colspan="3"
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
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
                                    <a href="{{ route('admin.') }}">{{ $order->product_name }}</a>
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ date('d-M-Y', strtotime($order->date)) }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ optional($order->customer)->name }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ optional($order->customer)->code }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $order->status == 1 ? 'Paid' : 'UnPaid' }}
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

                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
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
                    <div class="px-2 py-5">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-app-layout>
