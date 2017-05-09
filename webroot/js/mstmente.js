$(function(){
	/*
     * 一時保存ボタン
     */
    $('button.save_button').click(function(){
        $(this).parents('form').attr('action', '/mstmenteentry/add');
    });

});