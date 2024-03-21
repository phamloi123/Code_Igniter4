$(document).ready(function(){
    var table = $('#dataTable').DataTable({
        "language":{
            "lengthMenu": "Hiển thị _MENU_ sản phẩm",
            "zeroRecord": "Không có dữ liệu",
            "info": "Hiển thị trang _PAGE_ trên _PAGES_ trang",
            "infoEmpty": "Không có dữ liệu",
            "search": "Tìm kiếm",
            "paginate": {
                "previous": '<',
                "next": '>'
            }
        },
        "lengthMenu": [[1,3, 5, 10, 15, 20, 25], [1,3, 5, 10, 15, 20, 25]], // Danh sách tùy chọn cho số lượng sản phẩm trên mỗi trang
        "pageLength": 1 // Số lượng mặc định sản phẩm trên mỗi trang
    });
});
