<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Categories') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-2xl">
                <header>
                    <h2 class="text-lg font-medium mb-4">
                        {{ __('Create category') }}
                    </h2>
                </header>
                <livewire:admin.categories.create-category />
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-auto">
            <div class="max-w-2xl">
                <header>
                    <h2 class="text-lg font-medium mb-4">
                        {{ __('Category list') }}
                    </h2>
                </header>
                <table class="w-full border-collapse border border-slate-500 table-auto cols-2">
                    <tr>
                        <th class="border border-slate-600 px-4 py-2">ID</th>
                        <th class="border border-slate-600 px-4 py-2">Name</th>
                        <th class="border border-slate-600 px-4 py-2">Posts</th>
                        <th class="border border-slate-600 px-4 py-2">Action</th>
                    </tr>
                    @foreach ($categories as $category)
                        <livewire:admin.categories.category-item :$category />
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
