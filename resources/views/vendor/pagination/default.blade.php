@if ($paginator->hasPages())
    <div class="col-12">
        <div class="pagination d-flex justify-content-center mt-5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a href="#" class="rounded disabled">&laquo;</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="rounded">&laquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @php
                $start = max($paginator->currentPage() - 2, 1);
                $end = min($paginator->currentPage() + 2, $paginator->lastPage());
            @endphp

            @if ($start > 1)
                <a href="{{ $paginator->url(1) }}" class="rounded">1</a>
                @if ($start > 2)
                    <a class="rounded disabled">...</a>
                @endif
            @endif

            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $paginator->currentPage())
                    <a href="{{ $paginator->url($page) }}" class="active rounded">{{ $page }}</a>
                @else
                    <a href="{{ $paginator->url($page) }}" class="rounded">{{ $page }}</a>
                @endif
            @endfor

            @if ($end < $paginator->lastPage())
                @if ($end < $paginator->lastPage() - 1)
                <a class="rounded disabled">...</a>
                @endif
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="rounded">{{ $paginator->lastPage() }}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="rounded">&raquo;</a>
            @else
                <a href="#" class="rounded disabled">&raquo;</a>
            @endif
        </div>
    </div>
@endif
