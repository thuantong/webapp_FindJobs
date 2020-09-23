const skill_view = () => {
    let method = 'get';
    let url_send = '/user-skill-view-append';
    return $.ajax({
        method: method,
        url: url_send,
        // data: {
        //     tyle: 1,//ajax
        // }
    });
};

const get_skill_data = () => {
    let method = 'get';
    let url_send = '/user-skill-view';
    return $.ajax({
        method: method,
        url: url_send,
        // data: {
        //     tyle: 1,//ajax
        // }
    });
};

const getSelectTrangThaiProject = () => {
    return '<select class="selectpicker" data-live-search="true" data-style="btn-light">'
        + '<option><span class="badge badge-info">Đang tiến hành</option>'
        + '<option><span class="badge badge-pink">Đang chờ xử lý</span></option>'
        + '<option><span class="badge badge-success">Hoàn thành</span></option>'
        + '<option><span class="badge badge-warning">Sắp có</span></option>'
        + '</select>';
};
//index,name,fromDate,toDate,url
const setTRowProject = (index,type) => {
    return $.ajax({
        method: 'get',
        url: '/nguoi-tim-viec/project-view',
        data: {
            index: index,
            type: type
        },
    });
};

function remove_vietnamese_string(str) {
    if (str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
        str = str.replace(/ |\-/g, '');
        str = str.replace(/đ/g, 'd');
        // str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        // str= str.replace(/^\-+|\-+$/g,"");
        // str= str.replace(/!|@|%|\$|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$/g,"");
        // str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng
        // str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // Â, Ê, Ă, Ơ, Ư
        return str.toLowerCase();
    } else {
        return false;
    }

}

let idsr = [];
$(function () {

    let booleanFixed = true;
    let myRange;

    get_skill_data().done(function (res) {
        $('#add-new-skill').parents('.card-box').append(res);

    }).then(function () {
        let i = 0;
        $('.skill_append').each(function () {
            idsr.push(($(this).parent().find('.skill-name').data('prefix')) + 'ir');
            $(this).attr('id', $.trim(idsr[i]));
            // $(this).attr('id',$(this).parent().find('.skill-name').data('prefix'));
            // console.log(idsr[i])
            $('#' + idsr[i]).ionRangeSlider({
                skin: 'round',
                from: $(this).parent().find('.skill-name').data('value'),
                from_fixed: booleanFixed,
                onStart: function (data) {
                    console.log('ir', data);
                    data.input.parent().find('.skill_value').text(data.input.parent().find('.skill-name').data('value'));
                },
            });
            i++;
        });
        myRange = document.getElementsByClassName('skill_append').dataset.ionRangeSlider;

    });

    let randDomID = '';
    let numberRand = 0;

    $('#add-new-skill').on('click', function () {
        skill_view().done(res => {
            // console.log(res);
            numberRand++;
            randDomID = Math.random().toString(36).substring(7);
            $(this).parents('.card-box').append(res);
        }).then(function (b) {
            $('.card-box').find('.skill_append:last').attr('id', 'a' + numberRand);
            $('#a' + numberRand).ionRangeSlider({
                skin: 'round',
                from: 10,
                from_fixed: booleanFixed,
                onStart: function (data) {
                    data.input.parent().find('.skill_value').text(data.from);
                },
            });
            // my_range4 = document.getElementsByClassName('skill_append').dataset.ionRangeSlider;
            // $.each(idsr,function (i,v) {
            // document.getElementById(v).dataset.ionRangeSlider
            // $('#'+v).update({
            //     from_fixed: booleanFixed,
            // });
            // });
        });
    });

    $('#update-skill').on('click', function () {
        if ($(this).hasClass('btn-success') == true) {
            $(this).removeClass('btn-success').addClass('btn-primary').text('Sửa');

            let arraySkill = [];
            $(this).parents('.card-box').find('.pt-1').each(function (i) {
                let items = {};
                items.name = $(this).find('.skill-name').text();
                items.value = $(this).find('.skill_value').text();
                items.prefix = remove_vietnamese_string($(this).find('.skill-name').text());
                arraySkill.push(items);
                // console.log($(this).find('.skill-name').text(),$(this).find('.skill_value').text());
            });

            let method = 'post';
            let url_skill = '/user-skill-update';
            let data_send = {data: arraySkill};
            let customAjax = {beforeSendElement: $(this).attr('id')};
            getResponseAjax(method, url_skill, data_send, customAjax);

            // console.log(data_send)

        } else {
            $(this).removeClass('btn-primary').addClass('btn-success').text('Lưu');
        }

        if ($(this).hasClass('btn-success') == true) {
            $('#add-new-skill').removeClass('d-none');
            booleanFixed = false;
        } else {
            $('#add-new-skill').addClass('d-none');
            booleanFixed = true;
        }

        $.each(idsr, function (i, v) {
            console.log(v);
            $('#' + v).data('ionRangeSlider').update({
                from_fixed: booleanFixed,
            });
        });

    });

    //update project
    $('#add-new-project').on('click', function () {
        let indexTrow;
        if($('#table-project tbody tr').length == 0){
            indexTrow = 1;
        }else {
            indexTrow = parseInt($('#table-project').find('tbody tr:last').find('td').eq(0).text()) +1;
        }

        setTRowProject(indexTrow,1).done(res => {
            // console.log('tr',res)
            $('#table-project').find('tbody').append(res);
            // $('.project-status-select').select2();

            // $('.fromDate').datepicker({
            //     format: 'dd/mm/yyyy',
            //     autoclose: true,
            // }).on('changeDate', function (e) {
            //     let value = $(e.currentTarget).val();
            //     $(e.currentTarget).parents('td').html(value);
            //     // $(this).text(value)
            // });
            // $('.toDate').datepicker({
            //     format: 'dd/mm/yyyy',
            //     autoclose: true,
            // }).on('changeDate', function (e) {
            //     let value = $(e.currentTarget).val();
            //     $(e.currentTarget).parents('td').html(value);
            //
            // });
        });
    });


});


