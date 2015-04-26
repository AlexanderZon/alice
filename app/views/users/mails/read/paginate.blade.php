<span class="pagination-info">
	{{ $messages->getFrom() }} - {{ $messages->getTo() }} de {{ $messages->count() }} 
</span>
@if($messages->getCurrentPage() > 1)
<a class="btn btn-sm blue paginate-btn" data-paginateid="{{ $messages->getCurrentPage() - 1 }}">
	<i class="fa fa-angle-left"></i>
</a>
@endif
@if($messages->getCurrentPage() < $messages->getLastPage())
<a class="btn btn-sm blue paginate-btn" data-paginateid="{{ $messages->getCurrentPage() + 1 }}">
	<i class="fa fa-angle-right"></i>
</a>
@endif