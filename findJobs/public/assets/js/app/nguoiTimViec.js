const skill_view = () => {
    let method = 'get';
    let url_send = '/user-skill-view';
    return $.ajax({
        method: method,
        url: url_send,
        data: {
            tyle: 1,//ajax
        }
    });
};

$(function () {
    // $('user-skill-view'){
    //
    // }
    let booleanFixed = true;

    $('.skill_append').ionRangeSlider({
        skin: 'round',
        from: 60,
        from_fixed: booleanFixed,
        onStart: function (data) {
            data.input.parent().find('.skill_value').text(data.from);
        },
    }).on('change', function (v) {
        $(this).parent().find('.skill_value').text($(this).val());
        // console.log($(this).val())
    });
    // $('#html_skill').ionRangeSlider({
    //     skin: 'round',
    //     from: 60,
    //     from_fixed: booleanFixed,
    //     onStart: function (data) {
    //         data.input.parent().find('.skill_value').text(data.from);
    //     },
    // }).on('change', function (v) {
    //     $(this).parent().find('.skill_value').text($(this).val());
    //     // console.log($(this).val())
    // });
    // $('#php_skill').ionRangeSlider({
    //     skin: 'round',
    //     from: 60,
    //     from_fixed: booleanFixed,
    //     onStart: function (data) {
    //         data.input.parent().find('.skill_value').text(data.from);
    //     },
    // }).on('change', function (v) {
    //     $(this).parent().find('.skill_value').text($(this).val());
    //     // console.log($(this).val())
    // });
    // $('#java_skill').ionRangeSlider({
    //     skin: 'round',
    //     from: 60,
    //     from_fixed: booleanFixed,
    //     onStart: function (data) {
    //         data.input.parent().find('.skill_value').text(data.from);
    //     },
    // }).on('change', function (v) {
    //     $(this).parent().find('.skill_value').text($(this).val());
    //     // console.log($(this).val())
    // });



    let randDomID = '';
    let numberRand = 0;
    let my_range4;
    // let my_range4 = $('.skill_append').data('ionRangeSlider');

    $('#add-new-skill').on('click', function () {
        skill_view().done(res => {
            console.log(res);
            numberRand++;
            randDomID = Math.random().toString(36).substring(7);
            $(this).parents('.card-box').append(res);
        }).then(function (b) {
            $('.card-box').find('.skill_append:last').attr('id',"a"+numberRand);
            $("#a"+numberRand).ionRangeSlider({
                skin: 'round',
                from: 10,
                from_fixed: booleanFixed,
                onStart: function (data) {
                    data.input.parent().find('.skill_value').text(data.from);
                },
            });
            my_range4 = document.getElementsByClassName('skill_append').dataset.ionRangeSlider;

        });
    });

    $('#update-skill').on('click', function () {
        if($(this).hasClass('btn-success') == true){
            let arraySkill = [];
            // console.log($(this).parents('.card-box').find('.pt-1').length)
            $(this).parents('.card-box').find('.pt-1').each(function (i) {
                let items = {};
                items.name = $(this).find('.skill-name').text();
                items.value = $(this).find('.skill_value').text();
                arraySkill.push(items);
                // console.log($(this).find('.skill-name').text(),$(this).find('.skill_value').text());
            });

                let method = 'post';
                let url_skill = '/user-skill-update';
                let data_send = {data : arraySkill};
                let customAjax = {beforeSendElement: $(this).attr('id')};
                getResponseAjax(method,url_skill,data_send,customAjax)

            // console.log(data_send)

        }
        $(this).hasClass('btn-primary') == true ? $(this).removeClass('btn-primary').addClass('btn-success').text('Lưu') : $(this).removeClass('btn-success').addClass('btn-primary').text('Sửa');

        // console.log($(this).hasClass('btn-success'))
        if ($(this).hasClass('btn-success') == true) {
            $('#add-new-skill').removeClass('d-none');
            booleanFixed = false;
        } else {
            $('#add-new-skill').addClass('d-none');
            booleanFixed = true;
        }
        // my_range.update({
        //     from_fixed: booleanFixed,
        // });
        // my_range2.update({
        //     from_fixed: booleanFixed,
        // });
        // my_range3.update({
        //     from_fixed: booleanFixed,
        // });
        if($(this).parents('.card-box').find('.pt-1').hasClass('old')){
            my_range4.update({
                from_fixed: booleanFixed,
            });
        }


    });

});


$(document).on('change','.skill_append',function () {
    $(this).parent().find('.skill_value').text($(this).val());
});
$(document).on('input','#skill-name',function () {

});

$(document).on('click','.skill-name',function () {
    let value = $.trim($(this).attr('title'))

    if($(this).hasClass('non-active') == true && $('#update-skill').hasClass('btn-primary') == false){
        $(this).removeClass('non-active');
        $(this).html('<input type="text" placeholder="'+value+'">');
    }
});

$(document).on('focusout','input[type="text"]',function () {
    let value = $(this).val() || 'null';
    $(this).parents('.skill-name').html(value).addClass('non-active');
})
