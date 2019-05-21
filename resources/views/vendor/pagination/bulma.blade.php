@if ($paginator->hasPages())
    <nav class="pagination @isset($bulmaClasses) {{ $bulmaClasses }} @else is-centered @endisset">
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>@if(!empty($previous)) {{ $previous }} @else Previous @endif</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">@isset($previous) {{ $previous }} @else Previous @endisset</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">@isset($next){{ $next }}@else Next @endisset</a>
        @else
            <a class="pagination-next" disabled>@isset($next){{ $next }}@else Next page @endisset</a>
        @endif

        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
