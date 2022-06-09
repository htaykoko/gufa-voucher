<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">
                                Customer lists
                            </h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.customers.create') }}"
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
                                    Name</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Phone</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Address</td>
                                <td
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                    Action</td>
                            </tr>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $loop->iteration }}</td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $customer->name }}</td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $customer->phone }}</td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $customer->address }}</td>
                                    <td
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-2">
                                        <div class="flex flex-row">
                                            <a href="{{ route('admin.customers.show', $customer->id) }}"
                                                class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                                <button><i class="fas fa-eye text-red-500 "></i></button>
                                            </a>

                                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                                class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                                <button><i class="fas fa-edit text-red-500 "></i></button>
                                            </a>

                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="justify-center px-2 py-1 border border-transparent shadow-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                                    <i class="fas fa-trash text-red-500 "
                                                        onclick="return confirm('Are You Sure?');"></i></button>
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
