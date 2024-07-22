<tr>
    <th class="border border-slate-600 px-4 py-2">{{$user->id}}</th>
    <th class="border border-slate-600 px-4 py-2"><a wire:click="view">
        {{$user->name}}
    </a></th>
    <th class="border border-slate-600 px-4 py-2">{{$user->email}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$postcount}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$commentcount}}</th>
    <th class="border border-slate-600 px-4 py-2">
        @if (!$verified)
        <x-primary-button wire:click="verify">verify</x-primary-button>
        @else
        <div class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest">
        verified
        </div>
        @endif
    </th>
    <th class="border border-slate-600 px-4 py-2">{{$user->updated_at}}</th>
    <th class="border border-slate-600 px-4 py-2">{{$user->created_at}}</th>
    <th class="border border-slate-600 px-2">
        <div class="flex content-center justify-center h-full">
        @if (!$admin)
        <x-primary-button class="m-2" wire:click="promote"
            wire:confirm="Are you sure you want to promote this user to admin?">promote</x-primary-button>
        @else
        <div class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest">
        is admin
        </div>
        @endif
        <x-danger-button class="m-2" wire:click="delete"
            wire:confirm="Are you sure you want to delete this user?">delete</x-danger-button>
        </div>
    </th>
</tr>
