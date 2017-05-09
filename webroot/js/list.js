$(document).ready(function(){
    /*
     * required付きのinputに赤字の必須を付ける
     */
    $('div.sub_content input[type="text"][required],input[type="tel"][required]').each((function(idx, elm){
        $(elm).parent('td').attr('style', 'padding-left: 0;');
        var html = $(elm).parent().html();
        $(elm).parent().html('<span style="color:red;">*必須</span>' + html);
    }));

    /*
     * 日付入力欄にdatepicker使用
     */
    $('input.datepicker').datepicker();

    // 行を追加する
    $(document).on("click", ".addList", function () {
      $("#addTBody > tr").eq(0).clone(true).insertAfter($("#addTBody > tr").eq(-1));
    });

    // 行を削除する
    $(document).on("click", ".removeList", function () {
      $(this).parent().parent().remove();
    });

    // 行の一部を変更する
    $(document).on("change", ".changeList", function () {
    	if($(this).find('option:selected').val() == 99){
    		$(this).parent().next().html("<input></input>");
    	}else{
    	    $(this).parent().next().html($(this).find('option:selected').text());
    	}
    });

    // フォーカスアウト(金額表示)
    $('.unit_price').on('blur', function(){
      var num = $(this).val();
      num = num.replace(/(\d)(?=(\d\d\d)+$)/g, '$1,');
      $(this).val(num);
    });
    // フォーカス(金額表示)
    $('.unit_price').on('focus', function(){
      var num = $(this).val();
      num = num.replace(/,/g, '');
      $(this).val(num);
    });
});

$(document).change(function(){
	//明細の金額（税別）を計算して表示
	$(".detail").each(function() {

	    var per = $(this).find('.unit_price').val();        //単価入力値取得
	    var num = $(this).find('.quantity').val();          //数量入力値取得
	    var subtotal  = '';                                  //小計
	    per = per.replace(/,/g, '');
	      num = num.replace(/,/g, '');
	    if(num && per){
	        subtotal = Math.round(per * num);        //小計算出, 整数化
	    }
	    $(this).find('.amount').text(subtotal.toLocaleString());      //小計表示

	    //合計欄再計算

	});

	/*
	 * 請求書発行日、完了日更新
	 */
	$("#issue_of_bill_date").change(function(){
	    $.ajax({
	        url:'/salesDataList/updateIssueOfBillDate',
	        type: 'POST',
	        data: {'issue_of_bill_date':$('.issue_of_bill_date').val()},
	        dataType: 'json',
	        success: function () {
		    	alert($("#issue_of_bill_date").id());
	            //更新成功
	        },
	        error: function () {
		    	alert($("#issue_of_bill_date").id());
	            console.log('***ERROR***');
	        }
	    });
	});
});

$(function(){
    /*
     * 戻るボタン
     */
    $('button.return_button').click(function(){
        clear_required(this);
        $(this).parents('form').attr('action', document.referrer);
    });

});
