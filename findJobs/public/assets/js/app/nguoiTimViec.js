const skill_view = (type) => {
    let method = 'get';
    let url_send = '/user-skill-view-append';
    return $.ajax({
        method: method,
        url: url_send,
        data: {type : type}
    });
};

//index,name,fromDate,toDate,url
const setTRowProject = (index, type) => {
    return $.ajax({
        method: 'get',
        url: '/nguoi-tim-viec/project-view',
        data: {
            index: index,
            type: type,
        },
    });
};



let idsr = [];


$(function () {
    $(window).scrollTop(0);

    $("#muc_luong_from").TouchSpin({
        prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    })
    $("#muc_luong_to").TouchSpin({
        prefix: 'Đến',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    })
    //lịch
    lichThang($('.from-date-project,.from-date-exp'));

    lichThang($('.to-date-project,.to-date-exp')).on('changeDate', function (e) {
        let value = $(e.currentTarget).val();

        let arrayDatesEnd = value.split("/");

        let _this = $(e.currentTarget).attr('class');
        let _this_index = -1;

        $(e.currentTarget).parents('.modal').find('input').each(function () {
            _this_index++;
            if ($(this).attr('class') == _this) {
                return _this_index;
            }
        });
        let valueBegin = $(e.currentTarget).prop("tagName").toLowerCase();
        let arrayDatesBegin = $(e.currentTarget).parents('.modal').find(valueBegin).eq(parseFloat(_this_index) - 1).val().split("/");

        let dateBegin = new Date(arrayDatesBegin[1], arrayDatesBegin[0] - 1);
        let dateEnd = new Date(arrayDatesEnd[1], arrayDatesEnd[0] - 1);

        // console.log(dateBegin < dateEnd)
        if (dateEnd > dateBegin) {
            $(e.currentTarget).val(value)
        } else {
            $.toast({
                heading: 'Chọn sai ngày',
                hideAfter: 3000,
                icon: 'error',
                loaderBg: 'red',
                position: 'top-right',
                stack: 1,
                text: 'Ngày kết thúc phải lớn hơn ngày bắt đầu!',
            });
            $(e.currentTarget).parents('.modal').find(valueBegin).eq(_this_index.val($(e.currentTarget).parents('.modal').find(valueBegin).eq(parseFloat(_this_index) - 1)));
        }
    });
    //end lich
    lichNgay($('#ngay_sinh'));

    //lấy dữ liệu bảng kỹ năng
    skill_view(1).done(res => {
        // console.log('cc',res);
        $('#render-skill.card-box').append(res);
    }).then(function (b) {
        $('.skill_append').ionRangeSlider({
            skin: 'round',
            from: $(this).data('value'),
            from_fixed: false,
        });
    });
    //lấy dữ liệu bảng kinh nghiệm
    getHtmlExpNew(1).done(res => {
        $('#about-me-exp').find('ul').append(res);
    });

    //lấy dữ liệu bảng dự án
    setTRowProject(0, 1).done(res => {
        // console.log('tr',res);
        $('#table-project').find('tbody').append(res);
    });
    $('#gioi_tinh,.hoc_van,.loai_cong_viec').select2();

    //thêm kỹ năng
    $('#add-new-skill').on('click', function () {
        skill_view(0).done(res => {
            $(this).parents('.card-box').append(res);
        }).then(function (b) {
            $('.skill_append:last').ionRangeSlider({
                skin: 'round',
                from: 10,
                from_fixed: false,
                onStart: function (data) {
                    data.input.parent().find('.skill_value').text(data.from);
                },
            });

        });
    });

    //update project
    $('#add-new-project').on('click', function () {
        let indexTrow;
        if ($('#table-project tbody tr').length == 0) {
            indexTrow = 1;
        } else {
            indexTrow = parseInt($('#table-project').find('tbody tr:last').find('td').eq(0).text()) + 1;
        }

        setTRowProject(indexTrow, 0).done(res => {

            $('#table-project').find('tbody').append(res);

            $('#table-project').find('tbody').find('tr:last').find('td:eq(6)').find('button.cap-nhat-project').trigger('click');
        });
    });

});

//đổi điểm tăng chữ ở span
$(document).on('change', '.skill_append', function () {
    $(this).parent().find('.skill_value').text($(this).val());
});

//xóa một dự án
$(document).on('click', '.xoa1-project', function () {
    let update_index = 0;

    $(this).parents('tr').remove();
    $('#table-project').find('tbody tr').each(function () {
        update_index++;
        $(this).find('td').eq(0).text(update_index);

    });

});

