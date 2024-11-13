@if ($paginator->hasPages())
    <div class="post-pagination">
        <nav class="navigation pagination" aria-label="Products">
            <ul class="page-numbers">
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span aria-hidden="true">&lsaquo;</span></li>
                @else
                    <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class="fal fa-arrow-left"></i></a></li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li><span class="page-numbers disabled">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span aria-current="page" class="page-numbers current">{{ $page }}</span>
                                </li>
                            @else
                                <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                                class="fal fa-arrow-right"></i></a></li>
                @else
                    <li class="disabled"><span aria-hidden="true">&rsaquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
