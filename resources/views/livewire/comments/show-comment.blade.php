<div class="p-4 pb-8">
    <h3 class="text-sm font-light p-2 text-gray-600 dark:text-gray-300 flex">
        <a class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" href="/author/{{$author['id']}}" wire:navigate>{{$author['name']}}</a>
        <div class="px-2">|</div>
        <div>{{$time}}</div>
    </h3>
    <div class="pl-3 p-2 text-gray-600 dark:text-gray-300 overflow-hidden">
        @if ($updating && $owned)
            <textarea class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content" wire:model="content"></textarea>
            <x-input-error class="text-xs" :messages="$errors->get('content')" />
        @else
            {{$comment->content}}
        @endif
    </div>
    @if ($owned)
        <div class="pl-3 pt-1 text-gray-500 dark:text-gray-400">
            @if ($updating)
                <button class="hover:text-gray-700 dark:hover:text-gray-300" wire:click="save">Save</button>
            @else
                <button class="hover:text-gray-700 dark:hover:text-gray-300" wire:click="edit">Edit</button>
                <button class="pl-2 hover:text-gray-700 dark:hover:text-gray-300" wire:click="delete"
                wire:confirm="Are you sure you want to delete this comment?">Delete</button>
            @endif
        </div>
    @else
        @admin
        <div class="pl-3 pt-1 text-gray-500 dark:text-gray-400"></div>
            <button class="hover:text-gray-700 dark:hover:text-gray-300" wire:click="delete"
            wire:confirm="Are you sure you want to delete this comment?">Delete</button>
        </div>
        @endadmin
    @endif
</div>
