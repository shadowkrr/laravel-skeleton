@extends('layouts.app')

@section('content')

@if(Session::has('success'))
<div class="alert alert-success">
  <strong>成功</strong> {{ session('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
  <strong>エラー</strong> {{ session('error') }}
</div>
@endif

<!-- Page Content -->
    <div class="main-list-page container-fluid">
        @if (0 < count($paginator))
        <!-- Heading Pagination -->
        <div class="container-fluid mt-3">
            <div class="col-12 paging">
                <div class="paging-now color-gray">
                    <label>
                        {{($params['page']-1) * $params['limit'] + 1}}-{{($params['page']-1) * $params['limit'] + $paginator->count()}} <span>件</span> /{{$paginator->total()}} <span>件</span>
                    </label>
                    <label class="refine-number-label">
                        <span>表示件数:</span>
                    </label>
                    <ul class="refine-number">
                        <li @if ($params['limit'] && $params['limit'] == 20) class="active"><span>20</span> @else ><a href="#" class="page-limit" type="limit">20</a> @endif</li>
                        <li @if ($params['limit'] && $params['limit'] == 50) class="active"><span>50</span> @else ><a href="#" class="page-limit" type="limit">50</a> @endif</li>
                        <li @if ($params['limit'] && $params['limit'] == 100) class="active"><span>100</span> @else ><a href="#" class="page-limit" type="limit">100</a> @endif</li>
                    </ul>
                </div>
                <nav aria-label="navigation">
                    {{$paginator->appends($params)->links() }}
                </nav>
                @if ($paginator->total() <= $params['limit'])
                    <span>　</span>
                @endif
            </div>
        </div>
        <!-- /.row .my-3 -->
        @endif

        <!-- Call to Action Well -->
        <div class="row mb-3">
            <table class="table list-table main-list-table main-list-table-admin fixed-header">
                <colgroup>
                    <col class="url">
                    <col class="publisher-col">
                    <col class="type-col">
                    <col class="datetime-col">
                    <col class="table-separate">
                    @if (Auth::user()->role == config('const.role.admin'))
                    <col class="result-col">
                    <col class="result-col">
                    <col class="result-col">
                    <col class="result-col">
                    <col class="result-col">
                    <col class="result-col">
                    <col class="table-separate">
                    @endif
                    <col class="samary-col">
                    <col class="table-separate">
                    <col class="samary-col">
                    <col class="datetime-col">
                    <col class="datetime-col">
                    <col class="table-separate">
                    <col class="flag-col">
                    <col class="pc-rerun">
                    <col class="sp-rerun">
                    <col class="datetime-col">
                    <col class="table-separate">
                    <col class="comment-col">
                    <col class="flag-col">
                </colgroup>
                <thead>
                    <tr>
                        <td class="url bottom-gray cluster-first"><div>
                            <span class="title">URL</span>
                        </div></td>
                        <td class="bottom-gray"><div>
                            <div class="head-border"></div>
                            @if (empty($params['publisher_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="publisher_st" value="@if (empty($params['publisher_st'])) 0 @else {{$params['publisher_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['publisher_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="publisher_st" value="@if (empty($params['publisher_st'])) 0 @else {{$params['publisher_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="publisher_st" value="@if (empty($params['publisher_st'])) 0 @else {{$params['publisher_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">publisher_id</span>
                        </div></td>

                        <td class="url bottom-gray"><div>
			                <div class="head-border"></div>
                            <span class="title">種別</span>
                        </div></td>

                        <td class="bottom-gray cluster-last"><div>
                            @if (empty($params['updated_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="updated_st" value="@if (empty($params['updated_st'])) 0 @else {{$params['updated_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['updated_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="updated_st" value="@if (empty($params['updated_st'])) 0 @else {{$params['updated_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="updated_st" value="@if (empty($params['updated_st'])) 0 @else {{$params['updated_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <div class="head-border"></div>
                            <span class="title">インポート<br>日時</span>
                        </div></td>

                        @if (Auth::user()->role == config('const.role.admin'))
                        <td class="table-separate"></td>
            			<td class="bottom-dark-green cluster-first"><div>
                            <!-- <div class="head-border"></div> -->
                            @if (empty($params['target_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="target_st" value="@if (empty($params['target_st'])) 0 @else {{$params['target_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['target_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="target_st" value="@if (empty($params['target_st'])) 0 @else {{$params['target_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="target_st" value="@if (empty($params['target_st'])) 0 @else {{$params['target_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">画像・<br>テキスト抽出<br>(最終日 / 結果)</span>
                        </div></td>

                        <td class="bottom-dark-green"><div>
                            <div class="head-border"></div>
                            @if (empty($params['match_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="match_st" value="@if (empty($params['match_st'])) 0 @else {{$params['match_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['match_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="match_st" value="@if (empty($params['match_st'])) 0 @else {{$params['match_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="match_st" value="@if (empty($params['match_st'])) 0 @else {{$params['match_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">画像マッチング①<br>ロジック<br>(最終日 / 結果)</span>
                        </div></td>

                        <td class="bottom-dark-green"><div>
                            <div class="head-border"></div>
                            @if (empty($params['ml_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="ml_st" value="@if (empty($params['ml_st'])) 0 @else {{$params['ml_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['ml_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="ml_st" value="@if (empty($params['ml_st'])) 0 @else {{$params['ml_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="ml_st" value="@if (empty($params['ml_st'])) 0 @else {{$params['ml_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">画像マッチング②<br>機械学習<br>(最終日 / 結果)</span>
                        </div></td>

                        <td class="bottom-dark-green"><div>
                            <div class="head-border"></div>
                            @if (empty($params['ocr_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="ocr_st" value="@if (empty($params['ocr_st'])) 0 @else {{$params['ocr_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['ocr_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="ocr_st" value="@if (empty($params['ocr_st'])) 0 @else {{$params['ocr_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="ocr_st" value="@if (empty($params['ocr_st'])) 0 @else {{$params['ocr_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">OCR<br>(最終日 / 結果)</span>
                        </div></td>
                        <td class="bottom-dark-green"><div>
                            <div class="head-border"></div>
                            @if (empty($params['text_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="text_st" value="@if (empty($params['text_st'])) 0 @else {{$params['text_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['text_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="text_st" value="@if (empty($params['text_st'])) 0 @else {{$params['text_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="text_st" value="@if (empty($params['text_st'])) 0 @else {{$params['text_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">テキスト<br>チェッカー<br>(最終日 / 結果)</span>
                        </div></td>
                        <td class="bottom-dark-green cluster-last"><div>
                            <div class="head-border"></div>
                            @if (empty($params['banner_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="banner_st" value="@if (empty($params['banner_st'])) 0 @else {{$params['banner_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['banner_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="banner_st" value="@if (empty($params['banner_st'])) 0 @else {{$params['banner_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="banner_st" value="@if (empty($params['banner_st'])) 0 @else {{$params['banner_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">バナー<br>チェッカー<br>(最終日 / 結果)</span>
                        </div></td>
                        @endif
                        <td class="table-separate"></td>
                        <td class="bottom-yellow-green cluster-first cluster-last"><div>
                            @if (empty($params['violation_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="violation_st" value="@if (empty($params['violation_st'])) 0 @else {{$params['violation_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['violation_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="violation_st" value="@if (empty($params['violation_st'])) 0 @else {{$params['violation_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="violation_st" value="@if (empty($params['violation_st'])) 0 @else {{$params['violation_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">違反表示<br>(サマリ結果)</span>
                        </div></td>
                        <td class="table-separate"></td>

                        <td class="bottom-yellow cluster-first"><div>
                            @if (empty($params['diff_flag_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="diff_flag_st" value="@if (empty($params['diff_flag_st'])) 0 @else {{$params['diff_flag_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['diff_flag_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="diff_flag_st" value="@if (empty($params['diff_flag_st'])) 0 @else {{$params['diff_flag_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="diff_flag_st" value="@if (empty($params['diff_flag_st'])) 0 @else {{$params['diff_flag_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">ページ変化<br>(有無)</span>
                        </div></td>

                        <td class="bottom-yellow"><div>
                            <div class="head-border"></div>
                            @if (empty($params['diff_dated_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="diff_dated_st" value="@if (empty($params['diff_dated_st'])) 0 @else {{$params['diff_dated_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['diff_dated_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="diff_dated_st" value="@if (empty($params['diff_dated_st'])) 0 @else {{$params['diff_dated_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="diff_dated_st" value="@if (empty($params['diff_dated_st'])) 0 @else {{$params['diff_dated_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">ページ変化<br>(確認日時)</span>
                        </div></td>

                        <td class="bottom-yellow cluster-last"><div>
                            <div class="head-border"></div>
                            @if (empty($params['check_updated_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="check_updated_st" value="@if (empty($params['check_updated_st'])) 0 @else {{$params['check_updated_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['check_updated_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="check_updated_st" value="@if (empty($params['check_updated_st'])) 0 @else {{$params['check_updated_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="check_updated_st" value="@if (empty($params['check_updated_st'])) 0 @else {{$params['check_updated_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">チェック日時</span>
                        </div></td>

                        <td class="table-separate"></td>
                        <td class="bottom-orange cluster-first"><div>
                            @if (empty($params['remember_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="remember_st" value="@if (empty($params['remember_st'])) 0 @else {{$params['remember_st']}} @endif"><i class="den icon-d-triangle-o"></i></a></span>
                            @else
                                @if ($params['remember_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="remember_st" value="@if (empty($params['remember_st'])) 0 @else {{$params['remember_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="remember_st" value="@if (empty($params['remember_st'])) 0 @else {{$params['remember_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">リメンバー<br>フラグ</span>
                        </div></td>
                        <td class="bottom-orange" colspan="2"><div>
                            <div class="head-border"></div>
                            @if (empty($params['status_st']))
                                <span class="sortable"><a href="#" class="icon-default sort" type="status_st" value="@if (empty($params['status_st'])) 0 @else {{$params['status_st']}} @endif"><!-- <i class="den icon-d-triangle-o"></i> --></a></span>
                            @else
                                @if ($params['status_st'] == config('const.pager.sort.asc'))
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="status_st" value="@if (empty($params['status_st'])) 0 @else {{$params['status_st']}} @endif"><i class="den icon-u-triangle"></i></a></span>
                                @else
                                    <span class="sortable"><a href="#" class="icon-default sort active" type="status_st" value="@if (empty($params['status_st'])) 0 @else {{$params['status_st']}} @endif"><i class="den icon-d-triangle"></i></a></span>
                                @endif
                            @endif
                            <span class="title">再実行<br>フラグ</span>
                        </div></td>
                        <th class="bottom-orange cluster-last"><div>
                            <div class="head-border"></div>
                            <span class="title">メール送信<br>日時</span>
                        </div></th>
                        <th class="table-separate"></th>
                        <th class="bottom-gray cluster-first cluster-last" colspan="2"><div>
                            <div class="head-border"></div>
                            <span class="title">コメント登録</span>
                        </div></th>
                    </tr>
                </thead>
                @if (0 < count($paginator))
                <tbody>
                @foreach ($paginator as $site)
                    <tr>
                        <td class="cluster-firs">
                            <div class="url"><a href="{{$site->url}}" target="_blank">{{$site->url}}</a></div>
                        </td>
                        <td>
                            <div class="publisher datetime date">{{$site->publish_id}}</div>
            		</td>

                    <!-- 種別 -->
                    <td>
                        @if (empty($site->target_flag))
                            <a class="icon-popup" title="末実行">
                                <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                            </a>
                        @elseif ($site->service_type == 1)
                        @if ($site->content_type == 1)
                            <div class="url-type">キャッシング・<br>複数社比較</div>
                        @elseif ($site->content_type == 2)
                            <div class="url-type">キャッシング・<br>アコム単体</div>
                        @elseif ($site->content_type == 3)
                            <div class="url-type">キャッシング・<br>例外</div>
                        @else
                            <div class="url-type">対象外サイト</div>
                        @endif
                        @elseif ($site->service_type == 2)
                        @if ($site->content_type == 1)
                            <div class="url-type">クレジットカード・<br>複数社比較</div>
                        @elseif ($site->content_type == 2)
                            <div class="url-type">クレジットカード・<br>アコム単体</div>
                        @elseif ($site->content_type == 3)
                            <div class="url-type">クレジットカード・<br>例外</div>
                        @else
                            <div class="url-type">対象外サイト</div>
                        @endif
                    　　@else
                        <div class="url-type">対象外サイト</div>
                        @endif
                    </td>
                    <!-- 種別 -->

                    <!-- インポート日時 -->
                    <td class="cluster-last">
                        <div class="datetime date">{{$site->updated_at}}</div>
                    </td>
                    <!-- インポート日時 -->

                        @if (Auth::user()->role == config('const.role.admin'))
                        <td class="table-separate"><div class="connection connection-dark-green"></div></td>

                        <td class="cluster-first">
                            <!-- {{$site->target_flag}}
                            {{$site->target_violation}} -->
                            @if (empty($site->target_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->target_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->target_date))
                                            <div class="last-day date">{{$site->target_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->target_flag == config('const.execute.flag.end'))
                                @if (!isset($site->target_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->target_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->target_date))
                                                <div class="last-day date">{{$site->target_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->target_violation == 2 || $site->target_violation == 3 || $site->target_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->target_date))
                                                <div class="last-day date">{{$site->target_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->target_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->target_date))
                                                <div class="last-day date">{{$site->target_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->target_date))
                                            <div class="last-day date">{{$site->target_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @elseif ($site->target_flag == 3 || $site->target_flag == 4 || $site->target_flag == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                        </div>
                                    </a>
                            @elseif ($site->target_flag == 6)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="例外">
                                        <div class="icon"><i class="den icon-reference"></i></div>
                                    </a>
                            @else
                                <a class="icon-popup"  title="未実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @endif
                        </td>
                        <td>

                            <!-- {{$site->match_flag}}
                            {{$site->match_violation}} -->
                            @if (empty($site->match_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->match_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->match_date))
                                            <div class="last-day date">{{$site->match_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->match_flag == config('const.execute.flag.end'))
                                @if (!isset($site->match_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->match_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->match_date))
                                                <div class="last-day date">{{$site->match_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->match_violation == 2 || $site->match_violation == 3 || $site->match_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->match_date))
                                                <div class="last-day date">{{$site->match_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->match_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->match_date))
                                                <div class="last-day date">{{$site->match_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->match_date))
                                            <div class="last-day date">{{$site->match_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @else
                                <a class="icon-popup" title="違反">
                                    <div class="icon"><i class="den icon-cross icon-danger"></i></div>
                                </a>
                            @endif
                        </td>

                        <td>
                            @if (empty($site->ml_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->ml_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->ml_date))
                                            <div class="last-day date">{{$site->ml_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->ml_flag == config('const.execute.flag.end'))
                                @if (!isset($site->ml_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->ml_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->ml_date))
                                                <div class="last-day date">{{$site->ml_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->ml_violation == 2 || $site->ml_violation == 3 || $site->ml_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->ml_date))
                                                <div class="last-day date">{{$site->ml_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->ml_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->ml_date))
                                                <div class="last-day date">{{$site->ml_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->ml_date))
                                            <div class="last-day date">{{$site->ml_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @else
                                <a class="icon-popup" title="違反">
                                    <div class="icon"><i class="den icon-cross icon-danger"></i></div>
                                </a>
                            @endif
                        </td>

                        <td>
                            <!-- {{$site->ocr_flag}}
                            {{$site->ocr_violation}} -->
                            @if (empty($site->ocr_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->ocr_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->ocr_date))
                                            <div class="last-day date">{{$site->ocr_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->ocr_flag == config('const.execute.flag.end'))
                                @if (!isset($site->ocr_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->ocr_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->ocr_date))
                                                <div class="last-day date">{{$site->ocr_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->ocr_violation == 2 || $site->ocr_violation == 3 || $site->ocr_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->ocr_date))
                                                <div class="last-day date">{{$site->ocr_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->ocr_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->ocr_date))
                                                <div class="last-day date">{{$site->ocr_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->ocr_date))
                                            <div class="last-day date">{{$site->ocr_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @else
                                <a class="icon-popup" title="違反">
                                    <div class="icon"><i class="den icon-cross icon-danger"></i></div>
                                </a>
                            @endif
                        </td>
                        <td>
                            <!-- {{$site->text_flag}}
                            {{$site->text_violation}} -->
                            @if (empty($site->text_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->text_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->text_date))
                                            <div class="last-day date">{{$site->text_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->text_flag == config('const.execute.flag.end'))
                                @if (!isset($site->text_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->text_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->text_date))
                                                <div class="last-day date">{{$site->text_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->text_violation == 2 || $site->text_violation == 3 || $site->text_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->text_date))
                                                <div class="last-day date">{{$site->text_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->text_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->text_date))
                                                <div class="last-day date">{{$site->text_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->text_date))
                                            <div class="last-day date">{{$site->text_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @else
                                <a class="icon-popup" title="違反">
                                    <div class="icon"><i class="den icon-cross icon-danger"></i></div>
                                </a>
                            @endif

                        </td>
                        <td class="cluster-last">

                            <!-- {{$site->banner_flag}}
                            {{$site->banner_violation}} -->
                            @if (empty($site->banner_flag))
                                <a class="icon-popup" title="末実行">
                                    <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                </a>
                            @elseif ($site->banner_flag == config('const.execute.flag.now'))
                                <a class="icon-popup"  title="実行中">
                                    <div class="icon"><i class="den icon-play icon-default"></i>
                                        @if (!empty($site->banner_date))
                                            <div class="last-day date">{{$site->banner_date}}</div>
                                        @endif
                                    </div>
                                </a>
                            @elseif ($site->banner_flag == config('const.execute.flag.end'))
                                @if (!isset($site->banner_violation))
                                    <a class="icon-popup" title="末実行">
                                        <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                                    </a>
                                @elseif ($site->banner_violation == 0)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="正常">
                                        <div class="icon">
                                            <i class="den icon-circle icon-primary icon-translucent"></i>
                                            @if (!empty($site->banner_date))
                                                <div class="last-day date">{{$site->banner_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->banner_violation == 2 || $site->banner_violation == 3 || $site->banner_violation == 4)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="エラー">
                                        <div class="icon">
                                            <i class="den icon-exclamation icon-warning"></i>
                                            @if (!empty($site->banner_date))
                                                <div class="last-day date">{{$site->banner_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @elseif ($site->banner_violation == 5)
                                    <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="要確認">
                                        <div class="icon">
                                            <i class="den icon-triangle icon-success"></i>
                                            @if (!empty($site->banner_date))
                                                <div class="last-day date">{{$site->banner_date}}</div>
                                            @endif
                                        </div>
                                    </a>
                                @else
                                <a class="icon-popup" href="/admin/site_detail/{{$site->site_id}}" title="違反">
                                    <div class="icon">
                                        <i class="den icon-cross icon-danger"></i>
                                        @if (!empty($site->banner_date))
                                            <div class="last-day date">{{$site->banner_date}}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                            @else
                                <a class="icon-popup" title="違反">
                                    <div class="icon"><i class="den icon-cross icon-danger"></i></div>
                                </a>
                            @endif
                        </td>
                        @endif
                        <td class="table-separate"><div class="connection connection-yellow-green"></div></td>
                        <!--  -->
                        <td class="cluster-first cluster-last">
                            <!-- {{$site->text_flag}}
                            {{$site->violation}} -->
                            @if ($site->text_flag == config('const.execute.flag.end') || $site->banner_flag == config('const.execute.flag.end'))
                                @if ($site->text_violation == 2 || $site->text_violation == 3 || $site->text_violation == 4 ||
                                     $site->banner_violation == 2 || $site->banner_violation == 3 || $site->banner_violation == 4)
                                    <a class="icon-popup" href="/admin/check/{{$site->id}}@if (isset($site->proc_id))/{{$site->proc_id}}?sort=product @endif" title="エラー"><div class="icon"><i class="den icon-exclamation icon-warning"></i></div></a>
                                @else
                                    @if ($site->violation == config('const.execute.violation.ng'))
                                        <a class="icon-popup" href="/admin/check/{{$site->id}}/{{$site->proc_id}}?sort=violation" title="違反"><div class="icon"><i class="den icon-cross icon-danger"></i></div></a>
                                    @elseif ($site->violation == config('const.execute.violation.ok'))
                                        <a class="icon-popup" href="/admin/check/{{$site->id}}/{{$site->proc_id}}?sort=violation" title="正常"><div class="icon"><i class="den icon-circle icon-primary icon-translucent"></i></div></a>
                                    @elseif ($site->violation == config('const.execute.violation.normal'))
                                        <a class="icon-popup" href="/admin/check/{{$site->id}}/{{$site->proc_id}}?sort=violation" title="表記なし"><div class="icon"><i class="den icon-bar icon-primary icon-translucent"></i></div></a>
                                    @else
                                        <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                                    @endif
                                @endif
                            @elseif ($site->target_flag == 6)
                                    <a class="icon-popup" title="例外"><div class="icon"><i class="den icon-reference"></i></div></a>
                            @else
                                <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                            @endif
                        </td>
                        <td class="table-separate"><div class="connection connection-yellow"></div></td>

                        <td class="cluster-first">
                            @if (!empty($site->diff_dated_at))
                                @if ($site->diff_flag == config('const.execute.target_diff.flag.no'))
                                    <div class="datetime date">{{ config('const.execute.target_diff.text.no') }}</div>
                                @elseif ($site->diff_flag == config('const.execute.target_diff.flag.yes'))
                                    <div class="datetime date">{{ config('const.execute.target_diff.text.yes') }}</div>
                                @else
                                    <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                                @endif
                            @else
                                <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                            @endif
                        </td>
                        <td>
                            @if (!empty($site->diff_dated_at))
                                <div class="datetime date">{{$site->diff_dated_at}}</div>
                            @else
                                <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                            @endif
                        </td>

                        <!-- チェック日付 -->
                        <td class="cluster-last">
                            @if (!empty($site->check_updated_at))
                                <div class="datetime date">{{$site->check_updated_at}}</div>
                            @else
                                <a class="icon-popup" title="未実行"><div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div></a>
                            @endif
                        </td>
                        <!-- チェック日付 -->

                        <td class="table-separate"><div class="connection connection-orange"></div></td>
                        <td class="flag-col cluster-first">
                            <div class="check">
                                <input type="hidden" value="0">
                                <label class="checkbox">
                                    <div class="checkbox-label">リメンバー</div>
                                    <input class="remember" type="checkbox" value="{{$site->id}}" class="list-all-checkbox" @if ($site->remember == config('const.param.remember.active'))checked="checked"@endif>
                                    <div class="checkbox-parts"></div>
                                </label>
                            </div>
                        </td>
                        <td class="pc-rerun">
                            <div class="check">
                                <input type="hidden" value="0">
                                <label class="checkbox" style="float: left;">
                                    <div class="checkbox-label">PC</div>
                                    <input class="status" type="checkbox" value="{{$site->id}}" device="PC" class="list-all-checkbox" @if ($site->pcexe == config('const.param.status.active'))checked="checked"@endif>
                                    <div class="checkbox-parts"></div>
                                </label>
                            </div>
                        </td>
                        <td class="sp-rerun">
                            <div class="check">
                                <input type="hidden" value="0">
                                <label class="checkbox">
                                    <div class="checkbox-label">SP</div>
                                    <input class="status" type="checkbox" value="{{$site->id}}" device="SP" class="list-all-checkbox" @if ($site->spexe == config('const.param.status.active'))checked="checked"@endif>
                                    <div class="checkbox-parts"></div>
                                </label>
                            </div>
                        </td>
                        <td class="cluster-last">
                            @if (!empty($site->send_date))
                                <div class="datetime send">{{$site->send_date}}</div>
                            @else
                                <div class="icon"><i class="den icon-bar icon-default icon-translucent"></i></div>
                            @endif
                            <div><a href="#" class="mailsend-regist send-date" site_id="{{$site->site_id}}" site_url="{{$site->url}}" date="{{$site->send_date}}"><i class="den icon-plus_circle"></i> 登録</a></div>
                        </td>
                        <td class="table-separate"><div class="connection connection-gray"></div></td>
                        <td class="comment-col cluster-first">
                            <span>最新コメント</span>
                            @if (0 < count($site->comments))
                                <p>{{$site->comments[0]->comment}}</p>
                            @else
                                <p class="empty">未記入</p>
                            @endif
                        </td>
                        <td class="flag-col cluster-last">
                            <a class="comment" href="#" site_id="{{$site->site_id}}" site_url="{{$site->url}}" data-toggle="modal" data-target="#commentModal">
                                <div class="icon">
                                    @if (0 < count($site->comments))
                                        <i class="den icon-comment-dot"></i>
                                        <div>全て見る</div>
                                    @else
                                        <i class="den icon-comment icon-default icon-translucent"></i>
                                        <div>新規登録</div>
                                    @endif
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
        </div>

    @if (0 < count($paginator))
        <!-- Foot Pagination -->
        <div class="row my-3 mb-5">
            <div class="col-12 paging">
                <label class="color-gray">
                    {{($params['page']-1) * $params['limit'] + 1}}-{{($params['page']-1) * $params['limit'] + $paginator->count()}} <span>件</span> /{{$paginator->total()}} <span>件</span>
                </label>
                <nav aria-label="navigation">
                    {{$paginator->appends($params)->links() }}
                </nav>
            </div>
        </div>
        <!-- /.row .my-3 -->
    @else
    条件に該当するデータがありません
    @endif
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Clip Board Javascript -->
    <script src="{{ asset('vendor/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.balloon/jquery.balloon.min.js') }}"></script>

    <!-- Fixed Stickey Javascript -->
    <script src="{{ asset('vendor/fixed-sticky/fixedsticky.js') }}"></script>

    <!-- Custom Javascriopt -->
    <script src="{{ asset('js/main.js') }}"></script>




<!-- URL登録フォームモーダル -->
<div class="modal fade" id="urlRegistModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">URL登録フォーム</h5>
                <button type="button" class="close color-gray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
            <form method="POST" id="addform" action="/admin/site/create">
            {{ csrf_field() }}
                <div class="modal-body py-5">
                    <div class="form-group">
                        <label for="regist_publisher_id">publisher_id</label>
                        <input name="publisher_id" type="text" class="form-control" id="regist_publisher_id" placeholder="publisher_idを入力" required>
                    </div>
                    <div class="form-group">
                        <label for="regist_url">URL</label>
                        <input name="url" type="url" class="form-control" id="regist_url" placeholder="URLを入力" required>
                    </div>
                    <div class="form-group">
                        <label for="regist_device">デバイス</label>
                        <select class="form-control" name="device" required>
                        <option value="PC">PC</option>
                        <option value="SP">SP</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add" type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- URL登録フォームモーダル -->

<!-- CSVインポートモーダル -->
<div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">CSV インポート</h5>
                <button type="button" class="close color-gray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
            <form method="POST" id="csvform" action="/admin/site/csv" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body py-5">
                    <div class="form-group my-5 text-center">
                        <label class="file-import btn btn-success" for="csv_import">CSVファイルをアップロード
                            <input name="csv" type="file" class="form-control" id="csv_import">
                        </label>
                        <div class="file-name">選択されていません</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add" type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- CSVインポートモーダル -->

<!-- コメントモーダル -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <h5 class="modal-title">コメント登録</h5>
                    <h6 class="modal-sub-title"></h6>
                </div>
                <button type="button" class="close color-gray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body pt-2">
                <div class="form-group">
                    <div class="message-head clearfix">
                        @if (Auth::user()->role == config('const.role.admin'))<div class="edit-tool"><a href="#" class="message-edit"><i class="den icon-edit"></i></a></div>@endif
                    </div>
                     <form method="POST" id="commentform" action="/admin/site/comment">
                        {{ csrf_field() }}
                        <input type="hidden" name="site_id" id="fixed_site_id" value="">
                        <input type="hidden" name="type" value="fixed">
                        <div class="message-body" id="fixedComment"></div>
                        <div class="message-foot" style="display:none;">
                            <textarea name="comment" class="form-control autosize" placeholder="コメントを追加"></textarea>
                            <div class="edit-tool text-right">
                                <button class="btn btn-primary">投稿する</button>&nbsp;<a href="#" class="message-cansel"><i class="den icon-cross"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="POST" id="commentform" action="/admin/site/comment">
                    {{ csrf_field() }}
                    <input type="hidden" name="site_id" id="comment_site_id" value="">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="type" value="add">
                    <div class="form-group">
                        <textarea name="comment" class="form-control autosize" placeholder="コメントを追加"></textarea>
                        <div class="message-foot" style="display:none;">
                            <div class="edit-tool text-right">
                                <button class="btn btn-primary">投稿する</button>&nbsp;<a href="#" class="message-cansel"><i class="den icon-cross"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="commentHistory"></div>
            </div>
        </div>
    </div>
</div>
<!-- コメントモーダル -->

<!-- 確認モーダル -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="color-danger mb-4">
                            <span class="confirmMark"><i class="fas fa-exclamation-triangle"></i></span>
                            このコメントを削除しますか？
                        </div>
                        <div class="row">
                            <div class="col-6 pl-0 pr-1">
                                <form method="POST" id="commentform" action="/admin/site/comment">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="comment_id" id="delete_comment_id" value="">
                                    <input type="hidden" name="site_id" id="delete_comment_site_id" value="">
                                    <input type="hidden" name="name" id="delete_name" value="">
                                    <input type="hidden" name="type" value="delete">
                                    <button class="btn btn-danger btn-block">削除</button>
                                </form>
                            </div>
                            <div class="col-6 pr-0 pl-1">
                                <button type="button" class="btn btn-light btn-block" data-dismiss="modal" aria-label="Close">キャンセル</button>
                            </div>
                        </div>
                    </div>
               </div>
        </div>
    </div>
</div>
<!-- 確認モーダル -->

<script type="text/javascript">

    function date_replace() {

        $(".date").each(function(i){
            $(this).text($(this).text().replace(/-/g, "/"));
        });
        $(".send").each(function(i){
            $(this).text($(this).text().replace(/-/g, "/"));
        });

        $("div.datetime.date").each(function(i){

            if (m = $(this).text().match(/:[0-9].*[0-9]$/g)) {
                $(this).text($(this).text().replace(/:[0-9].*[0-9]$/g, m[0].slice(0, -3)));
                sprit = $(this).text().split(' ');
                $(this).html(sprit[0] + "<br>" + sprit[1]);
            }
        });

        $(".send").each(function(i){
            if (m = $(this).text().match(/:[0-9].*[0-9]$/g)) {
                $(this).text($(this).text().replace(/:[0-9].*[0-9]$/g, m[0]));
                sprit = $(this).text().split(' ');
                $(this).html(sprit[0] + "<br>" + sprit[1]);
            }
        });
    }

    function comment_limit() {
        let cutFigure = '40'; // カットする文字数
        let afterTxt = ' …'; // 文字カット後に表示するテキスト

        $("table > tbody > tr > td.comment-col.cluster-first > p").each(function(i){
            let textLength = $(this).text().length;
            let textTrim = $(this).text().substr(0,(cutFigure))

            if(cutFigure < textLength) {
                $(this).html(textTrim + afterTxt).css({visibility:'visible'});
            } else if(cutFigure >= textLength) {
                $(this).css({visibility:'visible'});
            }
        });
    }

    $(document).ready(function() {


        date_replace();
        comment_limit();


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

        $('.status').on('click', function() {
            var status = 0;
            if ($(this).prop("checked")) {
                status = 1;
            }
            let site_id = $(this).val();
            let device = $(this).attr("device");

            let url = "/api/admin/site_status/" + site_id + "/" + device + "/" + status;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "GET",
                url : url,
                dataType : "json",
                error: function () {
                    if ($(this).prop("checked")) {
                        $(this).prop("checked", false);
                    } else {
                        $(this).prop("checked", true);
                    }
                }
            });
        });

        $('.remember').on('click', function() {
            var remember = 0;
            if ($(this).prop("checked")) {
                remember = 1;
            }
            let site_id = $(this).val();

            let url = "/api/admin/site_remember/" + site_id + "/" + remember;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "GET",
                url : url,
                dataType : "json",
                error: function () {
                    if ($(this).prop("checked")) {
                        $(this).prop("checked", false);
                    } else {
                        $(this).prop("checked", true);
                    }
                }
            });
        });

        $(".sort").on('click', function() {
            let type = $(this).attr("type");
            let value = $(this).attr("value");
            let params = getUrlVars()
            var new_param = "?";

            var types = ['target', 'match', 'ml', 'ocr', 'text', 'banner', 'diff_flag', 'diff_dated_at'];

            // ソート昇順・降順変更
            if (value == 1) {
                value = 2;
            } else if (value == 2) {
                value = 0;
            } else {
                value = 1
            }

            if (params != "{}") {
                for (key in params) {
                    if (key != "page" && key != "publisher_st" && key != "generation_st" && key != "target_st" && key != "match_st" && key != "ml_st"  && key != "ocr_st" && key != "text_st" && key != "banner_st"
                    && key != "appeal_st" && key != "company_st" && key != "product_st" && key != "other_st" && key != "ban_st" && key != "violation_st"
                    && key != "diff_flag_st" && key != "diff_dated_st"
                    && key != "created_st" && key != "check_updated_st" && key != "updated_st" && key != "remember_st" && key != "status_st" && key != "send_date_st" ) {
                        new_param = new_param + key + "=" + params[key] + "&";
                    }
                }
            }
            if (value == 1 || value == 2) {
                new_param = new_param + type + "=" + value;
            }
	    //else {
            //    new_param = "";
            //}
            let url = location.protocol + "//" + location.host + location.pathname + new_param;

            location.href = url;
        });

        $('.comment').on('click', function() {
            let site_id = $(this).attr("site_id")
            let site_url = $(this).attr("site_url")
            let url = "{{ url('/api/admin/get_site_comment') }}/" + site_id;

            // 入力コメントを空
            $("textarea[name='comment']").val("");
            $(".modal-sub-title").text(site_url);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "GET",
                url : url,
                timeout:3000,
            }).done(function(data) {
                $("#commentHistory").html("");

                data.comment.forEach(function(element) {
                    $("#fixedComment").html(element.comment);
                });

                data.comments.forEach(function(element) {
                    element.updated_at = element.updated_at.replace(/-/g, "/");
                    element.updated_at = element.updated_at.slice(0, -3);
                    var html = `
                    <div class="form-group comments">
                            <div class="message-head clearfix">
                                <div class="edit-tool">
                                    @if (Auth::user()->role == config('const.role.admin'))
                                        <a href="#" class="message-edit"><i class="den icon-edit"></i></a>&nbsp;
                                        <a href="#" class="message-delete comment_delete" comment_id="${element.id}" comment_site_id="${element.site_id}" name="${element.name}" data-toggle="modal" data-target="#confirmModal"><i class="den icon-delete"></i></a>
                                    @else
                                        `;
                                        if ("{{Auth::user()->name}}" == element.name) {
                                            html = html + `
                                            <a href="#" class="message-edit"><i class="den icon-edit"></i></a>&nbsp;
                                            <a href="#" class="message-delete comment_delete" comment_id="${element.id}" comment_site_id="${element.site_id}" name="${element.name}" data-toggle="modal" data-target="#confirmModal"><i class="den icon-delete"></i></a>
                                            `;
                                        }
                    html = html + `
                                    @endif
                                </div>
                                <div class="message-person">${element.name}</div>
                                <div class="message-datetime">${element.updated_at}</div>
                            </div>
                            <form method="POST" id="commentform" action="/admin/site/comment">
                            {{ csrf_field() }}
                            <input type="hidden" name="comment_id" value="${element.id}">
                            <input type="hidden" name="site_id" id="comment_site_id" value="${element.site_id}">
                            <input type="hidden" name="name" value="${element.name}">
                            <input type="hidden" name="type" value="edit">
                            <div class="message-body">${element.comment}</div>
                            <div class="message-foot" style="display:none;">
                                <textarea name="comment" class="form-control autosize" placeholder="コメントを追加"></textarea>
                                <div class="edit-tool text-right">
                                    <button class="btn btn-primary">投稿する</button>&nbsp;<a href="#" class="message-cansel"><i class="den icon-cross"></i></a>
                                </div>
                            </div>
                            </form>
                        </div>
                    `;
                    $("#commentHistory").append(html);
                });

                $('.comment_delete').on('click', function() {
                    let comment_id = $(this).attr("comment_id");
                    let comment_site_id = $(this).attr("comment_site_id");
                    let name = $(this).attr("name");
                    $("#delete_comment_id").val(comment_id);
                    $("#delete_comment_site_id").val(comment_site_id);
                    $("#delete_name").val(name);
                });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            });
            // 登録フォームに挿入
            $("#fixed_site_id").val(site_id);
            $("#comment_site_id").val(site_id);
        });

    	$('.send-date').on('click', function() {

   	    let site_id = $(this).attr("site_id")
    	    let site_url = $(this).attr("site_url")
    	    let send_date = $(this).attr("date")
	    let date = new Date();
            //let format = 'YYYY-MM-DDThh:mm:ss';
            let format = 'YYYY-MM-DDThh:mm';

            if (send_date !== ""){
                format = send_date.replace(/\s/g, "T").slice(0, -3);
            } else {
                    format = format.replace(/YYYY/g, date.getFullYear());
                    format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
                    format = format.replace(/DD/g, ('0' + date.getDate()).slice(-2));
                    format = format.replace(/hh/g, ('0' + date.getHours()).slice(-2));
                    format = format.replace(/mm/g, ('0' + date.getMinutes()).slice(-2));
            }
            $(".datetime-local").val(format);
            $(".modal-sub-title").text(site_url);
            $("#senddate_site_id").val(site_id);

            $('.date-delete').on('click', function() {
                $(".datetime-local").val("");
            });
	});

    });
</script>

@endsection
