@props(['paginator'])

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center py-4 border-t border-base-200 bg-base-100">
        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();
            $start = max(1, $current - 2); // $current - 1
            $end = min($last, $current + 2); // $current + 1
        @endphp

        {{-- Desktop --}}
        <ul class="hidden md:inline-flex items-center -space-x-px text-sm">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 ml-0 leading-tight text-gray-400 bg-base-200 rounded-l-lg border border-base-200 cursor-not-allowed">
                        <span class="icon-[tabler--chevron-left]"></span>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 ml-0 leading-tight text-base-content bg-base-100 rounded-l-lg border border-base-200 hover:bg-base-200 hover:text-primary transition">
                        <span class="icon-[tabler--chevron-left]"></span>
                    </a>
                </li>
            @endif

            {{-- First --}}
            @if ($start > 1)
                <li>
                    <a href="{{ $paginator->url(1) }}" class="px-3 py-2 leading-tight text-base-content bg-base-100 border border-base-200 hover:bg-base-200 hover:text-primary transition">1</a>
                </li>
                @if ($start > 2)
                    <li>
                        <span class="px-3 py-2 leading-tight text-gray-400 bg-base-100 border border-base-200">…</span>
                    </li>
                @endif
            @endif

            {{-- Page Numbers --}}
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $current)
                    <li>
                        <span class="px-3 py-2 leading-tight text-primary bg-base-200 border border-base-200">{{ $i }}</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->url($i) }}" class="px-3 py-2 leading-tight text-base-content bg-base-100 border border-base-200 hover:bg-base-200 hover:text-primary transition">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Last --}}
            @if ($end < $last)
                @if ($end < $last - 1)
                    <li>
                        <span class="px-3 py-2 leading-tight text-gray-400 bg-base-100 border border-base-200">…</span>
                    </li>
                @endif
                <li>
                    <a href="{{ $paginator->url($last) }}" class="px-3 py-2 leading-tight text-base-content bg-base-100 border border-base-200 hover:bg-base-200 hover:text-primary transition">{{ $last }}</a>
                </li>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 leading-tight text-base-content bg-base-100 rounded-r-lg border border-base-200 hover:bg-base-200 hover:text-primary transition">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-base-200 rounded-r-lg border border-base-200 cursor-not-allowed">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </span>
                </li>
            @endif
        </ul>

        {{-- Mobile --}}
        <ul class="inline-flex md:hidden items-center -space-x-px text-sm">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 ml-0 leading-tight text-gray-400 bg-base-200 rounded-l-lg border border-base-200 cursor-not-allowed">
                        <span class="icon-[tabler--chevron-left]"></span>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 ml-0 leading-tight text-base-content bg-base-100 rounded-l-lg border border-base-200 hover:bg-base-200 hover:text-primary transition">
                        <span class="icon-[tabler--chevron-left]"></span>
                    </a>
                </li>
            @endif
            <li>
                <span class="px-3 py-2 leading-tight text-primary bg-base-200 border border-base-200">{{ $paginator->currentPage() }}</span>
            </li>
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 leading-tight text-base-content bg-base-100 rounded-r-lg border border-base-200 hover:bg-base-200 hover:text-primary transition">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-base-200 rounded-r-lg border border-base-200 cursor-not-allowed">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif 