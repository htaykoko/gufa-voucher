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
                                        class="border-t-0 px-6 align-middle border-l-2 border-r-2 text-xs whitespace-nowrap p-4">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                            View
                                        </a>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-2 border-r-2 text-xs whitespace-nowrap p-4">
                                        <a href="{{ route('admin.orders.edit', $order->id) }}"
                                            class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                            Edit
                                        </a>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-2 border-r-2 text-xs whitespace-nowrap p-4">
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700"><i
                                                    class="fas fa-eye text-red-500 mr-4"
                                                    onclick="return confirm('Are You Sure?');">Delete</i></button>
                                        </form>
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
