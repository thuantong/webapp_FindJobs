$(function () {
    $('#form-body select.form-control').select2();

    $('#form-body #cong_ty_tuyen_dung').select2({
        templateResult: function (data) {
            var span = data.text;
            if ($(data.element).data('img') != null){
                span = $("<span><img src='"+$(data.element).data('img')+"' style='width: 50px;height: 50px'/> " + data.text + "</span>");
            }
            return span;
            }
    });

    $("#form-body #muc_luong_from").TouchSpin({
        prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    $("#form-body #muc_luong_to").TouchSpin({
        prefix: 'Đến',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });

    $("#form-body #so_luong_tuyen,#form-body #so_ngay_ton_tai").TouchSpin({
        min: 1,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    $('#form-body #nganh_nghe').select2({
        placeholder: ' Chọn Ngành nghề',
        allowClear: false
    });

    lichNgay($('#form-body #han_tuyen_dung'));

    $('#form-body button.save').on('click',function () {
        // alert();
        let __parent = $('#form-body');
        let __this = $(this);
        let error = 0;
        // error += notNullMessage(__parent.find('.not-null'));
        let muc_luong_array = [];
        muc_luong_array.push(__parent.find('#muc_luong_from').val(),__parent.find('#muc_luong_to').val());
        let do_tuoi_array = [];
        do_tuoi_array.push(__parent.find('#do_tuoi_from').val(),__parent.find('#do_tuoi_to').val());

        // console.log('eroer',error)
        if (error == 0){
            let data = {
                tieu_de_bai_dang : __parent.find('#tieu_de_bai_dang').val(),
                chuc_vu_tuyen : __parent.find('#chuc_vu_tuyen').find('option:checked').val(),
                ten_chuc_vu : __parent.find('#ten_chuc_vu').val(),
                han_tuyen_dung : __parent.find('#han_tuyen_dung').val(),
                so_luong_tuyen : __parent.find('#so_luong_tuyen').val(),
                so_kinh_nghiem : __parent.find('#so_kinh_nghiem').find('option:checked').val(),
                muc_luong : muc_luong_array,
                bang_cap : __parent.find('#bang_cap').find('option:checked').val(),
                gioi_tinh : __parent.find('#gioi_tinh').find('option:checked').val(),
                dia_diem_lam_viec : __parent.find('#dia_diem_lam_viec').find('option:checked').val(),
                hinh_thuc : __parent.find('#hinh_thuc').find('option:checked').val(),
                mo_ta_cong_viec : __parent.find('#mo_ta_cong_viec').val(),
                yeu_cau_cong_viec : __parent.find('#yeu_cau_cong_viec').val(),
                quyen_loi_cong_viec : __parent.find('#quyen_loi_cong_viec').val(),
                dia_chi_cong_viec : __parent.find('#dia_chi_cong_viec').val(),
                do_tuoi:do_tuoi_array,
                cong_ty_tuyen_dung:__parent.find('#cong_ty_tuyen_dung').find('option:checked').val(),
                so_ngay_ton_tai:__parent.find('#so_ngay_ton_tai').val(),
                nganh_nghe:__parent.find('#nganh_nghe').val(),
            }

            sendAjaxNoFunc('post','/dang-bai-viet/luu-tin',data,__this.attr('id')).done(e=>{
                // console.log(e)
                getHtmlResponse(e);
                if (e.status == 405){
                    alertConfirm(e).then(result=>{
                        // console.log('reeeee',result)
                        if (result.value == true){
                            window.open('/so-du-tai-khoan','_blank');
                        }
                    })
                }
                if (e.status == 200){
                    window.location.href = '';
                }
            })
        }

    });
    // $('#review-modal')//modal
    $('#form-body .review').on('click',function () {
        let tieu_de = $('#tieu_de_bai_dang').val();
        $('#review-modal').modal('show');
    });

    $(document).on('click','#form-body button#call-them-moi-cong-ty',function () {
        $('div.modal#them-moi-cong-ty').modal('show');
        $('div.modal#them-moi-cong-ty').data('type','cong_ty_tuyen_dung');
        // alert()
    });

    // $(document).on('shown.bs.modal','#form-body div.modal#them-moi-cong-ty',function () {
    //     $(this).data('type','cong_ty_tuyen_dung');
    // })
});
