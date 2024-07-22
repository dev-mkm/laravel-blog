<div>
    <h1>{{ $post->title }}</h1>
    <span>Author: {{ $author['name'] }}</span>
    <div class="trix-content">{!! $post->content !!}</div>
    @foreach ($comments as $comment)
        <livewire:comments.show-comment :$comment>
    @endforeach
</div>
