@if ($paginator->hasPages())
    <ul class="pagination flex-l-m flex-w m-l--6 p-t-25" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="item-pagination flex-c-m trans-0-4 ">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="item-pagination flex-c-m trans-0-4" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="item-pagination flex-c-m trans-0-4">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="item-pagination flex-c-m trans-0-4 active-pagination">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="item-pagination flex-c-m trans-0-4 s" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="item-pagination flex-c-m trans-0-4" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="item-pagination flex-c-m trans-0-4" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
