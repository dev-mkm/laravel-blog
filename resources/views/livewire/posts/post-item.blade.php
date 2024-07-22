<div class="p-4 pb-8">
    <h1 class="text-2xl font-medium border-b-2 border-indigo-500 p-2">
        <a class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 overflow-hidden" href="/posts/{{$post->id}}" wire:navigate>{{$post->title}}</a>
        <div class="text-sm inline px-2 text-gray-500 dark:text-gray-400">
        {{$time}}
        </div>
    </h1>
    <h3 class="text-sm font-light p-2 text-gray-600 dark:text-gray-300">
        <div class="inline px-2">
        Author:<a class="pl-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" href="/author/{{$author['id']}}" wire:navigate>{{$author['name']}}</a>
        </div>|<div class="inline px-2">
        Category:<a class="pl-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" href="/cat/{{$category->id}}" wire:navigate>{{$category->name}}</a>
        </div>
    </h3>
    <div class="p-2 text-gray-600 dark:text-gray-300 overflow-hidden"><a href="/posts/{{$post->id}}" wire:navigate>{{$post->title}}{!!$summary!!}</a></div>
</div>
