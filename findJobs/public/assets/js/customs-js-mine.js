$(function () {
    $('div::-webkit-scrollbar-thumb').attr('style', 'display:none;');
    $('.overflow-auto-scroll').scroll(function () {
        $('div::-webkit-scrollbar-thumb').css('display', 'none');
        // setTimeout(function(){ alert("Hello"); }, 1500);
    });
    let time = 0;
    $('.button-menu-mobile').on('click', function () {
        // console.log($('.left-side-menu-custom').css('display'))


        if ($(window).width() < 769) {
            time++;
            if ($('.left-side-menu-custom').css('display') == 'block' && time == 1) {
                $('.left-side-menu-custom').css('display', 'block');
            } else if ($('.left-side-menu-custom').css('display') == 'none') {
                $('.left-side-menu-custom').css('display', 'block');
            } else {
                $('.left-side-menu-custom').css('display', 'none');
            }

        }
    });
    $(window).resize(function () {
        if ($(window).width() < 769) {
            time = 0;
            $('.left-side-menu-custom').css('display', 'none');
        } else {
            $('.left-side-menu-custom').css('display', 'block');
        }

    });

    $('input').on('input', function () {
        $(this).removeClass('is-invalid');
    });
});
const getErrorRespone = (res) => {
    // $('input[name]')
};
$(document).on('hidden.bs.modal',function () {
    $('input').val('').trigger('input');
});


const getResponseAjax = (method, url, arrayData, arrayCustom) => {
    let headerCus = '';

    let elementIDToSave = $('#'+arrayCustom.beforeSendElement);
    let newArray = [];
    let items = {};
    let errorCount = 0;
    const buttonText = elementIDToSave.html();
    let response_func = '';
    // console.log(arrayData == '');
    // console.log(arrayData == '');
    if(arrayCustom == ''){
        $.each(arrayCustom, function (index, value) {

            if (arrayData.hasOwnProperty(index)) {
                items[index] = value;
            }
        });
    }

    newArray.push(items);

    $.each(elementIDToSave.parents('.modal').find('input').not('input[type="hidden"]'),function (i,v) {
        if($(v).val() == null || $(v).val() == ''){
            errorCount++;
            $(v).addClass('is-invalid');
            $(v).parent().find('.invalid-feedback strong').text($(v).attr('title') + ' ' + 'không được để trống');
        }
    });

    if(errorCount == 0){
        switch (method.toLowerCase()) {
            case 'post':
                headerCus = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                };
                break;
            case 'get':
                headerCus = {};
                break;
        };

        $.ajax({
            method: method,
            url: url,
            data: arrayData,
            headers: headerCus,
            success: function (res) {
                    console.log(res)
                if (res.status == 200) {
                    elementIDToSave.html(buttonText);
                    elementIDToSave.removeAttr('disabled').html(buttonText);

                    let elementID = elementIDToSave.attr('id');
                    $.toast({
                        heading: res.status_text.toLowerCase(),
                        hideAfter: 2000,
                        icon: 'success',
                        loaderBg: '#5ba035',
                        position: 'top-right',
                        stack: 1,
                        // text: 'Bạn vừa ' + arrayCustom.resHeading.toLowerCase() + ' ' + res.status_text.toLowerCase() + '!',
                        text: res.message.toUpperCase()+'!',
                    });
                    let modalID = $('#' + elementID).parents('.modal').attr('id');
                    $('#' + modalID).modal('hide');
                } else if (res.status == 400) {
                    if (res.reset == 1){
                        $('input').val('').trigger('input');
                    }
                    elementIDToSave.attr('id',arrayCustom.beforeSendElement).html(buttonText);
                    elementIDToSave.removeAttr('disabled').html(buttonText);
                    $.each(newArray[0],function (i,v) {

                        v.addClass('test');
                    });
                    $.toast({
                        heading: res.status_text.toLowerCase(),
                        hideAfter: 3000,
                        icon: 'error',
                        loaderBg: 'red',
                        position: 'top-right',
                        stack: 1,
                        text: res.message.toUpperCase()+'!',
                        // text: 'Bạn vừa ' + arrayCustom.resHeading.toLowerCase() + ' ' + res.status_text.toLowerCase() + '!',
                    });
                }

            },
            beforeSend: function (xhr) {
                elementIDToSave.html('<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>');
                elementIDToSave.attr('disabled','disabled');
            },
        });

    }

};
