<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            @foreach ($posts as $post)
                <livewire:posts.post-item :$post wire:key="{{ $post->id }}" />
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>
