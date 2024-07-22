<form wire:submit="save" class="m-6 space-y-6 max-w-2xl" method="post">
    <div>
        <x-input-label for="content" :value="__('Content')" />
        <textarea class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content" wire:model.live="content"></textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
