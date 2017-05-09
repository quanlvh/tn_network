$(function(){
    /*
     * 日付入力欄にdatepicker使用
     */
    $('input.datepicker').datepicker();

    /*
    * 対応可能ボタン、対応不可ボタンで押されたボタンによって遷移先を変える
    */
    $('#possible_button').click(function(){
      $(this).parents('form').attr('action', '/requestDetail/confirm');
    });
    $('#impossible_button').click(function(){
      $(this).parents('form').attr('action', '/requestDetail/answer/0');
    });

    $('#complete_button').click(function(){
      $(this).parents('form').attr('action', '/requestDetail/answer/1');
    });

    $('#return_button').click(function(){
        $(this).parents('form').attr('action', document.referrer);
    });

    $('#return_button2').click(function(){
        $(this).parents('form').attr('action', '/contractRequestList/index/1');
    });

    $('#mypage_button').click(function(){
        $(this).parents('form').attr('action', '/mypage');
    });

    /*
    * 詳細情報の折り畳み
    */
    $('#toggle_button01').click(function(){
      $('#slide_toggle01').slideToggle();
    });

    /*
     * 追加配送の料金取得
     */
    $("#price_list").change(function(){
        $.ajax({
            url:'/requestDetail/getPrice',
            type: 'POST',
            data: {'unit_price_detail_name':$('#price_list').val()},
            dataType: 'json',
            success: function (response) {
                $("#price").val(response['unit_price']);
            },
            error: function () {
                console.log('***ERROR***');
            }
        });
    });

    /*
     * 追加配送種別の料金取得
     */
    $("#add_delivery_type").change(function(){
        var oxygen,delivery;
        if($("#add_delivery_type").val() === '1') {
            //ボンベの追加配送
            oxygen = '追加配送料金（ボンベ酸素代）';
            delivery = '追加配送料金（ボンベ配送代）';
        }
        else if($("#add_delivery_type").val() === '2'){
            //液酸の追加配送
            oxygen = '追加配送料金（液体酸素酸素代）';
            delivery = '追加配送料金（液体酸素配送代）';
            $('#bomb_num').val(1);
        }

        $.ajax({
            url:'/requestDetail/getPrice',
            type: 'POST',
            data: {'unit_price_detail_name':oxygen},
            dataType: 'json',
            success: function (response) {
                $("#price_oxygen").val(response['unit_price']);
            },
            error: function () {
                console.log('***ERROR***');
            }
        });

        $.ajax({
            url:'/requestDetail/getPrice',
            type: 'POST',
            data: {'unit_price_detail_name':delivery},
            dataType: 'json',
            success: function (response) {
                $("#price_delivery").val(response['unit_price']);
            },
            error: function () {
                console.log('***ERROR***');
            }
        });
    });
});

function currentStep(number) {
    $('li.step').each(function(index, elm){
        if(index === number-1) {
            $(elm).addClass('current');
        }
        if(index > number-1) {
            $(elm).addClass('after');
        }
    });
}