<tr>
    <th class="border border-slate-600 px-4 py-2">{{$title}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$comment->content}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$comment->updated_at}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$comment->created_at}}</th>
    <th class="border border-slate-600 px-2">
    <div class="flex content-center justify-center h-full">
    <x-secondary-button class="m-2" wire:click="view">view</x-secondary-button>
    <x-danger-button class="m-2" wire:click="delete"
        wire:confirm="Are you sure you want to delete this post?">delete</x-danger-button>
    </div>
    </th>
</tr>
