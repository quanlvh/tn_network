$(document).ready(function () {
    /*
     * required付きのinputに赤字の必須を付ける
     */
    $('div.sub_content input[type="text"][required],input[type="tel"][required],input[type="radio"][required]').each((function (idx, elm) {

        $(elm).parents('td').attr('style', 'padding-left: 0;');
        var html = $(elm).parents('td').html();
        $(elm).parents('td').html('<span style="color:red;">*必須</span>' + html);
    }));

    /*
     * 日付入力欄にdatepicker使用
     */
    $('input.datepicker').datepicker({minDate: '+1d'});
    
    setAreaList();
    
    $('#search_pref').select2();
});

$(function () {
    /*
     * 戻るボタン
     */
    $('button.return_button').click(function () {
        clear_required(this);
        $(this).parents('form').attr('action', document.referrer);
    });

    /*
     * 依頼中止ボタン
     */
    $('button.stop_button').click(function () {
        clear_required(this);
        window.location.href = '/mypage';
        return false;
    });

    /*
     * 一時保存ボタン
     */
    $('button.save_button').click(function () {
        clear_required(this);
        $(this).parents('form').attr('action', '/requests/temporarilySave');
    });

    /*
     * マイページボタン
     */
    $('button.mypage_button').click(function () {
        $(this).parents('form').attr('action', '/mypage');
    });

    /*
     * 依頼履歴ボタン
     */
    $('button.list_button').click(function () {
        $(this).parents('form').attr('action', '/mypage');
    });

    /*
     * 希望機器のタブ表示
     */
    $('#tab_area_01').tabs();
    $('#tab_area_02').tabs();
    $('#tab_area_03').tabs();
    $('#tab_area_04').tabs();

    /*
     * 希望機器のボンベのスライド表示
     */
    $('input[name="is_bomb"]').change(function () {
        $(this).parents('div.machine_area').find('div#bomb_area_01').slideToggle();
    });

    /*
     * 地域選択画面の地域ボタンが押された際の動作
     */
    $('button.area_submit').click(function () {
        $(this).parents('form').find('input[name="area_code"]').val($(this).val());
    });

    /*
     * 地域選択画面の都道府県ボタンが押された際の動作
     */
    $('button.pref_submit').click(function () {
        $(this).parents('form').find('input[name="pref_code"]').val($(this).val());
    });

    /*
     * 都道府県リストを変更した場合にリロードする
     */
    $("#pref_code_list").change(function () {
        $("#id_area_name").val("");
        $("#id_area_code").val("");
        $("#form_area").submit();
    });
    
    /*
     * 検索画面の都道府県一覧が変更された際に、市区町村一覧のdatalistを取得
     */
    $('#search_pref').change(function(){
        setAreaList();
    });
});

function setAreaList() {
    $.ajax({
            url:'/requests/getAreaList',
            type: 'POST',
            data: {'prefCode':$('#search_pref').val()},
            dataType: 'json',
            success: function (response) {
                //取得した市区町村一覧をdatalistに挿入
                $('#search_area').html('');
                jQuery.each(response, function(idx, val) {
                    $('#search_area').append('<option value="'+val['area_code']+'">'+val['area_name']+'</option>');
                });
                $('#search_area').select2();
            },
            error: function () {
                console.log('***ERROR***');
            }
        });
}

/*
 * フォーム内のrequiredを解除
 */
function clear_required(element) {
    $(element).parents('form').find('input').each(function (idx, elm) {
        $(elm).attr('required', false);
    });
}

/**
 * フォーム内(ボンベ)の表示・非表示
 */
function entryChange1() {
    radio = document.getElementsByName('entryplan')
    if (radio[0].checked) {
        document.getElementById('firstbox').style.display = "";
        document.getElementById('secondbox').style.display = "none";
    } else if (radio[1].checked) {
        document.getElementById('firstbox').style.display = "none";
        document.getElementById('secondbox').style.display = "";
    }
}

/*
 * Enter key 対策
 */
$(function() {
	  $(document).on("keypress", "input:not(.allow_submit)", function(event) {
	    return event.which !== 13;
	  });

});

/*
 : 地域を選択
 */
function clickArea(areaCode) {
    $("#form_area").find('input[name="area_code"]').val(areaCode);
    $("#form_area").submit();
    return false;
}