$(document).on('change', '.skill_append', function () {
    $(this).parent().find('.skill_value').text($(this).val());
});
$(document).on('input', '#skill-name', function () {

});

$(document).on('click', '.skill-name', function () {
    let value = $.trim($(this).attr('title'));

    if ($(this).hasClass('non-active') == true && $('#update-skill').hasClass('btn-primary') == false) {
        $(this).removeClass('non-active');
        $(this).html('<input type="text" placeholder="' + value + '">');
    }
});

$(document).on('focusout', 'input[type="text"]', function () {
    let value = $(this).val() || 'null';
    $(this).parents('.skill-name').html(value).addClass('non-active');
});

$(document).on('click', '.xoa1-project', function () {
    let update_index = 0;

    $(this).parents('tr').remove();
    $('#table-project').find('tbody tr').each(function () {
        update_index++;
        $(this).find('td').eq(0).text(update_index);
        // console.log();
        // $(this).find('td').eq(0).text(update_index+1);
    });

});

$(document).on('click','.cap-nhat-project',function () {
    let indexs = $(this).parents('tr').find('td').eq(0).text();
    let name = $(this).parents('tr').find('td').eq(1).text();
    let fromDate = $(this).parents('tr').find('td').eq(2).text();
    let toDate = $(this).parents('tr').find('td').eq(3).text();
    let status = $(this).parents('tr').find('td').eq(4).text();
    let links = $(this).parents('tr').find('td').eq(5).text();
    $('#modal-cap-nhat-project .modal-body').find('input').eq(0).val(indexs);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(1).val((name == 'NULL') ? '': name);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(2).val((fromDate == 'NULL') ? '': fromDate);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(3).val((toDate == 'NULL') ? '': toDate);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(4).val((status == 'NULL') ? '': status);
    $('#modal-cap-nhat-project .modal-body').find('textarea').val((links == 'NULL') ? '': links);


    // let _parent = $('#modal-cap-nhat-project .modal-body');
    // let indexs = _parent.find('input').eq(0).val();
    // let name = _parent.find('input').eq(1).val();
    // let fromDate = _parent.find('input').eq(2).val();
    // let toDate = _parent.find('input').eq(3).val();
    // let status = _parent.find('input').eq(4).val();
    // let links = _parent.find('textarea').val();
    $('#modal-cap-nhat-project').modal('show');
    // $('#modal-cap-nhat-project .modal-body').find('input').eq(1).focus();
})

