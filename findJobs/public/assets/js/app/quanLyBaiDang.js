$(function () {
    // let ajax = {
    //     method:'get',
    //     url:'/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach'
    // };
    // datatableAjax($('#quan-ly-bai-dang'),ajax)
    getDanhSach();
    // $.ajax({
    //     method : 'get',
    //     url:'/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach',
    //     success : function (e) {
    //         console.log(e)
    //     }
    // })
});

const getDanhSach = () => {
    let ajax = {
        method: 'get',
        url: '/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach'
    };
    let column = [
        {
            render: function (api, rowIdx, columns, meta) {
                return meta.row;
            }
        },
        {
            data: 'tieu_de'
        },
        {
            data: 'get_chuc_vu.name'
        },
        {
            data: 'get_cong_ty.name'
        },
        {
            data: 'han_bai_viet',
            render: function (api, rowIdx, columns, meta) {
                if (columns.han_bai_viet == null) {
                    return '<span class="text-warning">Bài viết chưa được xác nhận</span>'
                }
                return columns.han_bai_viet;
            }
        },
        {
            render: function (api, rowIdx, columns, meta) {

                switch (columns.status) {
                    case '0':
                        return '<span class="text-warning">Chờ xác nhận</span>';
                    case '1':
                        return '<span class="text-success">Đang tuyển dụng</span>';
                }
                // return columns.status;
            }
        }, {
            render: function (api, rowIdx, columns, meta) {
                return columns.tieu_de;
            }
        },

    ];
    return datatableAjax($('#quan-ly-bai-dang'), ajax, column);

};
