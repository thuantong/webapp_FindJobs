$(function () {
    $('select.form-control').select2();
    $("#muc_luong_from").TouchSpin({
        prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("#muc_luong_to").TouchSpin({
        prefix: 'Đến',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });

    $('button.save').on('click',function () {
        let error = 0;
        error += notNullMessage($('.form-control'));

    });
    // $('#review-modal')//modal
    $('.review').on('click',function () {
        let tieu_de = $('#tieu_de_bai_dang').val();
        $('#review-modal').modal('show');
    });
});
