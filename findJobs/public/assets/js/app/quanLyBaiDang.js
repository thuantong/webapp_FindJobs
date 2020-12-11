$(function () {
    table = getDanhSach();
});

const getDanhSach = () => {
    let ajax = {
        method: 'get',
        url: '/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach'
    };
    let column = [
        {
            render: function (api, rowIdx, columns, meta) {
                return meta.row + 1;
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
        },
        {
            render: function (api, rowIdx, columns, meta) {
                let classHide = '';
                switch (parseInt(columns.status)) {
                    case 0:
                        classHide = 'd-none';
                        break;
                    case 1:
                        classHide = 'd-block';
                        break;
                }

                return '<div class="d-flex center-element" data-id="' + columns.id + '">' +
                    '<a class="waves-effect text-primary mr-1 xem_noi_dung" style="text-decoration: underline" target="_blank" href="/bai-viet/thong-tin&baiviet='+columns.id+'&chitiet=1">Xem Nội dung</a>' +
                    '<button class="btn btn-sm btn-primary waves-effect chinh_sua ' + classHide + '" data-id="' + columns.id + '">Chỉnh sửa</button>' +
                    '</div>';
            }
        },

    ];
    return datatableAjax($('#quan-ly-bai-dang'), ajax, column);

};