//cập nhật dự án
$(document).on('click', '.cap-nhat-project', function () {
    let indexs = $(this).parents('tr').find('td').eq(0).text();
    let name = $(this).parents('tr').find('td').eq(1).text();
    let fromDate = $(this).parents('tr').find('td').eq(2).text();
    let toDate = $(this).parents('tr').find('td').eq(3).text();
    let status = $(this).parents('tr').find('td').eq(4).text();
    let links = $(this).parents('tr').find('td').eq(5).text();
    $('#modal-cap-nhat-project .modal-body').find('input').eq(0).val(indexs);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(1).val((name == 'NULL') ? '' : name);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(2).val((fromDate == 'NULL') ? '' : fromDate);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(3).val((toDate == 'NULL') ? '' : toDate);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(4).val((status == 'NULL') ? '' : status);
    $('#modal-cap-nhat-project .modal-body').find('textarea').val((links == 'NULL') ? '' : links);

    $('#modal-cap-nhat-project').modal('show');

});

//modal dự án
$(document).on('shown.bs.modal', '#modal-cap-nhat-project', function () {
    $(this).find('.modal-body').find('input').eq(1).select();
    $(this).find('.project-status-select').select2();
});

//modal kinh nghiệm
$(document).on('shown.bs.modal', '#modal-cap-nhat-exp', function () {
    $(this).find('.modal-body').find('input').eq(1).select();
});

//nút cập nhật dự án
$(document).on('click', '#modal-cap-nhat-project .modal-footer button:eq(1)', function () {
    // alert()
    let _parent = $('#modal-cap-nhat-project .modal-body');
    let indexs = _parent.find('input').eq(0).val();
    let name = _parent.find('input').eq(1).val();
    let fromDate = _parent.find('input').eq(2).val();
    let toDate = _parent.find('input').eq(3).val();
    let status = _parent.find('select').val();
    let status_text = _parent.find('select').find('option:checked').text();
    let links = _parent.find('textarea').val();

    let errorCount = 0;

    // let elementIDToSave = $('#' + arrayCustom.beforeSendElement);
    $.each($(this).parents('#modal-cap-nhat-project').find('input').not('input[type="hidden"]'), function (i, v) {
        if ($(v).val() == null || $(v).val() == '') {
            errorCount++;
            $(v).addClass('is-invalid');
            $(v).parent().find('.invalid-feedback strong').text($(v).attr('title') + ' ' + 'không được để trống');
        }
    });

    // (errorCount == 0) ? $('#modal-cap-nhat-project').modal('hide') : errorCount;

    if (errorCount == 0) {
        $('#modal-cap-nhat-project').modal('hide');
        $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(1).text((name == '') ? 'NULL' : name);
        $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(2).text((fromDate == '') ? 'NULL' : fromDate);
        $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(3).text((toDate == '') ? 'NULL' : toDate);
        // $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(4).text((status_text == '') ? 'NULL' : status_text).data('id', status);
        $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(4).data('id', status).html('<span class="' + getHtmlStatusProject(status) + '">' + status_text + '</span>');
        $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(5).html('<a href="' + ((links == '') ? 'NULL' : links) + '" target="_blank">' + ((links == '') ? 'NULL' : links) + '</a>');

    }

});

const getHtmlStatusProject = (status) => {
    switch (parseInt(status)) {
        case 1:
            return 'badge badge-info';
        case 2:
            return 'badge badge-pink';
        case 3:
            return 'badge badge-success';
        case 4:
            return 'badge badge-warning';
    }
}

//phần kinh nghiệm
const getHtmlExpNew = (type) => {
    return $.ajax({
        method: 'get',
        url: '/nguoi-tim-viec/project-view/get-exp-html',
        data: {
            type: type,
        },
    });
};

//thêm một kinh nghiệm
$(document).on('click', '#add-new-exp', function () {
    getHtmlExpNew(0).done(res => {
        $(this).parents('#about-me-exp').find('ul').append(res);
        $('#about-me-exp').find('ul').find('li:last').find('button:first').click()
    });
});

//xóa 1 kinh nghiệm
$(document).on('click', '.xoa1-exp', function () {
    $(this).parents('li').remove();
});

