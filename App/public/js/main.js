(jQuery(function ($) {
    'use strict';

    // 絞り込み検索
    $('.fixedsticky').fixedsticky();

    /**
     * ファイルを読み込んだときに隣のラベルの文字をファイル名に変更する
     */
    $(document).on('change', '.file-import input[type="file"]', function () {
        var $button = $(this).parents('label.file-import');
        var $label = $button.next('.file-name');
        // ファイルが選択されていればファイル名、されていなければデフォルト表示
        if (this.files[0] != null) {
            $label.text(this.files[0].name);
        } else {
            $label.text('選択されていません');
        }
    });

    /**
     * HoverBallon
     * マウスオーバーでアイコンのPOPUPを行う
     */
    $('.icon-popup').balloon({
        css: {
            fontSize: ".75rem",
            minWidth: "4rem",
            padding: "0",
            border: "1px solid rgba(212, 212, 212, .4)",
            borderRadius: "3px",
            boxShadow: "1px 1px 2px #ddd",
            color: "#b3b3b3",
            backgroundColor: "#fff",
            opacity: "1",
            zIndex: "1034",
            textAlign: "center"
        },
        offsetY: -10
    });

    /**
     * HoverBallon
     * メール送信日時のポップアップの作成
     */
    // ポップアップのオプションを複数使うため定義しておく
    var baloon_option = {
        html: true,
        classname: 'click-popup',
        contents: null, // showBalloon前に上書きしておく
        position: "top",
        tipSize: 20,
        showAnimation: function (d, c) { this.fadeIn(d, c); },
        hideAnimation: function (d, c) { this.fadeOut(d, c); },
        css: {
            width: "18rem",
            padding: "0",
            borderRadius: "10px",
            border: "solid 2px #29abe2",
            backgroundColor: "#fff",
            opacity: "1",
            zIndex: "1035"
        }
    };
    $(function () {
        // 中身の準備
        var mail_popup = ''
            + '<span class="close"><i class="den icon-cross"></i></span>'
            + '<form method="POST" id="dateform" action="/admin/site/send_date">'
            + '<input type="hidden" name="_token" value="' + $('meta[name = "csrf-token"]').attr('content') + '">'
            + '<div class="popup-caption">メール送信日時を<br>設定してください</div>'
            + '<input type="hidden" name="site_id" id="senddate_site_id" value="">'
            + '<div class="form-group"><input type="datetime-local" name="send_date" class="form-control datetime-local"></div>'
            + '<a href="#" class="popup-datetime-delete date-delete"><i class="den icon-delete"></i>日時を削除</a>'
            + '<div class="btn-wrap"><button type="submit" class="btn btn-primary py-1 px-5">登録</button></div>'
            + '<a href="#" class="popup-cansel">キャンセル</a>'
            + '</form>';
        var popup_number = 0;
        $('.mailsend-regist').on('click', function () {
            // データをdata-shownが存在したらその値を使う、存在しなければpopup_numberをインクリメントして使う（ユニークな値として）
            var shown = $(this).attr('data-shown');
            if (!shown) {
                shown = popup_number++;
            }
            // shownをラッパーとクリックしたリンク両方にセットし、ラッパーにポップアップ中身もセットしてラッパーでバルーンを呼び出す
            baloon_option.contents = $('<div class="popup-wrap">').attr('data-shown', shown).html(mail_popup);
            $(this).attr('data-shown', shown);
            $(this).showBalloon(baloon_option);
            return false;
        });
        // ラッパーの値とリンクの値を調べ、一致しているリンクのバルーンを閉じる
        $(document).on('click', '.click-popup .close, .click-popup .popup-cansel', function () {
            var shown = $(this).parents('.popup-wrap').attr('data-shown');
            $('.mailsend-regist[data-shown="' + shown + '"]').hideBalloon();
            return false;
        });
    });

    /**
     * HoverBallon
     * マッチング機械学習手動補正のポップアップの作成
     */
    $(function(){
/**
        var rework_popup = ''
            + '<span class="close"><i class="den icon-cross"></i></span>'
            + '<form method="GET" action="/admin/ml_update/artificial">'
            + '<input type="hidden" name="_token" value="' + $('meta[name = "csrf-token"]').attr('content') + '">'
            +   '<div class="popup-caption mb-4">判定を補正</div>'
            +   '<div class="row radio-group color-dark">'
            +   '<input type="hidden" name="id" id="artificial_ml_id" value="">'
            +     '<div class="col-6 pr-0 mb-3 text-center">'
            +       '<div class="mb-2"><i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">違反
なし</span></div>'
            +       '<label class="radio-inline">'
            +         '<input type="checkbox" class="check-button-input radio-checkbox" name="artificial" value="6">'
            +         '<div class="checkbox-parts">&nbsp;</div>'
            +       '</label>'
            +     '</div>'
            +     '<div class="col-6 mb-3 text-center">'
            +       '<div class="mb-2"><i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反あり</span></div>'
            +       '<label class="radio-inline">'
            +         '<input type="checkbox" class=check-button-input radio-checkbox" name="artificial" value="7">'
            +         '<div class="checkbox-parts">&nbsp;</div>'
            +       '</label>'
            +     '</div>'
            +   '</div>'
            +   '<div class="btn-wrap"><button type="submit" class="btn btn-primary py-1 px-5">登録</button></div>'
            +   '<a href="#" class="popup-cansel color-primary">キャンセル</a>'
            + '</form>';*/
        var rework_popup = ''
            + '<span class="close"><i class="den icon-cross"></i></span>'
            + '<form  method="GET" action="/admin/ml_update/artificial">'
            + '<input type="hidden" name="_token" value="' + $('meta[name = "csrf-token"]').attr('content') + '">'
            +   '<div class="popup-caption mb-4">判定を補正</div>'
            +   '<div class="row radio-group color-dark">'
            +   '<input type="hidden" name="id" id="artificial_ml_id" value="">'
            +     '<div class="col-6 pr-0 mb-3 text-center">'
            +       '<div class="mb-2"><i class="den icon-mini-circle icon-primary"></i> <span class="check-button-label-text">違反なし</span></div>'
            +       '<label class="radio-inline check-button-label">'
            +         '<input type="checkbox" name="artificial" class="check-button-input radio-checkbox" value="6" style="display:none">'
            +         '<div class="checkbox-parts">&nbsp;</div>'
            +       '</label>'
            +     '</div>'
            +     '<div class="col-6 mb-3 text-center">'
            +       '<div class="mb-2"><i class="den icon-cross icon-danger"></i> <span class="check-button-label-text">違反あり</span></div>'
            +       '<label class="radio-inline check-button-label">'
            +         '<input type="checkbox" name="artificial" class="check-button-input radio-checkbox" value="7" style="display:none">'
            +         '<div class="checkbox-parts">&nbsp;</div>'
            +       '</label>'
            +     '</div>'
            +   '</div>'
            +   '<div class="btn-wrap"><button type="submit" class="btn btn-primary py-1 px-5">登録</button></div>'
            +   '<a href="#" class="popup-cansel color-primary">キャンセル</a>'
            + '</form>';
        var popup_number = 0;
        $('.rework').on('click', function(){
            // データをdata-shownが存在したらその値を使う、存在しなければpopup_numberをインクリメントして使う（ユニークな値として）
            var shown = $(this).attr('data-shown');
            if(!shown){
                shown = popup_number++;
            }
            // shownをラッパーとクリックしたリンク両方にセットし、ラッパーにポップアップ中身もセットしてラッパーでバルーンを呼び出>す
            baloon_option.contents = $('<div class="popup-wrap">').attr('data-shown', shown).html(rework_popup);
            $(this).attr('data-shown', shown);
            $(this).showBalloon(baloon_option);
            return false;
        });
        // ラッパーの値とリンクの値を調べ、一致しているリンクのバルーンを閉じる
        $(document).on('click', '.click-popup .close, .click-popup .popup-cansel', function(){
            var shown = $(this).parents('.popup-wrap').attr('data-shown');
            $('.rework[data-shown="'+shown+'"]').hideBalloon();
            return false;
        });
    });

    /**
     * Clip Board js
     */
    var $clipboard = new ClipboardJS('.form-control-plaintext.highlight button', {
        target: function (trigger) {
            return trigger.previousElementSibling;
        }
    });
    function setClipborad(e, message) {
        $(e.trigger).tooltip('hide')
            .attr('data-original-title', message)
            .attr('data-trigger', 'manual')
            .tooltip('show');
        setTimeout(function () {
            $('#' + $(e.trigger).attr('aria-describedby')).tooltip('hide');
        }, 1000);

    }
    $clipboard.on('success', function (e) {
        setClipborad(e, 'Copied!');
    });
    $clipboard.on('error', function (e) {
        setClipborad(e, 'Failed!');
    });
    $(document).on('click', '.form-control-plaintext span', function () {
        $(this).parents('.form-control-plaintext').find('button').trigger('click');
        return false;
    });

    // ページを読み込んだ後、スクロールしたときにテーブル追従処理を実行する
    var scrollFixedFunction = function () {
        var extraOffset = 0;
        if ($('.card-user-info').length)
            extraOffset = fixUserInfo();
        if ($('.fixed-header').length)
            fixTableHeader(extraOffset);
    }
    $(window).on('scroll load', scrollFixedFunction)
    $(document).on('click', '.show-user-info', function () {
        var optionObj = new Object();
        optionObj.step = function () {
            var extraOffset = $('#clone-user-info-wrap').outerHeight();
            var topOffset = $('#header-nav').outerHeight();
            $('#clone-table').css('top', topOffset + extraOffset);
        }
        optionObj.complete = optionObj.step;
        $('#clone-user-info-wrap .card-body').slideToggle(optionObj);
        return false;
    });
    // 絞り込みアニメーション時にスクロールイベントを発火する
    $('#details-narrowing').on('show.bs.collapse hide.bs.collapse', function () {
        var optionObj = new Object();
        optionObj.step = scrollFixedFunction;
        optionObj.duration = 350;
        $('#toggleDetailsNarrowing').toggleClass('collapsed');
        $(this).stop().slideToggle(optionObj);
        return false;
    });
    /**
     * テーブルのヘッダーを追従する処理
     */
    function fixTableHeader(extraOffset) {
        // テーブル情報を取得
        var tableElement = $('.fixed-header')
        var topOffset = $('#header-nav').outerHeight();
        topOffset += $('#details-narrowing').is(':visible') ? $('#details-narrowing').outerHeight() : 0;
        var tableTop = tableElement.find('thead tr td, thead tr th').offset().top - $(window).scrollTop() - topOffset - extraOffset;

        if (tableTop < 0) {
            if ($('#clone-table').length == 0) {
                // IDを付与してテーブルをコピーする
                var cloneTable = tableElement.clone()
                var originalHeader = tableElement.children('thead').first()

                // 初期設定をしてテーブルを追加する
                cloneTable.attr('id', 'clone-table')
                    .css('position', 'fixed')
                    .css('top', topOffset + extraOffset)
                    .css('z-index', 10)
                    .css('pointer-events', 'none') // マウスイベントを除外することでオリジナルにクリックイベントが届くようにする
                    .css('border-collapse', 'collapse')
                    .css('width', originalHeader.css('width'))
                    .css('min-width', originalHeader.css('width'));
                cloneTable.children('tbody').css('opacity', '0').css('visibility', 'hidden'); // 存在はするが非表示にすることでテーブルヘッダーを崩れないようにする
                cloneTable.children('thead').css('background', '#f2f2f2').css('pointer-events', 'auto').css('border-left', '1px solid #f2f2f2');
                tableElement.after(cloneTable)

                // 横スクロール時の位置調整
                var leftDiff = originalHeader.offset().left - cloneTable.offset().left
                var marginLeft = parseInt(cloneTable.css('margin-left'))
                $('#clone-table').css('margin-left', (marginLeft + leftDiff) + 'px')
            } else {
                // 複製済みのテーブルを取得する
                var cloneTable = $('#clone-table')
                var originalHeader = tableElement.children('thead').first()

                // 横スクロール時の位置調整
                var leftDiff = originalHeader.offset().left - cloneTable.offset().left
                var marginLeft = parseInt(cloneTable.css('margin-left'))

                // 縦スクロール、横スクロール時の位置をスクロールされるたびに入れる
                cloneTable.css('top', topOffset + extraOffset)
                    .css('width', originalHeader.css('width'))
                    .css('margin-left', (marginLeft + leftDiff) + 'px')

                // テーブルよりもスクロールが超える場合、テーブルの下以上ついてこないようにする
                var cloneOffset = cloneTable.offset().top + cloneTable.children('thead').outerHeight();
                var tableBottom = tableElement.offset().top + tableElement.outerHeight();
                if (cloneOffset > tableBottom) {
                    cloneTable.css('top', topOffset + extraOffset - cloneOffset + tableBottom);
                }
            }
        } else {
            if ($('#clone-table').length > 0) {
                $('#clone-table').remove()
            }
        }
    }
    /* ユーザー情報の追従処理 */
    function fixUserInfo() {
        var extraOffset = 0;
        // テーブル情報を取得
        var cardElement = $('.card-user-info');
        var topOffset = $('#header-nav').outerHeight();
        var cardTop = cardElement.offset().top - $(window).scrollTop() - topOffset - parseInt(cardElement.css('margin-top'));
        topOffset += $('#details-narrowing').is(':visible') ? $('#details-narrowing').outerHeight() : 0;

        if (cardTop < 0) {
            if ($('#clone-user-info').length == 0) {
                // IDを付与してテーブルをコピーする
                var cloneCard = cardElement.clone()
                var originalHeader = cardElement.children('.card-header').first()

                // 初期設定をしてテーブルを追加する

                cloneCard.attr('id', 'clone-user-info');
                cardElement.after(cloneCard);
                $('#clone-user-info').removeClass('my-3')
                    .css('box-shadow', 'none')
                    .wrap('<div id="clone-user-info-wrap" class="pt-3"></div>');
                var cloneCardWrap = $('#clone-user-info-wrap');
                $('#clone-user-info-wrap').css('background-color', '#f2f2f2')
                    .css('position', 'fixed')
                    .css('top', topOffset)
                    .css('z-index', 15)
                    .css('width', cardElement.css('width'))
                    .css('min-width', cardElement.css('width'));
                cloneCard.children('.card-body').hide(); // 存在はするが非表示にすることでテーブルヘッダーを崩れないようにする


                // 横スクロール時の位置調整
                var leftDiff = cardElement.offset().left - cloneCardWrap.offset().left
                var a = cardElement.offset().left;
                var b = cloneCardWrap.offset().left;
                var marginLeft = parseInt(cloneCardWrap.css('margin-left'))
                cloneCardWrap.css('margin-left', (marginLeft + leftDiff) + 'px')
            } else {
                // 複製済みのテーブルを取得する
                var cloneCard = $('#clone-user-info')
                var cloneCardWrap = $('#clone-user-info-wrap')
                var originalHeader = cardElement.children('.card-header').first()

                // 横スクロール時の位置調整
                var leftDiff = cardElement.offset().left - cloneCardWrap.offset().left
                var marginLeft = parseInt(cloneCardWrap.css('margin-left'))

                // 縦スクロール、横スクロール時の位置をスクロールされるたびに入れる
                cloneCardWrap.css('top', topOffset)
                    .css('width', originalHeader.css('width'))
                    .css('margin-left', (marginLeft + leftDiff) + 'px')

                // カード情報よりもスクロールが超える場合下にパディングを追加する
                var cloneOffset = cloneCard.offset().top;
                var cardBottom = cardElement.offset().top + cardElement.outerHeight();
                if (cloneOffset > cardBottom) {
                    cloneCardWrap.addClass('pb-3');
                    $('.show-user-info').show();
                } else {
                    cloneCardWrap.removeClass('pb-3');
                    $('.show-user-info').hide();
                    $('#clone-user-info-wrap .card-body').hide();
                }
            }
            extraOffset = $('#clone-user-info-wrap').outerHeight();
        } else {
            if ($('#clone-user-info-wrap').length > 0) {
                $('#clone-user-info-wrap').remove()
            }
        }
        return extraOffset;
    }

    // テキストエリアの自動高さ調整
    $(document).on('input', 'textarea.autosize', function (event) {
        var insideHeight = event.target.scrollHeight;
        var outsideHeight = event.target.offsetHeight;
        if (insideHeight > outsideHeight) {
            $(event.target).height(insideHeight);
        } else {
            var lineHeight = Number($(event.target).css("lineHeight").split("px")[0]);
            $(event.target).height($(event.target).height() - lineHeight);
            insideHeight = event.target.scrollHeight;
            outsideHeight = event.target.offsetHeight;
            if (insideHeight > outsideHeight) {
                $(event.target).height(insideHeight);
            }
        }
    });

    // コメントモーダルの編集の表示非表示
    $(document).on('focus', '#commentModal .form-group textarea', function (event) {
        var $message = $(this).parents('.form-group');
        $message.find('.message-foot').show();
        $message.find('.message-foot textarea').text($message.find('.message-body').text()).trigger('input');
    });
    $(document).on('click', '#commentModal .message-head .message-edit', function (event) {
        var $message = $(this).parents('.form-group');
        $('#commentModal .message-foot .message-cansel').trigger('click');
        $message.find('.message-head, .message-body').hide();
        $message.find('.message-foot').show();
        $message.find('.message-foot textarea').text($message.find('.message-body').text()).trigger('input');
    });
    $(document).on('click', '#commentModal .message-foot .message-cansel', function (event) {
        var $message = $(this).parents('.form-group');
        $message.find('.message-foot').hide();
        $message.find('.message-head, .message-body').show();
    });

    // 詳細画面上のサイトコメントモーダルの編集の表示非表示
    $(document).on('focus', '#SitecommentModal .form-group textarea', function (event) {
        var $message = $(this).parents('.form-group');
        $message.find('.message-foot').show();
        $message.find('.message-foot textarea').text($message.find('.message-body').text()).trigger('input');
    });
    $(document).on('click', '#SitecommentModal .message-head .message-edit', function (event) {
        var $message = $(this).parents('.form-group');
        $('#SitecommentModal .message-foot .message-cansel').trigger('click');
        $message.find('.message-head, .message-body').hide();
        $message.find('.message-foot').show();
        $message.find('.message-foot textarea').text($message.find('.message-body').text()).trigger('input');
    });
    $(document).on('click', '#SitecommentModal .message-foot .message-cansel', function (event) {
        var $message = $(this).parents('.form-group');
        $message.find('.message-foot').hide();
        $message.find('.message-head, .message-body').show();
    });

    // 確認モーダル閉じた際に入力モーダルがスクロール不可になる問題を解決
    $('#confirmModal').on('hidden.bs.modal', function (e) {
        $('body').addClass('modal-open');
    });
    // 確認モーダルを多重で開くときにおかしくなる問題の解決
    $('#confirmModal').on('show.bs.modal', function (e) {
        var that = this;
        var $fModal = $(e.relatedTarget).parents('.modal');
        var $body = $('body');
        window.setTimeout(function () { // オーバーレイ要素が</body>直前に追加されるのを待つ
            // モーダル要素CSS:z-index初期値を設定
            var defOvlyZindex = 1040;

            // イベント編集に関わるモーダル要素を取得
            var overlay = $('.modal-backdrop');       // オーバーレイ要素は増減する

            if (overlay.length >= 2) { // 多層表示時に限り各モーダル要素のCSS:z-index値を調整
                for (var i = 0; i < overlay.length; i++) {
                    var addValue = i == 0 ? 0 : 10 * (1 + i);

                    // 要素の増減有無に応じたz-indexの設定をする必要がある
                    if (i < overlay.length) { overlay.eq(i).css('z-index', defOvlyZindex + addValue); }
                }
            }
            $(that).css('z-index', '1070');
        }, 200); // モーダル要素が表示（classに in が追加される）されるのをこのミリ秒まで待つ必要がある
    });

    // 人間補正登録のラジオチェックボックス
    $(document).on('change click', '.radio-checkbox', function () {
        if ($(this).prop('checked')) {
            var name = $(this).attr('name');
            $('.radio-checkbox[name="' + name + '"').prop('checked', false);
            $(this).prop('checked', true);
        }
    });

    $(".page-limit").on('click', function() {
        let type = $(this).attr("type");
        let value = $(this).text();
        var new_param = "?";

        var params = {};
        var param = location.search.substring(1).split('&');
        for(var i = 0; i < param.length; i++) {
            var keySearch = param[i].search(/=/);
            var key = '';
            if(keySearch != -1) key = param[i].slice(0, keySearch);
            var val = param[i].slice(param[i].indexOf('=', 0) + 1);
            if(key != '') params[key] = decodeURI(val);
        }

        console.log(params)
        if (params != "{}") {
            for (key in params) {
                if (key != "limit") {
                    new_param = new_param + key + "=" + params[key] + "&";
                }
            }
        }
        new_param = new_param + type + "=" + value;

        let url = location.protocol + "//" + location.host + location.pathname + new_param;
        location.href = url;
    });

}(jQuery)));
