$(document).on('click','.chinh_sua',function () {
    let __this = $(this);
    let idBTD =  __this.data('id');
    let ajax = {
        method: 'get',
        url: '/bai-viet/chinh-sua',
        data: {
            id : idBTD
        },
    }
    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
        console.log(e)
        $('#chinh-sua-bai-tuyen-dung-modal').modal('show');
        $('#chinh-sua-bai-tuyen-dung-modal').find('.modal-body').html(e);
        eventModalChinhSua();
    })
});
const eventModalChinhSua = ()=>{
    // $('#doi_anh_dai_dien').data('type','them-moi-cong-ty')
    let parentNode = $('#chinh-sua-bai-tuyen-dung-modal');
    select2Single($('select#nganh_nghe_update'),parentNode);
    select2Single($('select#chuc_vu_tuyen_update'),parentNode);
    select2Single($('select#so_kinh_nghiem_update'),parentNode);
    select2Single($('select#bang_cap_update'),parentNode);
    select2Single($('select#gioi_tinh_update'),parentNode);
    select2Single($('select#dia_diem_lam_viec_update'),parentNode);
    select2Single($('select#hinh_thuc_update'),parentNode);
    // select2MultipleDefault($('select#linh_vuc_hoat_dong_update'),'Chọn Ngành nghề');
    // $('select#from_day,select#to_day,select#quy_mo_nhan_su').select2({
    //     dropdownParent: $('div#cap-nhat-cong-ty ')
    // });
    // $('select#linh_vuc_hoat_dong').select2({
    //     placeholder: ' Chọn Ngành nghề',
    //     allowClear: false
    // });

    $("#muc_luong_from_update").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    $("#muc_luong_to_update").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    // lichNam($('#nam_thanh_lap_update'));

    // $('#from_time_update,#to_time_update').datetimepicker({
    //     format: 'HH:mm',
    //     widgetPositioning: {
    //         vertical: 'bottom',
    //         horizontal: 'right'
    //     },
    //     icons: {
    //         time: "icofont icofont-clock-time",
    //         date: "icofont icofont-ui-calendar",
    //         up: "icofont icofont-rounded-up",
    //         down: "icofont icofont-rounded-down",
    //         next: "icofont icofont-rounded-right",
    //         previous: "icofont icofont-rounded-left"
    //     },
    // });
}
