<div class="pager-container">
    <hr>
        <ul class="pager">
            @if(!$page->onFirstPage())
                <li class="next">
                    <a href="{{ $page->previousPageUrl() }}">&larr; Newer Posts</a>
                </li>
            @endif
            @if($page->hasMorePages())
                <li class="next">
                    <a href="{{ $page->nextPageUrl() }}">Older Posts &rarr;</a>
                </li>
            @endif
        </ul>
    <hr>
</div>