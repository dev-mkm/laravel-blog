<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('User List') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-auto">

            <table class="w-full border-collapse border border-slate-500 table-auto cols-2">
                <tr>
                    <th class="border border-slate-600 px-4 py-2">ID</th>
                    <th class="border border-slate-600 px-4 py-2">Name</th>
                    <th class="border border-slate-600 px-4 py-2">Email</th>
                    <th class="border border-slate-600 px-4 py-2">Posts</th>
                    <th class="border border-slate-600 px-4 py-2">Comments</th>
                    <th class="border border-slate-600 px-4 py-2">Verified Email</th>
                    <th class="border border-slate-600 px-4 py-2">Last Update</th>
                    <th class="border border-slate-600 px-4 py-2">Created At</th>
                    <th class="border border-slate-600 px-4 py-2">Action</th>
                </tr>
                @foreach ($users as $user)
                    <livewire:admin.users.user-item :$user />
                @endforeach
            </table>
        </div>
    </div>
</div>
