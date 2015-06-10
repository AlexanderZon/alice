<ul class="pagination pull-right"> 
    <li>
        <a class="paginate-btn" href="javascript:;" data-section="{{ $section }}" data-page="1"><i class="fa fa-angle-double-left"></i></a>
    </li>
    <li {{ $courses->getCurrentPage() == 1 ? 'class=disabled': '' }}>
        @if($courses->getCurrentPage() == 1)
            <span><i class="fa fa-angle-left"></i></span>
        @else
            <a class="paginate-btn" href="javascript:;" data-section="{{ $section }}" data-page="{{ $courses->getCurrentPage() - 1 }}"><i class="fa fa-angle-left"></i></a>
        @endif
    </li>
    @if($courses->getCurrentPage() > 8)
        <li>
            <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="1">1</a>
        </li>
        <li {{ $courses->getCurrentPage() == 1 ? 'class=disabled': '' }}>
            <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="2">2</a>
        </li>
        <li class="disabled"><span>...</span></li>
    @endif
    @for($i = $courses->getCurrentPage() - 3 ; $i <= ($courses->getCurrentPage() + 3) ; $i++)
        @if($i > 0 && $i <= $courses->getLastPage())
            @if($i == $courses->getCurrentPage())
                <li class="active">
                    <span>{{($i)}}</span>
                </li>
            @else
                <li>
                    <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="{{ $i }}">{{($i)}}</a>
                </li>
            @endif
        @endif
    @endfor
    @if($courses->getCurrentPage() < ($courses->getLastPage() - 5))
        <li class="disabled"><span>...</span></li>
        <li>
            <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="{{ ($courses->getLastPage() - 1) }}">{{($courses->getLastPage() - 1)}}</a>
        </li>
        <li >
            <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="{{ ($courses->getLastPage()) }}">{{($courses->getLastPage() )}}</a>
        </li>
    @endif
    <li {{ $courses->getCurrentPage() == 1 ? 'class=disabled': '' }}>
        @if($courses->getCurrentPage() == $courses->getLastPage())
            <span><i class="fa fa-angle-right"></i></span>
        @else
            <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="{{ $courses->getCurrentPage() + 1 }}"><i class="fa fa-angle-right"></i></a>
        @endif
    </li>
    <li>
        <a href="javascript:;" class="paginate-btn" data-section="{{ $section }}" data-page="{{ $courses->getLastPage() }}"><i class="fa fa-angle-double-right"></i></a>
    </li>
</ul>   