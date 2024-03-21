<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?= view('messages/message') ?> 
                        <form class="user" action="admin/user/create" method="post">
                            <div class="form-group">
                                <input value="<?= old('email') ?>" name="email" type="email" class="form-control form-control-user" id="email" placeholder="Địa chỉ Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input value="<?= old('name') ?>" name="name" type="text" class="form-control form-control-user" id="name" placeholder="Tên người dùng">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user" id="password" placeholder="Mật khẩu">
                                </div>
                                <div class="col-sm-6">
                                    <input name="repeatPassword" type="password" class="form-control form-control-user" id="repeatPassword" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                            <div class="button-add-user">
                                <button type="submit" class="btn btn-success dang-ky">ĐĂNG KÝ</button>
                                <button type="reset" class="btn btn-secondary nhap-lai">NHẬP LẠI</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>