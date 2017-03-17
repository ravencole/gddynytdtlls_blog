<div class="post-preview">
    <a href="/post/{{ $post->id }}">
        <h2 class="post-title">
            {{ $post->title }}
        </h2>
        <h3 class="post-subtitle">
            {{ $post->present()->preview }}
        </h3>
    </a>
    <p class="post-meta">Posted {{ $post->present()->timestamp }}</p>
    <p class="post-meta" style="margin-top: 0; margin-bottom: 0; padding: 0;">
        @include('layouts.tags')
    </p>
</div>