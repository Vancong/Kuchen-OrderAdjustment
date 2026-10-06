@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled">« Trước</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">« Trước</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="disabled">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="active"><span>{{ $page }}</span></div>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Sau »</a>
        @else
            <span class="disabled">Sau »</span>
        @endif
    </div>
    <div style="margin-top: 10px; font-size: 14px; color: #5f6368;">
        Hiển thị {{ $paginator->firstItem() }} đến {{ $paginator->lastItem() }} của {{ $paginator->total() }} kết quả
    </div>
@endif
