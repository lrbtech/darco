@if ($paginator->hasPages())
    <ul class="pagination justify-content-start">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item">
                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <!-- <li class="disabled"><span>{{ $element }}</span></li>
                <button class="btn ps-btn"><span>...</span></button> -->
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>                               
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
        @endif
    </ul>

@endif