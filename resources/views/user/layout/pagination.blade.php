@if ($paginator->hasPages())
<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        @if ($paginator->onFirstPage())        
            <a href="javascript:void(0)" class="rounded">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"class="rounded">1</a>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                <a href="javascript:void(0)"class="rounded">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void(0)" class="rounded active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="rounded">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="rounded">&raquo;</a>
        @else
            <a href="javascript:void(0)" class="rounded">&raquo;</a>
        @endif
    </div>
</div>
@endif