<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-gray-600 dark:text-gray-300">
        <div class="p-4 sm:p-10 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <header>
                <h1 class="text-3xl font-medium px-4 py-6">{{ $post->title }}</h1>
            </header>
            <h3 class="text-md font-light px-6 text-gray-600 dark:text-gray-300 flex">
                <div>
                    Author:
                    <a class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" href="/author/{{$author['id']}}" wire:navigate>{{$author['name']}}</a>
                </div>
                <div class="px-2">|</div>
                <div>Last Update: <span class="text-gray-500 dark:text-gray-400">{{$time}}</span></div>
                <div class="px-2">|</div>
                <div>Category: <a class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" href="/cat/{{$category->id}}" wire:navigate>{{$category->name}}</a></div>
            </h3>
            <div class="trix-content p-6">{!! $post->content !!}</div>
            @foreach ($comments as $comment)
                <livewire:comments.show-comment wire:key="{{$comment->id}}" :$comment>
            @endforeach
            {{$comments->links()}}
            <livewire:comments.create-comment :$post>
        </div>
    </div>
</div>
