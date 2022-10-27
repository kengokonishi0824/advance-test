@if ($paginator->hasPages())
    <nav>
        <ul class="page_numbers">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <p class="page_number" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">＜</span>
                </p>
            @else
                <p class="page_number">
                    <a class="page_url" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">＜</a>
                </p>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <p class="page_number" aria-disabled="true"><span>{{ $element }}</span></p>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <p class="page_number_now" aria-current="page" ><span>{{ $page }}</span></p>
                        @else
                            <p class="page_number"><a class="page_url" href="{{ $url }}">{{ $page }}</a></p>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <p class="page_number">
                    <a class="page_url" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">＞</a>
                </p>
            @else
                <p class="page_number" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">＞</span>
                </p>
            @endif
        </ul>
    </nav>
@endif
