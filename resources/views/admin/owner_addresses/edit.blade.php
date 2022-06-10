<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('admin.owner_addresses.update', $data->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="address1" class="block text-sm font-medium text-gray-700">
                                                Address 1
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" value="{{ $data->address1 }}" name="address1"
                                                    id="address1"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    placeholder="Enter Address 1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="address2" class="block text-sm font-medium text-gray-700">
                                                    Address 2
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" value="{{ $data->address2 }}" name="address2"
                                                        id="address2"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Enter Address 2">
                                                </div>
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
