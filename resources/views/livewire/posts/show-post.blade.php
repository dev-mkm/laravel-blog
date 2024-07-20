<div>
    <h1>{{ $post->title }}</h1>
    <span>Author: {{ $author->name }}</span>
    @foreach ($comments as $comment)
        <livewire:comments.show-comment :$comment>
    @endforeach
</div>
