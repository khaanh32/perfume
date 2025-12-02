<div class="main-panel">
    <div class="content-wrapper">
        <?php if (!empty($_GET['msg'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                    $msg = unserialize(urldecode($_GET['msg']));
                    foreach ($msg as $val) { echo $val . " "; }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Danh Sách Sản Phẩm</h4>
                            <div class="d-flex">
                                <div class="input-group me-3" style="width: 250px;">
                                    <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm sản phẩm...">
                                    <span class="input-group-text"><i class="icon-search"></i></span>
                                </div>
                                <a href="<?php echo BASE_URL ?>/product/add_product" class="btn btn-primary btn-icon-text">
                                    <i class="ti-plus btn-icon-prepend"></i> Thêm sản phẩm
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá bán</th>
                                        <th>Danh mục</th>
                                        <th>Dung tích</th>
                                        <th>Kho</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($product) && count($product) > 0): ?>
                                        <?php $i = 0; foreach($product as $pro): $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td class="py-1">
                                                <?php if($pro['image']): ?>
                                                    <img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" alt="image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;"/>
                                                <?php else: ?>
                                                    <img src="<?php echo BASE_URL ?>/public/admin_assets/images/faces/face1.jpg" alt="no-image"/>
                                                <?php endif; ?>
                                            </td>
                                            <td style="max-width: 200px; white-space: normal;">
                                                <span class="fw-bold"><?php echo $pro['title_product'] ?></span>
                                            </td>
                                            <td class="text-success font-weight-bold">
                                                <?php echo number_format($pro['price_product'], 0, ',', '.') ?>đ
                                            </td>
                                            <td><?php echo $pro['title_category'] ?></td>
                                            <td><?php echo $pro['capacity'] ?></td>
                                            <td>
                                                <?php if($pro['quantity'] > 0): ?>
                                                    <label class="badge badge-outline-success"><?php echo $pro['quantity'] ?></label>
                                                <?php else: ?>
                                                    <label class="badge badge-outline-danger">Hết hàng</label>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>" class="btn btn-inverse-primary btn-sm btn-icon" title="Sửa">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="btn btn-inverse-danger btn-sm btn-icon" title="Xóa">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="8" class="text-center">Không có sản phẩm nào.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>