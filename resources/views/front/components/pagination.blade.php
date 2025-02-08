<div class="col-lg-12">
    <!-- Fleets Pagination Start -->
    <div class="fleets-pagination wow fadeInUp" data-wow-delay="0.5s">
        <ul class="pagination">
            @if ($vehicles->onFirstPage())
                <li class="disabled"><span><i class="fa-solid fa-arrow-left-long"></i></span></li>
            @else
                <li><a href="{{ $vehicles->previousPageUrl() }}"><i class="fa-solid fa-arrow-left-long"></i></a></li>
            @endif

            @foreach ($vehicles->getUrlRange(1, $vehicles->lastPage()) as $page => $url)
                <li class="{{ $page === $vehicles->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($vehicles->hasMorePages())
                <li><a href="{{ $vehicles->nextPageUrl() }}"><i class="fa-solid fa-arrow-right-long"></i></a></li>
            @else
                <li class="disabled"><span><i class="fa-solid fa-arrow-right-long"></i></span></li>
            @endif
        </ul>
    </div>
    <!-- Fleets Pagination End -->
</div>
