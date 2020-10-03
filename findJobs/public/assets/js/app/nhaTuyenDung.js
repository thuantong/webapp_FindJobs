$(function () {
    // $('#from_time').clockpicker({
    //     autoclose: true,
    // });

    $('#from_time,#to_time').datetimepicker({
        format: 'HH:mm',
        icons: {
            time: "icofont icofont-clock-time",
            date: "icofont icofont-ui-calendar",
            up: "icofont icofont-rounded-up",
            down: "icofont icofont-rounded-down",
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        },
    });
    // var input = $('#to_time').clockpicker({
    //     placement: 'bottom',
    //     align: 'left',
    //     autoclose: false,
    //     'default': 'now'
    // });
    lichNgay($('#ngay_sinh_tuyen_dung'));

    $('select#from_day,select#to_day').select2();
    $('select#quy_mo_nhan_su').select2();
    $('select#linh_vuc_hoat_dong').select2({
        placeholder: ' Chọn Ngành nghề',
        allowClear: false
    });
    $('select#gioi_tinh_tuyen_dung').select2();

    $("#logo_cong_ty").hover(function () {
        $(this).find('div').fadeIn('fast');

    }, function () {
        $(this).find('div').fadeOut('fast');
    });
    $("#avatar_tuyen_dung").hover(function () {
        $(this).find('div').fadeIn('fast');

    }, function () {
        $(this).find('div').fadeOut('fast');
    });

    $('#logo_cong_ty').find('button').eq(1).on('click', function () {
        $('#xem_anh_dai_dien').modal('show');
        let value = $(this).parents('#logo_cong_ty').find('img').attr('src');
        $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
    });

    $('#avatar_tuyen_dung').find('button').eq(1).on('click', function () {
        $('#xem_anh_dai_dien').modal('show');
        let value = $(this).parents('#avatar_tuyen_dung').find('img').attr('src');
        $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
    });

    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $uploadCrop.croppie('bind', {
                    url: e.target.result,
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            };
            //
            reader.readAsDataURL(input.files[0]);
        } else {
            swal('Sorry - you\'re browser doesn\'t support the FileReader API');
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 400,
            height: 400,
        },
        enableExif: false,
    });

    // save
    $('#logo_cong_ty').find('button').eq(0).on('click', function () {
        $(this).parent().find('input[type="file"]').trigger('click');

    });
    $('#logo_cong_ty').parent().find('input[type="file"]').on('change', function () {
        $('#doi_anh_dai_dien').data('type','congty').modal('show');
        readFile(this);
    });
    $('#doi_anh_dai_dien').on('hidden.bs.modal',function () {
        let type = $(this).data('type');
        switch (type) {
            case 'congty':
                $('#logo_cong_ty').parent().find('input[type="file"]').val('');
                break;
            case 'tuyendung':
                $('#avatar_tuyen_dung').parent().find('input[type="file"]').val('');
                break;
        }
    });
    $('#doi_anh_dai_dien').find('.modal-footer').find('button:eq(1)#save').on('click',function () {
        let __this = $(this);
        let elementID = '';
        switch ($('#doi_anh_dai_dien').data('type')) {
            case 'congty': elementID = '#'+ $('#logo_cong_ty').attr('id');
                break;
            case 'tuyendung': elementID = '#'+ $('#avatar_tuyen_dung').attr('id');
                break;
        }
        let namePicture = $(elementID).parent().find('input[type="file"]')[0].files[0].name;
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
        }).then(function (resp) {
            let method = 'post';
            let url = '/nha-tuyen-dung/set-logo-company';
            let data = {
                    fileName: resp,
                    name: namePicture,
            };
            sendAjaxNoFunc(method,url,data,__this.attr('id')).done(function (e) {
                $(elementID).find('img').attr('src', e).data('src',e);
                $.toast({
                    heading: 'Vừa thay đổi ảnh!',
                    hideAfter: 2000,
                    icon: 'success',
                    loaderBg: '#5ba035',
                    position: 'top-right',
                    stack: 1,
                    text: 'Thay đổi Logo',
                });
                $('#doi_anh_dai_dien').modal('hide');
            })

        });
    });


    //change email
    $('#email_tuyen_dung').on('focusout',function () {
        let _this = $(this);
        let data = {
            email_nha_tuyen_dung : $(this).val()
        };
        sendAjaxNoFunc('get','/nha-tuyen-dung/confirm-email',data).done(function (res) {
            // console.log('emaildoi',res)
            if($.trim(res.status) == 400){
                getMessageError(_this,res);
            }
        })
    });

    $('#avatar_tuyen_dung').find('button').eq(0).on('click', function () {
        $(this).parent().find('input[type="file"]').trigger('click');

    });
    $('#avatar_tuyen_dung').parent().find('input[type="file"]').on('change', function () {
        $('#doi_anh_dai_dien').data('type','tuyendung').modal('show');
        readFile(this);
    });
});

$(document).on('click','.save-profile',function () {
    let elementNull = $('.not-null');
    let error = 0;
    let button = $(this).attr('id');
    error += notNullMessage(elementNull);

    if (error == 0){
        let social = [];
        $('.social-link').each(function () {
            social.push($(this).val());
        });
        let method = 'post';
        let url = '/nha-tuyen-dung/update';
        let data = {
            name_company : $('#ten_cong_ty').val(),
            website_company : $('#link_website').val(),
            email_company : $('#email_cong_ty').val(),
            phone_company : $('#dien_thoai_cong_ty').val(),
            address_company : $('#dia_chi_chinh').val(),
            time_company : $('#from_time').val() + ' - ' + $('#to_time').val(),
            day_company : $('#from_day').val() + ' - ' + $('#to_day').val(),
            employees_company : $('#quy_mo_nhan_su').val(),
            linh_vuc_company : $('#linh_vuc_hoat_dong').val(),
            fax_company : $('#fax_cong_ty').val(),
            logo_company : $('#logo_cong_ty').find('img').data('src'),
            ho_ten_nhatuyendung : $('#ho_ten').val(),
            email_nhatuyendung : $('#email_tuyen_dung').val(),
            gioi_tinh_nhatuyendung : $('#gioi_tinh_tuyen_dung').val(),
            ngay_sinh_nhatuyendung : $('#ngay_sinh_tuyen_dung').val(),
            phone_nhatuyendung : $('#phone_tuyen_dung').val(),
            avatar_nhatuyendung : $('#avatar_tuyen_dung').find('img').data('src'),
            social_nhatuyendung : social
        };

        sendAjaxNoFunc(method,url,data,button).done(res=>{
            console.log(res)
            getHtmlResponse(res);
            if (res.status == 200){
                $('#'+button).attr('disabled','disabled');
                window.location.href = '/nha-tuyen-dung';
            }
        });
    }
});
// $(document).on('hover','#logo_cong_ty',function () {
//     console.log('ccc')
// });
