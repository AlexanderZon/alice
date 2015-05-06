<span class="pagination-info">
	<span id="pagination-from">{{ $messages->getFrom() }}</span> - <span id="pagination-to">{{ $messages->getTo() }}</span> de <span id="pagination-total">{{ $messages->getTotal() }}</span>
</span>
@if($messages->getCurrentPage() > 1)
<a class="btn btn-sm blue paginate-btn" data-box="{{ $box }}" data-paginateid="{{ $messages->getCurrentPage() - 1 }}">
	<i class="fa fa-angle-left"></i>
</a>
@endif
@if($messages->getCurrentPage() < $messages->getLastPage())
<a class="btn btn-sm blue paginate-btn" data-box="{{ $box }}" data-paginateid="{{ $messages->getCurrentPage() + 1 }}" url="">
	<i class="fa fa-angle-right"></i>
</a>
@endif