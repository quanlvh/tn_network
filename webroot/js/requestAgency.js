$(function () {
    $('#company_list').select2();
    $('#branch_list').select2();

    if($('#company_list').val()) {
        setBranchOffices();
    }

    $('#company_list').change(function () {
        setBranchOffices();
    });
});

function setBranchOffices() {
    $.ajax({
        url:'/requests/getBranchOffices',
        type: 'POST',
        data: {'companyCode':$('#company_list').val()},
        dataType: 'json',
        success: function (response) {
            //取得した市区町村一覧をdatalistに挿入
            $('#branch_list').html('');
            jQuery.each(response, function(idx, val) {
                $('#branch_list').append('<option value="'+val['branch_code']+'">'+val['branch_name']+'</option>');
            });
            $('#search_area').select2();
        },
        error: function () {
            console.log('***ERROR***');
        }
    });
}