//nút cập nhật mở modal kinh nghiệm
$(document).on('click', '.cap-nhat-exp', function () {
    $('#modal-cap-nhat-exp').modal('show');
    let index = $(this).parents('li').index();
    let exp_from = $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(0).text();
    let exp_to = $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(1).text();
    let index_gach = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().indexOf('-');
    let ten_cong_ty = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().substr(0, index_gach).trim();
    let ten_chuc_vu = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().substr(index_gach + 1).trim();
    let trang_web = $('#exp-list').find('li').eq(index).find('.company-link-exp').text();
    let mo_ta = $('#exp-list').find('li').eq(index).find('.description-exp').html().replace(/<br>/g, '\n');
    // $('#exp-list').find('li').eq(index).find('.description-exp').html(mo_ta.replace(/\n/g, '<br>'));

    // console.log(index)
    $('#modal-cap-nhat-exp').find('input').eq(0).val(index);
    $('#modal-cap-nhat-exp').find('input').eq(1).val(ten_cong_ty);
    $('#modal-cap-nhat-exp').find('input').eq(2).val(ten_chuc_vu);
    $('#modal-cap-nhat-exp').find('input').eq(3).val(trang_web);
    $('#modal-cap-nhat-exp').find('input').eq(4).val(exp_from);
    $('#modal-cap-nhat-exp').find('input').eq(5).val(exp_to);
    $('#modal-cap-nhat-exp').find('textarea').val(mo_ta);

});

//xóa một kỹ năng
$(document).on('click', '.remove-skill', function () {
    $(this).parents('.pt-1.skill').remove();
});

//cập nhật modal kinh nghiệm
$(document).on('click', '#modal-cap-nhat-exp .modal-footer #save-exp', function () {
    let error = 0;
    let index = $('#modal-cap-nhat-exp').find('input').eq(0).val();
    let ten_cong_ty = $('#modal-cap-nhat-exp').find('input').eq(1).val();
    let ten_chuc_vu = $('#modal-cap-nhat-exp').find('input').eq(2).val();

    let cong_ty_chuc_vu = ten_cong_ty + " - " + ten_chuc_vu;
    let trang_web = $('#modal-cap-nhat-exp').find('input').eq(3).val();
    let exp_from = $('#modal-cap-nhat-exp').find('input').eq(4).val();
    let exp_to = $('#modal-cap-nhat-exp').find('input').eq(5).val();
    let mo_ta = $('#modal-cap-nhat-exp').find('textarea').val();


    $('#modal-cap-nhat-exp').find('input').not('input[type="hidden"]').each(function () {
        if ($(this).val() == '') {
            $(this).addClass('is-invalid');
            $(this).parent().find('.invalid-feedback strong').text($(this).attr('title') + ' ' + 'không được để trống');
            error++;
        }
    });
    if (mo_ta == '') {
        $('#modal-cap-nhat-exp').find('textarea').addClass('is-invalid');
        $('#modal-cap-nhat-exp').find('textarea').parent().find('.invalid-feedback strong').text($('#modal-cap-nhat-exp').find('textarea').attr('title') + ' ' + 'không được để trống');
        error++;
    }

    if (error == 0) {
        // index
        $('#modal-cap-nhat-exp').modal('hide');
        $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(0).text(exp_from);
        $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(1).text(exp_to);

        $('#exp-list').find('li').eq(index).find('.company-name-exp').text(cong_ty_chuc_vu);

        $('#exp-list').find('li').eq(index).find('.company-link-exp').text(trang_web);
        $('#exp-list').find('li').eq(index).find('.description-exp').html(mo_ta.replace(/\n/g, '<br>'));
    }

    // console.log(mo_ta.replace(/\n/g, '<br>'))
});
//hết phần kinh nghiệm

//nút không lưu
$(document).on('click', '.cancel-profile', function () {
    window.location.href = '/nguoi-tim-viec';

});

