@if ($paginator->hasPages())
<div class="pagination-wrapper my-lg-5 mt- py-lg-3 text-center">
    <ul class="page-pagination">
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><a href="javascript:void(0)"><span class="fa fa-angle-left"></span></a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><span class="fa fa-angle-left"></span></a></li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span aria-current="page" class="page-numbers current">{{ $page }} </span></li>
                    @else
                        <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="next"><span class="fa fa-angle-right"></span></a></li>
        @else
            <li class="disabled next" aria-disabled="true"><a href="javascript:void(0)"><span class="fa fa-angle-right"></span></a></li>
        @endif
    </ul>
</div>
@endif