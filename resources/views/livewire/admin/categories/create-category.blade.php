<form wire:submit="save">
    <x-input-label class="px-2" for="name" :value="__('Name')" />
    <div class="flex">
        <x-text-input wire:model.live="name" id="name" name="name" type="text" class="m-2 block w-full" required />
        <x-primary-button class="btn btn-primary m-2" type="submit">create</x-primary-button>
    </div>
    <x-input-error class="px-2" :messages="$errors->get('name')" />
</form>