//nút lưu cập nhật hồ sơ
$(document).on('click', '.save-profile', function () {
    let gt_ban_than = $('#user_gioi_thieu').find('textarea').val()//giới thiệu bản thân
    let so_dien_thoai = $('input.phone').val();//số điện thoại
    let dia_chi_email = $('input.email').val();//email
    let ho_ten = $('input#ho_ten').val();//họ và tên
    let gioi_tinh = $('select#gioi_tinh').val();//giới tính
    let ngay_sinh = $('input#ngay_sinh').val();//ngày sinh
    let muc_tieu_nghe_nghiep = $('textarea#muc_tieu_nghe_nghiep').val();//mục tiêu nghề nghiệp
    let so_thich = $('textarea#so_thich').val();//sở thích
    let dia_chi = $('input#dia_chi').val();//địa chỉ
    let vt_ung_tuyen = $('input#vt_ung_tuyen').val();//vị trí ứng tuyển
    let khu_vuc = $('input#khu_vuc').val();//khu vực
    //không lấy
    let muc_luong_from = $('input#muc_luong_from').val();
    let muc_luong_to = $('input#muc_luong_to').val();
    //end không lấy
    let muc_luong = muc_luong_from + " - " + muc_luong_to;
    let hoc_van = $('select#hoc_van').val();
    let ten_truong_tot_nghiep = $('input#ten_truong_tot_nghiep').val();
    let loai_cong_viec = $('select#loai_cong_viec').val();
    let ten_cong_viec = $('input#ten_cong_viec').val();
    let all_skills = [];//array skill
    let all_social = [];
    let all_exp = [];//kinh nghiệm
    let all_projects = [];
    let error = 0;
    //phần tạo mảng kỹ năng
    if ($('.pt-1.skill').length > 0) {
        $('.pt-1.skill').each(function () {

            if ($(this).find('.skill-name').val() == '') {
                $(this).find('.skill-name').addClass('is-invalid');
                error++;
            } else {
                let item = {};
                item.name = $(this).find('.skill-name').val();
                item.diem = $(this).find('.skill_value').text();
                all_skills.push(item)
            }
        });
    }

    //phần tạo mảng mạng xã hội
    $('.social-link').each(function () {

        all_social.push($(this).val());

    })

    //phần tạo mảng kinh nghiệm làm việc
    if ($('#exp-list').find('li').length > 0) {
        $('#exp-list').find('li').each(function () {
            let item = {};
            item.tenCtyVaChucVu = $(this).find('.company-name-exp').text();
            item.websites = $(this).find('.company-link-exp').text();
            item.from_date = $(this).find('.time-exp').find('b').eq(0).text();
            item.to_date = $(this).find('.time-exp').find('b').eq(1).text();
            item.mo_ta = $(this).find('.description-exp').html().replace(/<br>/g, '\n');
            all_exp.push(item);
        });
    }

    //phần tạo mảng project
    if ($('#table-project').find('tbody').find('tr').length > 0) {
        $('#table-project').find('tbody').find('tr').each(function () {
            let item = {};
            item.id = $(this).find('td').eq(0).text();
            item.name = $(this).find('td').eq(1).text();
            item.from_date = $(this).find('td').eq(2).text();
            item.to_date = $(this).find('td').eq(3).text();
            item.trang_thai = $(this).find('td').eq(4).data('id');
            item.websites = $(this).find('td').eq(5).text();
            all_projects.push(item);
        });
    }
    error += notNullMessage($('.not-null'));
    // console.log(all_exp)
    if (error == 0) {

        $('.save-profile,.cancel-profile').addClass('d-none');

        $.ajax({
            method: 'post',
            url: '/nguoi-tim-viec/update',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            // dataType: 'json',
            data: {
                gt_ban_than: gt_ban_than,
                so_dien_thoai: so_dien_thoai,
                dia_chi_email: dia_chi_email,
                ho_ten: ho_ten,
                gioi_tinh: gioi_tinh,
                ngay_sinh: ngay_sinh,
                muc_tieu_nghe_nghiep: muc_tieu_nghe_nghiep,
                so_thich: so_thich,
                dia_chi: dia_chi,
                vt_ung_tuyen: vt_ung_tuyen,
                khu_vuc: khu_vuc,
                muc_luong: muc_luong,
                hoc_van: hoc_van,
                ten_truong_tot_nghiep: ten_truong_tot_nghiep,
                loai_cong_viec: loai_cong_viec,
                ten_cong_viec: ten_cong_viec,
                all_skills: all_skills,
                all_social: all_social,
                all_exp: all_exp,
                all_projects: all_projects,
            },

            success: function (res) {
                if (res.status == 200){
                    $.toast({
                        heading: res.title + ' ' + res.status_text.toLowerCase(),
                        hideAfter: 3000,
                        icon: 'success',
                        loaderBg: 'green',
                        position: 'top-right',
                        stack: 1,
                        text: res.message.toUpperCase()+'!',
                    });
                    window.location.href = '/nguoi-tim-viec';
                }else{
                    $.toast({
                        heading: res.title + ' ' + res.status_text.toLowerCase(),
                        hideAfter: 3000,
                        icon: 'error',
                        loaderBg: 'red',
                        position: 'top-right',
                        stack: 1,
                        text: res.message.toUpperCase()+'!',
                    });
                }

            }
        })
    }


});
