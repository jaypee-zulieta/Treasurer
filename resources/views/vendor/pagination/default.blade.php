<div class="flex">
    <p class="text-sm text-base-content flex-1">
        {!! __('Showing') !!}
        @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </p>
    <div class="join">
        @if ($paginator->hasPages())


            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">«</span>
                </button>
            @else
                <a class="join-item btn" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="join-item btn btn-disabled" aria-disabled="true"><span>{{ $element }}</button>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active join-item btn btn-active" aria-current="page">
                                <span>{{ $page }}</span>
                            </a>
                        @else
                            <a href="{{ $url }}" class="join-item btn">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="joint-item btn" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">»</a>
            @else
                <a class="join-item btn btn-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">»</span>
                </a>
            @endif
        @endif

    </div>

</div>