$(document).on('shown.bs.modal','#modal-cap-nhat-project',function () {
    $(this).find('.modal-body').find('input').eq(1).select();
});
$(document).on('click', '#update-right', function () {
    if ($(this).hasClass('btn-primary') == true) {
        $(this).removeClass('btn-primary').addClass('btn-success').html('Lưu');
        $('#add-new-exp').removeClass('d-none');
        $('#add-new-project').removeClass('d-none');
        $('#table-project').find('th').eq(6).removeClass('d-none');

        $('#table-project').find('tbody tr').each(function () {
            $(this).find('td').eq(6).removeClass('d-none');
        });

        // $('#table-project').find('td').eq(6)
    } else if ($(this).hasClass('btn-success') == true) {
        $(this).removeClass('btn-success').addClass('btn-primary').html('Sửa');
        $('#add-new-exp').addClass('d-none');
        $('#add-new-project').addClass('d-none');
        $('#table-project').find('th').eq(6).addClass('d-none');

        $('#table-project').find('tbody tr').each(function () {
            $(this).find('td').eq(6).addClass('d-none');
        });
        let arrayProject = [];
        $('#table-project').find('tbody tr').each(function () {
            let items = {};
            items.project_name = $(this).find('td').eq(1).text();
            items.project_from = $(this).find('td').eq(2).text();
            items.project_to = $(this).find('td').eq(3).text();
            items.project_link = $(this).find('td').eq(5).text();
            items.project_status = $(this).find('td').eq(4).text();
            arrayProject.push(items);
        });

    }
});

