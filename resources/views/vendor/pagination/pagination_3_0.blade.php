@if ($paginator->hasPages())
    @if($paginator->lastPage() > 1)
        <div class="default-paginate">
            <ul class="pagination pagination-custom">
                <!-- Previous Page Link -->
                @if($paginator->lastPage() > 7)
                    @if($paginator->currentPage() > 5)
                        <li class="page-item pre-2">
                            <a class="page-link" href="{{ $paginator->url( $paginator->currentPage() - 5) }}" rel="next"></a>
                        </li>
                    @else
                        <li class="page-item disabled pre-2"><span class="page-link"></span></li>
                    @endif
                @endif
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled pre-1"><span class="page-link"></span></li>
                @else
                    <li class="page-item pre-1">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
                    </li>
                @endif

                @if($paginator->currentPage() > 3 && $paginator->lastPage() >= 7)
                    <li class="page-item hidden-xs"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @endif

                @if($paginator->currentPage() > 4)
                    <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>
                @endif

                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($paginator->lastPage() <= 7)
                        @if ($i == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @elseif($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endif
                @endforeach

                @if($paginator->currentPage() < $paginator->lastPage() - 3 && $paginator->lastPage() >= 7)
                    <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>
                @endif

                @if($paginator->currentPage() < $paginator->lastPage() - 2 && $paginator->lastPage() >= 7)
                    <li class="page-item hidden-xs">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next-1">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
                    </li>
                @else
                    <li class="page-item disabled next-1"><span class="page-link"></span></li>
                @endif
                @if($paginator->lastPage() > 7)
                    @if($paginator->currentPage() + 5 < $paginator->lastPage())
                        <li class="page-item next-2">
                            <a class="page-link" href="{{ $paginator->url( $paginator->currentPage() + 5) }}" rel="next"></a>
                        </li>
                    @else
                        <li class="page-item disabled next-2"><span class="page-link"></span></li>
                    @endif
                @endif
            </ul>
        </div>
    @endif
@endif

