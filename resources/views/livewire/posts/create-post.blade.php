<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-2xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Create Post') }}
                        </h2>
                    </header>

                    <form wire:submit="save" class="mt-6 space-y-6" method="post">
                        <div class="flex w-full">
                        <div class="w-2/3">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input wire:model="title" id="title" name="title" type="text" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="w-1/3 px-2">
                            <x-input-label for="category" :value="__('Category')" />
                            <select class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="category" id="category" wire:model="category">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <input type="hidden" value="{{$content}}" name="content" id="content" />
                            <trix-editor input="content" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></trix-editor>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                    @script
                    <script>
                        addEventListener('trix-change', function () {
                            var element = document.querySelector("trix-editor")
                            $wire.content = element.value
                            $wire.noformat = element.editor.getDocument()
                        })
                    </script>
                    @endscript
                </section>
            </div>
        </div>
    </div>
</div>
