<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'サイト名') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- font awesome core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}" >

    <!-- dentsu icon -->
    <link rel="stylesheet" href="{{ asset('vendor/dentsu-icon/style.css') }}" >

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fixed Sticky CSS -->
    <link href="{{ asset('vendor/fixed-sticky/fixedsticky.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

</head>
<body>
    <!-- Navigation -->
    <header id="header-nav" class="fixed-top navbar-border">
        <nav class="navbar navbar-expand navbar-white bg-white">
            <div class="container-fluid">
                <!-- <h2 class="logo"><a class="navbar-brand color-dark" href="{{ url('/admin') }}"><img src="{{ asset('img/logo/logo.png') }}" alt="サイト名" /></a></h2> -->
                @if (!empty(Auth::user()->name))
                <div class="collapse order-1 navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle color-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu user-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#urlRegistModal"><i class="fas fa-clipboard-list icon-default"></i>&nbsp;URL登録フォーム</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#csvImportModal"><i class="fas fa-sign-in-alt icon-default deg-90"></i>&nbsp;CSVインポート</a>
                                <a class="dropdown-item" href="/admin/download"><i class="fas fa-sign-out-alt icon-default deg-90"></i>&nbsp;パトロール結果ダウンロード</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt icon-default"></i>&nbsp;ログアウト</a>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
                @if (!empty(Auth::user()->name))
                @if ($params['action'] == "site")
                <div class="refine-dropdown order-0 bg-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "site_detail")
                <div class="refine-dropdown order-0 bg-success">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "target")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "match")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "ocr")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "text")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "banner")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif ($params['action'] == "ml")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                @elseif ($params['action'] == "ml_all")
                <div class="refine-dropdown order-0 bg-warning">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toggleDetailsNarrowing" role="button" data-toggle="collapse" data-target="#details-narrowing">
                                <span>詳細を絞り込み</span>
                                <i class="fas fa-caret-down"></i>
                                <i class="fas fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
                <!-- /.refine-dropdown -->
                @endif
            </div>
        </nav>
    </header>
    <div class="header-border"></div>
    @if ($params['action'] == "site")
    <div id="details-narrowing" class="fixedsticky bg-dark collapse main-list-page in show">
        <div class="container-fluid bg-dark pt-3 pb-2">
            <form method="GET" id="filter" action="{{url()->current()}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-7 pr-0">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">URL</label>
                                    <input type="text" class="form-control" name="url" placeholder="URL を入力" value="@if (isset($params['url'])){{$params['url']}}@endif">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group pt-2 pr-4">
                                    <label class="form-label">publisher_id</label>
                                    <input type="text" class="form-control" name="publisher_id" placeholder="publisher_id を入力" value="@if (isset($params['publisher_id'])){{$params['publisher_id']}}@endif">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group pt-2 px-2 mb-4">
                                    <label class="form-label">実行結果</label>
                                    <div class="check-button-group clearfix">
                                        <div class="check-button">
                                            <input id="execution1" type="checkbox" class="check-button-input" name="type6" value="1" @if (isset($params['type6']) && $params['type6'] == 1) checked="checked" @endif>
                                            <label for="execution1" class="check-button-label mb-0">
                                                <i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">正常</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution2" type="checkbox" class="check-button-input" name="type7" value="1" @if (isset($params['type7']) && $params['type7'] == 1) checked="checked" @endif>
                                            <label for="execution2" class="check-button-label mb-0">
                                                <i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution3" type="checkbox" class="check-button-input" name="type5" value="1" @if (isset($params['type5']) && $params['type5'] == 1) checked="checked" @endif>
                                            <label for="execution3" class="check-button-label mb-0">
                                                <i class="den icon-triangle icon-success"></i> <span class="check-button-label-text">要確認</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution5" type="checkbox" class="check-button-input" name="type3" value="1" @if (isset($params['type3']) && $params['type3'] == 1) checked="checked" @endif>
                                            <label for="execution5" class="check-button-label mb-0">
                                                <i class="den icon-exclamation icon-warning"></i> <span class="check-button-label-text">エラー</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution6" type="checkbox" class="check-button-input" name="type0" value="1" @if (isset($params['type0']) && $params['type0'] == 1) checked="checked" @endif>
                                            <label for="execution6" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-dark icon-translucent"></i> <span class="check-button-label-text">未実行</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution7" type="checkbox" class="check-button-input" name="type1" value="1" @if (isset($params['type1']) && $params['type1'] == 1) checked="checked" @endif>
                                            <label for="execution7" class="check-button-label mb-0">
                                                <i class="den icon-play icon-dark icon-translucent"></i> <span class="check-button-label-text">実行中</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution4" type="checkbox" class="check-button-input" name="type-6" value="1" @if (isset($params['type-6']) && $params['type-6'] == 1) checked="checked" @endif>
                                            <label for="execution4" class="check-button-label mb-0">
                                                <i class="den icon-reference icon-dark icon-translucent"></i> <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group pt-2 px-2">
                                    <label class="form-label">サマリ結果</label>
                                    <div class="check-button-group clearfix">
                                        <div class="check-button">
                                            <input id="summary1" type="checkbox" class="check-button-input" name="violation6" value="1" @if (isset($params['violation6']) && $params['violation6'] == 1) checked="checked" @endif>
                                            <label for="summary1" class="check-button-label mb-0">
                                                <i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">正常</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary2" type="checkbox" class="check-button-input" name="violation7" value="1" @if (isset($params['violation7']) && $params['violation7'] == 1) checked="checked" @endif>
                                            <label for="summary2" class="check-button-label mb-0">
                                                <i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary3" type="checkbox" class="check-button-input" name="violation5" value="1" @if (isset($params['violation5']) && $params['violation5'] == 1) checked="checked" @endif>
                                            <label for="summary3" class="check-button-label mb-0">
                                                <i class="den icon-triangle icon-success"></i> <span class="check-button-label-text">要確認</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary5" type="checkbox" class="check-button-input" name="violation3" value="1" @if (isset($params['violation3']) && $params['violation3'] == 1) checked="checked" @endif>
                                            <label for="summary5" class="check-button-label mb-0">
                                                <i class="den icon-exclamation icon-warning"></i> <span class="check-button-label-text">エラー</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary6" type="checkbox" class="check-button-input" name="violation0" value="1" @if (isset($params['violation0']) && $params['violation0'] == 1) checked="checked" @endif>
                                            <label for="summary6" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-dark icon-translucent"></i> <span class="check-button-label-text">未実行</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary4" type="checkbox" class="check-button-input" name="violation-6" value="1" @if (isset($params['violation-6']) && $params['violation-6'] == 1) checked="checked" @endif>
                                            <label for="summary4" class="check-button-label mb-0">
                                                <i class="den icon-reference icon-dark icon-translucent"></i> <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary7" type="checkbox" class="check-button-input" name="violation-1" value="1" @if (isset($params['violation-1']) && $params['violation-1'] == 1) checked="checked" @endif>
                                            <label for="summary7" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-primary"></i> <span class="check-button-label-text">表記なし</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"><div class="row">
                        <div class="col-3 refine-by-area pr-0"><div class="row">
                            <div class="col-12 pl-0">
                                <div class="form-group pt-2 mb-1">
                                    <label class="form-label">インポート日時</label><br>
                                    <label class="refine-date-label">絞り込み開始日</label>
                                    <input type="date" class="form-control py-0" name="datefrom" value="@if (isset($params['datefrom'])){{$params['datefrom']}}@endif">
                                </div>
                            </div>
                            <div class="col-12 pl-0">
                                <div class="form-group">
                                    <label class="form-label refine-date-label">絞り込み終了日</label>
                                    <input type="date" class="form-control py-0" name="dateto" value="@if (isset($params['dateto'])){{$params['dateto']}}@endif">
                                </div>
                            </div>
                            <div class="col-12 pl-0">
                                <div class="form-group">
                                    <label class="form-label mt-2">ページ変化</label>
                                    <div class="type-checkbox-group">
                                        <div class="checkbox-inline mr-3">
                                            <input id="change_none" type="checkbox" class="check-button-input" name="diff-flag-{{config('const.execute.target_diff.flag.no')}}" value={{config('const.execute.target_diff.flag.no')}} @if (isset($params['diff-flag-0']) && $params['diff-flag-0'] == config('const.execute.target_diff.flag.no')) checked="checked" @endif>
                                            <label for="change_none" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">無し</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="change_exist" type="checkbox" class="check-button-input" name="diff-flag-{{config('const.execute.target_diff.flag.yes')}}" value={{config('const.execute.target_diff.flag.yes')}} @if (isset($params['diff-flag-1']) && $params['diff-flag-1'] == config('const.execute.target_diff.flag.yes')) checked="checked" @endif>
                                            <label for="change_exist" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">有り</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></div>
                        <div class="col-3 pl-4">
                            <div class="row">
                                <div class="col-12 pr-0 pl-4">
                                    <div class="form-group pt-2">
                                        <label class="form-label">リメンバーフラグ</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="remember" value="0" @if (isset($params['remember']) && $params['remember'] == 0) checked="checked" @endif>
                                            <div class="radio-parts">無効</div>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="remember" value="1" @if (isset($params['remember']) && $params['remember'] == 1) checked="checked" @endif>
                                            <div class="radio-parts">有効</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 pr-0 pl-4">
                                    <div class="form-group pt-2">
                                        <label class="form-label">PC再実行フラグ</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="pcexe" value="0" @if (isset($params['pcexe']) && $params['pcexe'] == 0) checked="checked" @endif>
                                            <div class="radio-parts">無効</div>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="pcexe" value="1" @if (isset($params['pcexe']) && $params['pcexe'] == 1) checked="checked" @endif>
                                            <div class="radio-parts">有効</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 pr-0 pl-4">
                                    <div class="form-group pt-2">
                                        <label class="form-label">SP再実行フラグ</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="spexe" value="0" @if (isset($params['spexe']) && $params['spexe'] == 0) checked="checked" @endif>
                                            <div class="radio-parts">無効</div>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="spexe" value="1" @if (isset($params['spexe']) && $params['spexe'] == 1) checked="checked" @endif>
                                            <div class="radio-parts">有効</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pt-2 px-4 mb-0">
                                <label class="form-label mb-0">種別</label>
                                <div class="type-checkbox-group row">
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">キャッシング</label>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type1" type="checkbox" class="check-button-input" name="url-type-12" value="1" @if (isset($params['url-type-12']) && $params['url-type-12'] == 1) checked="checked" @endif>
                                            <label for="type1" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">アコム単体</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type2" type="checkbox" class="check-button-input" name="url-type-11" value="1" @if (isset($params['url-type-11']) && $params['url-type-11'] == 1) checked="checked" @endif>
                                            <label for="type2" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">複数社比較</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline">
                                            <input id="type3" type="checkbox" class="check-button-input" name="url-type-13" value="1" @if (isset($params['url-type-13']) && $params['url-type-13'] == 1) checked="checked" @endif>
                                            <label for="type3" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">クレジットカード</label>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type4" type="checkbox" class="check-button-input" name="url-type-22" value="1" @if (isset($params['url-type-22']) && $params['url-type-22'] == 1) checked="checked" @endif>
                                            <label for="type4" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">アコム単体</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type5" type="checkbox" class="check-button-input" name="url-type-21" value="1" @if (isset($params['url-type-21']) && $params['url-type-21'] == 1) checked="checked" @endif>
                                            <label for="type5" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">複数社比較</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline">
                                            <input id="type6" type="checkbox" class="check-button-input" name="url-type-23" value="1" @if (isset($params['url-type-23']) && $params['url-type-23'] == 1) checked="checked" @endif>
                                            <label for="type6" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">その他</label>
                                        <div class="checkbox-inline">
                                            <input id="type7" type="checkbox" class="check-button-input" name="url-type-other" value="1" @if (isset($params['url-type-other']) && $params['url-type-other'] == 1) checked="checked" @endif>
                                            <label for="type7" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">対象外サイト</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10 text-center">
                                        <div><button type="submit" class="btn w-100 mt-3">この条件で絞り込み</button></div>
                                        <div class="my-2"><a href="/admin/site">絞り込みを解除</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "site_detail")
    <div id="details-narrowing" class="fixedsticky bg-success collapse in show">
        <div class="container-fluid bg-success pt-3 pb-2">
            <form method="GET" id="filter" action="{{url()->current()}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group pt-2 px-2 mb-4">
                                    <label class="form-label">実行結果</label>
                                    <div class="check-button-group clearfix">
                                        <div class="check-button">
                                            <input id="execution1" type="checkbox" class="check-button-input" name="type6" value="1" @if (isset($params['type6']) && $params['type6'] == 1) checked="checked" @endif>
                                            <label for="execution1" class="check-button-label mb-0">
                                                <i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">正常</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution2" type="checkbox" class="check-button-input" name="type7" value="1" @if (isset($params['type7']) && $params['type7'] == 1) checked="checked" @endif>
                                            <label for="execution2" class="check-button-label mb-0">
                                                <i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution3" type="checkbox" class="check-button-input" name="type5" value="1" @if (isset($params['type5']) && $params['type5'] == 1) checked="checked" @endif>
                                            <label for="execution3" class="check-button-label mb-0">
                                                <i class="den icon-triangle icon-success"></i> <span class="check-button-label-text">要確認</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution5" type="checkbox" class="check-button-input" name="type3" value="1" @if (isset($params['type3']) && $params['type3'] == 1) checked="checked" @endif>
                                            <label for="execution5" class="check-button-label mb-0">
                                                <i class="den icon-exclamation icon-warning"></i> <span class="check-button-label-text">エラー</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution6" type="checkbox" class="check-button-input" name="type0" value="1" @if (isset($params['type0']) && $params['type0'] == 1) checked="checked" @endif>
                                            <label for="execution6" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-dark icon-translucent"></i> <span class="check-button-label-text">未実行</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution7" type="checkbox" class="check-button-input" name="type1" value="1" @if (isset($params['type1']) && $params['type1'] == 1) checked="checked" @endif>
                                            <label for="execution7" class="check-button-label mb-0">
                                                <i class="den icon-play icon-dark icon-translucent"></i> <span class="check-button-label-text">実行中</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="execution4" type="checkbox" class="check-button-input" name="type-6" value="1" @if (isset($params['type-6']) && $params['type-6'] == 1) checked="checked" @endif>
                                            <label for="execution4" class="check-button-label mb-0">
                                                <i class="den icon-reference icon-dark icon-translucent"></i> <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group pt-2 px-2">
                                    <label class="form-label">サマリ結果</label>
                                    <div class="check-button-group clearfix">
                                        <div class="check-button">
                                            <input id="summary1" type="checkbox" class="check-button-input" name="violation6" value="1" @if (isset($params['violation6']) && $params['violation6'] == 1) checked="checked" @endif>
                                            <label for="summary1" class="check-button-label mb-0">
                                                <i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">正常</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary2" type="checkbox" class="check-button-input" name="violation7" value="1" @if (isset($params['violation7']) && $params['violation7'] == 1) checked="checked" @endif>
                                            <label for="summary2" class="check-button-label mb-0">
                                                <i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary3" type="checkbox" class="check-button-input" name="violation5" value="1" @if (isset($params['violation5']) && $params['violation5'] == 1) checked="checked" @endif>
                                            <label for="summary3" class="check-button-label mb-0">
                                                <i class="den icon-triangle icon-success"></i> <span class="check-button-label-text">要確認</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary5" type="checkbox" class="check-button-input" name="violation3" value="1" @if (isset($params['violation3']) && $params['violation3'] == 1) checked="checked" @endif>
                                            <label for="summary5" class="check-button-label mb-0">
                                                <i class="den icon-exclamation icon-warning"></i> <span class="check-button-label-text">エラー</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary6" type="checkbox" class="check-button-input" name="violation0" value="1" @if (isset($params['violation0']) && $params['violation0'] == 1) checked="checked" @endif>
                                            <label for="summary6" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-dark icon-translucent"></i> <span class="check-button-label-text">未実行</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary4" type="checkbox" class="check-button-input" name="violation-6" value="1" @if (isset($params['violation-6']) && $params['violation-6'] == 1) checked="checked" @endif>
                                            <label for="summary4" class="check-button-label mb-0">
                                                <i class="den icon-reference icon-dark icon-translucent"></i> <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                        <div class="check-button">
                                            <input id="summary7" type="checkbox" class="check-button-input" name="violation-1" value="1" @if (isset($params['violation-1']) && $params['violation-1'] == 1) checked="checked" @endif>
                                            <label for="summary7" class="check-button-label mb-0">
                                                <i class="den icon-mini-bar icon-primary"></i> <span class="check-button-label-text">表記なし</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"><div class="row">
                        <div class="col-3 refine-by-area pr-0"><div class="row">
                            <div class="col-12 pl-0">
                                <div class="form-group pt-2 mb-1">
                                    <label class="form-label">実行日時</label><br>
                                    <input type="date" class="form-control py-0" name="date" value="@if (isset($params['date'])){{$params['date']}}@endif">
                                </div>
                            </div>
                            <div class="col-12 pl-0">
                                <div class="form-group pt-2 mb-1">
                                    <label class="form-label mb-0">更新日時</label><br>
                                    <label class="refine-date-label">絞り込み開始日</label>
                                    <input type="date" class="form-control py-0" name="datefrom" value="@if (isset($params['datefrom'])){{$params['datefrom']}}@endif">
                                </div>
                            </div>
                            <div class="col-12 pl-0">
                                <div class="form-group">
                                    <label class="form-label refine-date-label">絞り込み終了日</label>
                                    <input type="date" class="form-control py-0" name="dateto" value="@if (isset($params['dateto'])){{$params['dateto']}}@endif">
                                </div>
                            </div>
                            <div class="col-12 pl-0">
                                <div class="form-group">
                                    <label class="form-label mt-2">ページ変化</label>
                                    <div class="type-checkbox-group">
                                        <div class="checkbox-inline mr-3">
                                            <input id="change_none" type="checkbox" class="check-button-input" name="diff-flag-{{config('const.execute.target_diff.flag.no')}}" value={{config('const.execute.target_diff.flag.no')}} @if (isset($params['diff-flag-0']) && $params['diff-flag-0'] == config('const.execute.target_diff.flag.no')) checked="checked" @endif>
                                            <label for="change_none" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">無し</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="change_exist" type="checkbox" class="check-button-input" name="diff-flag-{{config('const.execute.target_diff.flag.yes')}}" value={{config('const.execute.target_diff.flag.yes')}} @if (isset($params['diff-flag-1']) && $params['diff-flag-1'] == config('const.execute.target_diff.flag.yes')) checked="checked" @endif>
                                            <label for="change_exist" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">有り</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></div>
                        <div class="col-6">
                            <div class="form-group pt-2 px-4 mb-0">
                                <label class="form-label mb-0">種別</label>
                                <div class="type-checkbox-group row">
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">キャッシング</label>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type1" type="checkbox" class="check-button-input" name="url-type-12" value="1" @if (isset($params['url-type-12']) && $params['url-type-12'] == 1) checked="checked" @endif>
                                            <label for="type1" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">アコム単体</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type2" type="checkbox" class="check-button-input" name="url-type-11" value="1" @if (isset($params['url-type-11']) && $params['url-type-11'] == 1) checked="checked" @endif>
                                            <label for="type2" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">複数社比較</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline">
                                            <input id="type3" type="checkbox" class="check-button-input" name="url-type-13" value="1" @if (isset($params['url-type-13']) && $params['url-type-13'] == 1) checked="checked" @endif>
                                            <label for="type3" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">クレジットカード</label>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type4" type="checkbox" class="check-button-input" name="url-type-22" value="1" @if (isset($params['url-type-22']) && $params['url-type-22'] == 1) checked="checked" @endif>
                                            <label for="type4" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">アコム単体</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline mr-3">
                                            <input id="type5" type="checkbox" class="check-button-input" name="url-type-21" value="1" @if (isset($params['url-type-21']) && $params['url-type-21'] == 1) checked="checked" @endif>
                                            <label for="type5" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">複数社比較</span>
                                            </label>
                                        </div>
                                        <div class="checkbox-inline">
                                            <input id="type6" type="checkbox" class="check-button-input" name="url-type-23" value="1" @if (isset($params['url-type-23']) && $params['url-type-23'] == 1) checked="checked" @endif>
                                            <label for="type6" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">例外</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="type-checkbox-group-label">その他</label>
                                        <div class="checkbox-inline">
                                            <input id="type7" type="checkbox" class="check-button-input" name="url-type-other" value="1" @if (isset($params['url-type-other']) && $params['url-type-other'] == 1) checked="checked" @endif>
                                            <label for="type7" class="checkbox-parts mb-0">
                                                <span class="check-button-label-text">対象外サイト</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                                        <div class="my-2"><a href="{{url()->current()}}">絞り込みを解除</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "target")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/target/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">抽出結果（テキスト）</label>
                                    <input type="text" class="form-control" name="text" placeholder="テキストを入力" value="@if (isset($params['text'])){{$params['text']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-0">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.target.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/target/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "match")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/match/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">特徴点(input > n)</label>
                                    <input type="number" class="form-control" name="inlier_point" placeholder="特徴点を入力" value="@if (isset($params['inlier_point'])){{$params['inlier_point']}}@endif">
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">類似度(input < n)</label>
                                    <input type="number step=0.01" class="form-control" name="analogy" placeholder="類似度を入力" value="@if (isset($params['analogy'])){{$params['analogy']}}@endif">
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">距離比率差異(input < n)</label>
                                    <input type="number step=0.01" class="form-control" name="distance_ratio" placeholder="距離比率差異を入力" value="@if (isset($params['distance_ratio'])){{$params['distance_ratio']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-0">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/match/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "ocr")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/ocr/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">抽出結果（テキスト）</label>
                                    <input type="text" class="form-control" name="text" placeholder="テキストを入力" value="@if (isset($params['text'])){{$params['text']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-0">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.ocr.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/ocr/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "text")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/text/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">ターゲットテキスト</label>
                                    <input type="text" class="form-control" name="t_text" placeholder="テキストを入力" value="@if (isset($params['t_text'])){{$params['t_text']}}@endif">
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">チェック結果</label>
                                    <input type="text" class="form-control" name="text" placeholder="テキストを入力" value="@if (isset($params['text'])){{$params['text']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-0">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.text.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/text/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "banner")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/banner/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">チェック結果</label>
                                    <input type="text" class="form-control" name="text" placeholder="テキストを入力" value="@if (isset($params['text'])){{$params['text']}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-0">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.banner.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/banner/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "ml")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/ml/{{$proc_id}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group pt-2 mb-2">
                            <label>人間補正</label>
                            <div class="row">
                                <div class="col-5">
                            	    <label class="radio">
                            		    <input type="radio" name="artificial" value="1" @if (isset($params['artificial']) && $params['artificial'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">補正済み</div>
                                    </label>
                                    <label class="radio">
                                	    <input type="radio" name="artificial" value="0" @if (isset($params['artificial']) && $params['artificial'] == 0) checked="checked" @endif>
                                        <div class="radio-parts">補正なし</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/ml/{{$proc_id}}">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif ($params['action'] == "ml_all")
    <div id="details-narrowing" class="fixedsticky bg-warning collapse in show">
        <div class="container-fluid bg-warning pt-3 pb-2">
            <form method="GET" id="filter" action="/admin/ml_all" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group pt-2 pl-2 mb-0">
                                    <label class="form-label">使用回数</label>
                                    <input type="number" class="form-control" name="use" placeholder="使用回数を入力" value="@if (isset($params['use'])){{$params['use']}}@endif">
                                    <span>（再学習に使用した回数が、入力した使用回数以下のデータを表示）</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group pt-2 mb-2">
                            <label>人間補正</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio">
                                            <input type="radio" name="artificial" value="1" @if (isset($params['artificial']) && $params['artificial'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">補正済み</div>
                                    </label>
                                    <label class="radio">
                                            <input type="radio" name="artificial" value="0" @if (isset($params['artificial']) && $params['artificial'] == 0) checked="checked" @endif>
                                        <div class="radio-parts">補正なし</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group pt-2 mb-2">
                            <label>実行結果</label>
                            <div class="row">
                                <div class="col-5">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="1" @if (isset($params['type']) && $params['type'] == 1) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.unexecute')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="2" @if (isset($params['type']) && $params['type'] == 2) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.http_status_error')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="3" @if (isset($params['type']) && $params['type'] == 3) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.no_content_data')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="4" @if (isset($params['type']) && $params['type'] == 4) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.system_error')}}</div>
                                    </label>
                                </div>
                                <div class="col-7">
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="5" @if (isset($params['type']) && $params['type'] == 5) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.confirmation')}}</div>
                                    </label>
                                    <label class="radio mb-2">
                                        <input type="radio" name="type" value="6" @if (isset($params['type']) && $params['type'] == 6) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ok')}}</div>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="type" value="7" @if (isset($params['type']) && $params['type'] == 7) checked="checked" @endif>
                                        <div class="radio-parts">{{config('const.execute.text.match.ng')}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div><button type="submit" class="btn px-5 mt-3">この条件で絞り込み</button></div>
                        <div class="my-2"><a href="/admin/ml_all">絞り込みを解除</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @endif
    <!-- /#detail-narrowing -->

    @yield('content')

</body>
</html>
