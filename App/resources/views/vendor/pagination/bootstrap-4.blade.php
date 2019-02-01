@if ($paginator->hasPages())
    <ul class="pagination justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <!-- <span class="page-link" aria-hidden="true">戻る</span> -->
            </li>
        @else
            <li class="page-item forward">
                <a class="page-link" href="{{$paginator->previousPageUrl()}}" tabindex="-1"><i class="fas fa-angle-left"></i>&nbsp;戻る</a>
            </li>
        @endif

        @if ($paginator->lastPage() < 7 || $paginator->currentPage() < 5)
            @if (1 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 1)active @endif"><a class="page-link page-make" href="#">1</a></li>
            @endif
            @if (2 < $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 2)active @endif"><a class="page-link page-make" href="#">2</a></li>
            @endif
            @if (3 < $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 3)active @endif"><a class="page-link page-make" href="#">3</a></li>
            @endif
            @if (4 < $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 4)active @endif"><a class="page-link page-make" href="#">4</a></li>
            @endif
            @if (5 < $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 5)active @endif"><a class="page-link page-make" href="#">5</a></li>
            @endif
            @if (6 < $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == 6)active @endif"><a class="page-link page-make" href="#">6</a></li>
            @endif
            @if (7 < $paginator->lastPage())
            <!-- <li class="page-item @if($paginator->currentPage() == 7)active @endif"><a class="page-link page-make" href="#">7</a></li> -->
            @endif
            <li class="page-item @if($paginator->lastPage() > 7)to-last @endif @if($paginator->currentPage() == $paginator->lastPage())active @endif"><a class="page-link page-make" href="#">{{$paginator->lastPage()}}</a></li>

        @elseif ($paginator->lastPage()-4 < $paginator->currentPage())
            <li class="page-item @if($paginator->lastPage() > 7)at-first @endif @if($paginator->currentPage() == 1)active @endif"><a class="page-link page-make" href="#">1</a></li>
            @if ($paginator->lastPage()-6 <= $paginator->lastPage())
            <!-- <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-6)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-6 }}</a></li> -->
            @endif
            @if ($paginator->lastPage()-5 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-5)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-5 }}</a></li>
            @endif
            @if ($paginator->lastPage()-4 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-4)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-4 }}</a></li>
            @endif
            @if ($paginator->lastPage()-3 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-3)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-3 }}</a></li>
            @endif
            @if ($paginator->lastPage()-2 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-2)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-2 }}</a></li>
            @endif
            @if ($paginator->lastPage()-1 <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage()-1)active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage()-1 }}</a></li>
            @endif
            @if ($paginator->lastPage() <= $paginator->lastPage())
            <li class="page-item @if($paginator->currentPage() == $paginator->lastPage())active @endif"><a class="page-link page-make" href="#">{{ $paginator->lastPage() }}</a></li>
            @endif

        @else
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <!-- <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li> -->
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @elseif ($page == 1)
                            <li class="page-item at-first"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($paginator->currentPage() - 2 == $page)
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($paginator->currentPage() - 1 == $page)
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage() + 1 )
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage() + 2 )
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage())
                            <li class="page-item to-last"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"></li>
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">次へ></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <!-- <span class="page-link" aria-hidden="true">次へ</span> -->
            </li>
        @endif
    </ul>

<script type="text/javascript">
    /**
    *  GETパラメータを配列にして返す
    *
    *  @return     パラメータのObject
    *
    */
    var getUrlVars = function(){
        var vars = {};
        var param = location.search.substring(1).split('&');
        for(var i = 0; i < param.length; i++) {
            var keySearch = param[i].search(/=/);
            var key = '';
            if(keySearch != -1) key = param[i].slice(0, keySearch);
            var val = param[i].slice(param[i].indexOf('=', 0) + 1);
            if(key != '') vars[key] = decodeURI(val);
        }
        return vars;
    }

    $(document).ready(function() {
        // copy
        $(".page-make").on('click', function() {
            let params = getUrlVars()
            let page = $(this).text();
            var new_param = "?";

            if (params != "{}") {
                for (key in params) {
                    if (key != "page") {
                        new_param = new_param + key + "=" + params[key] + "&";
                    }
                }
            }

            new_param = new_param + "page=" + page;
            let url = location.protocol + "//" + location.host + location.pathname + new_param;
            location.href = url;
        });
    });
</script>
@endif
