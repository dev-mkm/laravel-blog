<tr>
    <th class="border border-slate-600 px-4 py-2">{{$category->id}}</th>
    <th class="border border-slate-600 px-4 py-2">
        @if ($updating)
            <x-text-input wire:model="name" id="name" name="name" type="text" class="p-1 text-center w-full" wire:keydown.enter="update" />
            <x-input-error class="text-xs" :messages="$errors->get('name')" />
        @else
            {{$name}}
        @endif
    </th>
    <th class="border border-slate-600 px-4 py-2">{{$count}}</th>
    <th class="border border-slate-600 px-2">
    <div class="flex content-center justify-center h-full">
        <x-primary-button class="m-2" wire:click="updateMode">update</x-secondary-button>
        <x-danger-button class="m-2" wire:click="delete"
        wire:confirm="Are you sure you want to delete this category?">delete</x-danger-button>
    </div>
    </th>
</tr>
