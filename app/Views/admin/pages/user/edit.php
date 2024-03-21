<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa tài khoản</h1>
                        </div>
                        <?= view('messages/message') ?> 
                        <form class="user" action="admin/user/update" method="post">
                            <input name="id" type="hidden" value="<?= $user['id'] ?>">
                            <div class="form-group">
                                <input value="<?= $user['email'] ?>" name="email" type="email" class="form-control form-control-user" id="email" placeholder="Địa chỉ Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input value="<?= $user['name'] ?>" name="name" type="text" class="form-control form-control-user" id="name" placeholder="Tên người dùng">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" readonly type="password" class="form-control form-control-user" id="password" placeholder="Mật khẩu">
                                </div>
                                <div class="col-sm-6">
                                    <input name="repeatPassword" readonly type="password" class="form-control form-control-user" id="repeatPassword" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                            <div class="form-group row" style="align-items: center;" >
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <input name="change_password" type="checkbox" style="width:100%; height:calc(1.5em + .75rem + 2px); display: block" id="change_password">
                                </div>
                                    <label style="margin: 0;" >Thay đổi mật khẩu</label>
                            </div>
                            <div class="button-add-user">
                                <button type="submit" class="btn btn-success dang-ky">Chỉnh sửa</button>
                                <button type="reset" class="btn btn-secondary nhap-lai" id="resetForm">NHẬP LẠI</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>