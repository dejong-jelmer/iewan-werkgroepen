@if ($paginator->hasPages())
<ul class="pagination pagination-sm no-margin pull-right">
	@if ($paginator->onFirstPage())
	<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
		<span aria-hidden="true">&lsaquo;</span>
	</li>
	@else
	<li>
		<a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
	</li>
	@endif

	@if($paginator->currentPage() > 2)
	<li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
	@endif
	@if($paginator->currentPage() > 3)
	<li class="disabled hidden-xs"><span>...</span></li>
	@endif
	@foreach(range(1, $paginator->lastPage()) as $i)
	@if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
		@if ($i == $paginator->currentPage())
		<li class="active"><span>{{ $i }}</span></li>
		@else
		<li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
		@endif
		@endif
		@endforeach
		@if($paginator->currentPage() < $paginator->lastPage() - 2)
			<li class="disabled hidden-xs"><span>...</span></li>
			@endif
			@if($paginator->currentPage() < $paginator->lastPage() - 1)
				<li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
				@endif


				{{-- Next Page Link --}}
				@if ($paginator->hasMorePages())
				<li>
					<a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
				</li>


				@else
				<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
					<span aria-hidden="true">&rsaquo;</span>
				</li>
				@endif


</ul>
@endif
