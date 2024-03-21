<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">
                    <label for="bf-img">Xem trước ảnh</label>
                    <img id="preview_img" class="bf-img" alt="" src="">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa tài khoản</h1>
                        </div>
                        <?= view('messages/message') ?>
                        <form class="user" action="admin/products/create" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input value="<?= old('name') ?>"  name="name" type="text" class="form-control form-control-user">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="parent">Parent</label>
                                    <select name="parent" style="font-size: .8rem; border-radius: 10rem;" class="form-select form-control ">
                                        <?php foreach ($category as $cate) : ?>
                                            <option value="<?= $cate['id'] ?>">
                                                <?= $cate['name'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="view">View</label>
                                    <input value="<?= old('view') ?>" name="view" type="number" class="form-control form-control-user">
                                </div>
                                <div class="col-sm-3">
                                    <label for="total">Số lượng</label>
                                    <input value="<?= old('total') ?>" name="total" type="number" class="form-control form-control-user">
                                </div>
                                <div class="col-sm-3">
                                    <label for="sold">Đã bán</label>
                                    <input value="<?= old('sold') ?>" name="sold" type="number" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="price">Giá (VNĐ)</label>
                                    <input value="<?= old('price') ?>" name="price" type="number" class="form-control form-control-user">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="sale">Giảm giá (VNĐ)</label>
                                    <input value="<?= old('sale') ?>" name="sale" type="number" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="time">Thời gian</label>
                                    <input value="<?= old('time') ?>" name="time" type="datetime-local" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="detail">Chi tiết sản phẩm</label>
                                    <textarea rows="15" name="detail" type="text" class="detail-pro form-control "><?= old('detail') ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="meta" >
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="add_img">Thêm/thay đổi hình ảnh</label>
                                    <input onchange="previewImage(event)" name="add_img" type="file" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="button-add-user">
                                <button type="submit" class="btn btn-success dang-ky">Chỉnh sửa</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>