@foreach($post->tags as $tag)
    <a href="{{ $tag->path() }}">{{ '#' . $tag->name . ' ' }}</a>
@endforeach