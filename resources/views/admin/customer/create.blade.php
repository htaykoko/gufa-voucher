<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('admin.customers.store') }}" method="POST">
                            @method('post')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="name" class="block text-sm font-medium text-gray-700">
                                                Customer Name
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" name="name" id="name"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    placeholder="Customer Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone"
                                                class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="text" name="phone" id="phone" autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="mobile"
                                                class="block text-sm font-medium text-gray-700">Mobile</label>
                                            <input type="text" name="mobile" id="mobile" autocomplete="family-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="address" class="block text-sm font-medium text-gray-700">
                                                Address
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="address" name="address" rows="3"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                    placeholder="enter your address"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500"></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="gender"
                                                class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select id="gender" name="gender" autocomplete="gender-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="status"
                                                class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" name="status" autocomplete="status-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
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
