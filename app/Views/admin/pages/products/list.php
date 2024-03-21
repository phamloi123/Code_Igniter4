<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <?= view('messages/message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Chức năng</th>
                            <th>ID</th>
                            <th>Meta</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Giảm giá</th>
                            <th>Chi tiết</th>
                            <th>View</th>
                            <th>Parent</th>
                            <th>Còn lại</th>
                            <th>Đã bán</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $pro) : ?>
                            <tr>
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="admin/products/edit/<?= $pro['id'] ?>">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="delete-btn" title="Delete" data-url="<?= base_url() ?>/admin/products/delete/<?= $pro['id'] ?>">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td><?= $pro['id'] ?></td>
                                <td><?= $pro['meta'] ?></td>
                                <td><?= $pro['name'] ?></td>
                                <td><?= $pro['price'] ?></td>
                                <td><?= $pro['sale'] ?></td>
                                <td><?= $pro['detail'] ?></td>
                                <td><?= $pro['view'] ?></td>
                                <td><?= $pro['parent'] ?></td>
                                <td><?= $pro['total'] ?></td>
                                <td><?= $pro['sold'] ?></td>
                                <td><?= $pro['time'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->