<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <header>
                <h2 class="text-2xl font-medium p-4">
                    @if ($author)
                        {{__('Author').' | '.$author['name']}}
                    @elseif ($category)
                        {{__('Category').' | '.$category->name}}
                    @else
                        {{ __('Posts') }}
                    @endif
                </h2>
            </header>
            @foreach ($posts as $post)
                <livewire:posts.post-item :$post wire:key="{{ $post->id }}" />
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>
