$(function(){

});

function setPolicy(id) {
    $.ajax({
        url:'/mstUserPolicy/getPolicy',
        type: 'POST',
        data: {'id':id},
        dataType: 'json',
        success: function (response) {
            $('#title').val(response['title']);
            $('#text').val(response['text']);
            $('#id').val(response['id']);
        },
        error: function () {
            console.log('***ERROR***');
        }
    });
}