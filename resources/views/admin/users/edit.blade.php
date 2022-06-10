<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full xl-w-12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">
                                Edit User
                            </h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('admin.users.index') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition:all .15s ease">
                                Users List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('admin.users.update', $data) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="full_name" class="block text-md font-bold text-gray-700">
                                                Full Name
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" name="full_name"
                                                    value="{{ old('full_name', $data->full_name) }}" id="full_name"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    placeholder="Enter Full User Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="username" class="block text-md font-bold text-gray-700">
                                                User Name
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" name="username"
                                                    value="{{ old('username', $data->username) }}" id="username"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    placeholder="Enter User Name">
                                            </div>
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="level"
                                                class="block text-md font-bold text-gray-700">Role</label>
                                            <select id="level" name="level" autocomplete="level"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="admin" {{ $data->level == 'admin' ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="editor"
                                                    {{ $data->level == 'editor' ? 'selected' : '' }}>Editor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="email" class="block text-md font-bold text-gray-700">
                                                Email
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="email" name="email"
                                                    value="{{ old('email', $data->email) }}" id="email"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="is_active"
                                                class="block text-md font-bold text-gray-700">Status</label>
                                            <select id="is_active" name="is_active" autocomplete="is_active"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1" {{ $data->is_active ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0" {{ $data->is_active ? 'selected' : '' }}>
                                                    In-Active</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password"
                                                class="block text-md font-bold text-gray-700">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Enter Password">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password_confirmation"
                                                class="block text-md font-bold text-gray-700">Confirm
                                                Password</label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Enter confirm password">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
