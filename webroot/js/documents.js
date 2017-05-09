$(function () {
    $('#select_type').change(function () {
        window.location.href = '/documents/index/'+$('#select_type').val();
    });
});