$(document).on('click','#modal-cap-nhat-project .modal-footer button:eq(1)',function () {
    // alert()
    let _parent = $('#modal-cap-nhat-project .modal-body');
    let indexs = _parent.find('input').eq(0).val();
    let name = _parent.find('input').eq(1).val();
    let fromDate = _parent.find('input').eq(2).val();
    let toDate = _parent.find('input').eq(3).val();
    let status = _parent.find('input').eq(4).val();
    let links = _parent.find('textarea').val();

    console.log(indexs)
    $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(1).text(name);
    $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(2).text(fromDate);
    $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(3).text(toDate);
    $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(4).text(status);
    $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(5).text(links);
    $('#modal-cap-nhat-project').modal('hide')


});
//
// $(document).on('click','.project-from',function () {
//     if($(this).find('input').length == 0){
//         let value = $(this).text();
//         $(this).html('<input type="text" class="form-control fromDate" placeholder="Chọn ngày">');
//         $(this).find('.fromDate').val(value);
//         $('.fromDate').datepicker({
//             format: 'dd/mm/yyyy',
//             autoclose: true,
//         }).on('changeDate', function (e) {
//             let value = $(e.currentTarget).val();
//             $(e.currentTarget).parents('td').html(value);
//         });
//         $(this).find('.fromDate').focus();
//     }
// });
// $(document).on('click','.project-to',function () {
//     let valueBegin = $('#table-project tbody tr td:eq(2)').text();
//     if($(this).find('input').length == 0){
//         let valueTxt = $(this).text();
//         $(this).html('<input type="text" class="form-control toDate" placeholder="Chọn ngày">');
//         $(this).find('.toDate').val(valueTxt);
//         $('.toDate').datepicker({
//             format: 'dd/mm/yyyy',
//             autoclose: true,
//         }).on('changeDate', function (e) {
//             let value = $(e.currentTarget).val();
//             let arrayEnd = value.split("/");
//             let arrayBegin = $(e.currentTarget).parents('tr').find('td').eq(2).text().split("/");
//             //
//             let datepickerEnd = new Date(arrayEnd[2],arrayEnd[1] -1,arrayEnd[0]);
//             let datepickerBegin = new Date(arrayBegin[2],arrayBegin[1] -1,arrayBegin[0]);
//             //
//             if(datepickerEnd > datepickerBegin){
//                 $(e.currentTarget).parents('td').html(value);
//             }else{
//                 $.toast({
//                     heading: 'Chọn sai ngày',
//                     hideAfter: 3000,
//                     icon: 'error',
//                     loaderBg: 'red',
//                     position: 'top-right',
//                     stack: 1,
//                     text: 'Ngày kết thúc phải lớn hơn ngày bắt đầu!',
//                     // text: 'Bạn vừa ' + arrayCustom.resHeading.toLowerCase() + ' ' + res.status_text.toLowerCase() + '!',
//                 });
//                 $(e.currentTarget).parents('td').html($(e.currentTarget).parents('tr').find('td').eq(2).text().val());
//             }
//         });
//         $(this).find('.toDate').focus();
//     }
// });
// const getHtmlProjectStatus = (type) =>{
//     let html = '';
//     switch (parseInt(type)) {
//         case 1:
//             html = '<span class="badge badge-info">Đang tiến hành</span>';
//             break;
//         case 2:
//             html = '<span class="badge badge-pink">Đang chờ xử lý</span>';
//             break;
//         case 3:
//             html = '<span class="badge badge-success">Hoàn thành</span>';
//             break;
//         case 4:
//             html = '<span class="badge badge-warning">Sắp có</span>';
//             break;
//     }
//     return html;
// }
// $(document).on('select2:select','.project-status-select',function () {
//     let value = $(this).val();
//     $(this).parents('td').html(getHtmlProjectStatus(value));
// });
//
// $(document).on('click','.project-status',function () {
//     // alert()
//     let _this = $(this);
//     if(_this.find('select').length == 0){
//
//         $.ajax({
//             method:'get',
//             url:'/nguoi-tim-viec/project-view/get-project-status'
//         }).done(function (res) {
//             console.log(res)
//             // _this.removeAttr('disabled');
//             _this.html(res);
//             // $('.project-status-select').select2();
//             _this.find('select').select2();
//             _this.find('select').select2('open');
//
//         });
//     }
//
// });
//
// $(document).on('click','.project-links button',function () {
//     let _this = $(this);
//
//     if(_this.find('input').length == 0){
//         let value =  $(this).parents('td').text().substring(0, $(this).parents('td').text().length - 1);
//         console.log(value)
//         _this.parents('td').html('<input class="form-control" placeholder="Link" value = "'+value+'">');
//         _this.parents('td').find('input').trigger('input');
//     }
// });
//
// $(document).on('focusout','.project-links input',function () {
//     let _this = $(this);
//     let value =  $(this).val();
//     if(value.length > 0){
//         _this.parents('td').html('<a href="'+value+'" target="_blank">'+value+'</a><button class="btn btn-sm btn-success pl-1 pr-1">+</button>');
//     }
// });
//
// $(document).on('click','.project-name button',function () {
//     // alert();
//     let _this = $(this);
//     let _parent = $(this).parents('.project-name');
//     if(_this.find('input').length == 0){
//         let value =  _parent.text().substring(0, _parent.text().length - 1);
//
//         _parent.html('<input class="form-control" placeholder="Link" value = "'+value+'">');
//         _parent.find('input').select()
//     }
// });
//
// $(document).on('focusout','.project-name input',function () {
//     // alert();
//     let _this = $(this);
//     let value =  $(this).val();
//     if(value.length > 0){
//         _this.parents('td').html(''+value+'<button class="btn btn-sm btn-success pl-1 pr-1">+</button>');
//     }
// });
