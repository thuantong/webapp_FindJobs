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

    $("#so_luong_tuyen").TouchSpin({

        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $('#nganh_nghe').select2({
        placeholder: ' Chọn Ngành nghề',
        allowClear: false
    });

    lichNgay($('#han_tuyen_dung'));

    $('button.save').on('click',function () {
        let __this = $(this);
        let error = 0;
        error += notNullMessage($('.not-null'));
        let muc_luong_array = [];
        muc_luong_array.push($('#muc_luong_from').val(),$('#muc_luong_to').val());
        let do_tuoi_array = [];
        do_tuoi_array.push($('#do_tuoi_from').val(),$('#do_tuoi_to').val());

        if (error == 0){
            let data = {
                tieu_de_bai_dang : $('#tieu_de_bai_dang').val(),
                chuc_vu_tuyen : $('#chuc_vu_tuyen').find('option:checked').val(),
                ten_chuc_vu : $('#ten_chuc_vu').val(),
                han_tuyen_dung : $('#han_tuyen_dung').val(),
                so_luong_tuyen : $('#so_luong_tuyen').val(),
                so_kinh_nghiem : $('#so_kinh_nghiem').find('option:checked').val(),
                muc_luong : muc_luong_array,
                bang_cap : $('#bang_cap').find('option:checked').val(),
                gioi_tinh : $('#gioi_tinh').find('option:checked').val(),
                dia_diem_lam_viec : $('#dia_diem_lam_viec').find('option:checked').val(),
                hinh_thuc : $('#hinh_thuc').find('option:checked').val(),
                mo_ta_cong_viec : $('#mo_ta_cong_viec').val(),
                yeu_cau_cong_viec : $('#yeu_cau_cong_viec').val(),
                quyen_loi_cong_viec : $('#quyen_loi_cong_viec').val(),
                dia_chi_cong_viec : $('#dia_chi_cong_viec').val(),
                do_tuoi:do_tuoi_array,
                cong_ty_tuyen_dung:$('#cong_ty_tuyen_dung').find('option:checked').val(),
            }

            sendAjaxNoFunc('post','/dang-bai-viet/luu-tin',data,__this.attr('id')).done(e=>{
                // console.log(e)
                getHtmlResponse(e);
                if (e.status == 200){
                    window.location.href = '';
                }
            })
        }

    });
    // $('#review-modal')//modal
    $('.review').on('click',function () {
        let tieu_de = $('#tieu_de_bai_dang').val();
        $('#review-modal').modal('show');
    });
});
