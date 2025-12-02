<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Danh sách Danh mục sản phẩm</h4>
                            <a href="<?php echo BASE_URL ?>/category/add_category" class="btn btn-primary-custom btn-sm">
                                <i class="ti-plus"></i> Thêm danh mục
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-modern table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th class="text-right">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($category) && !empty($category)): ?>
                                        <?php foreach($category as $key => $cate): ?>
                                        <tr>
                                            <td><?php echo $cate['id_category_product'] ?></td>
                                            <td class="font-weight-bold"><?php echo $cate['title_category_product'] ?></td>
                                            <td class="text-muted"><?php echo $cate['desc_category_product'] ?></td>
                                            <td class="text-right">
                                                <a href="<?php echo BASE_URL ?>/category/edit_category/<?php echo $cate['id_category_product'] ?>" class="btn btn-inverse-info btn-sm btn-icon" title="Sửa">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="<?php echo BASE_URL ?>/category/delete_category/<?php echo $cate['id_category_product'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-inverse-danger btn-sm btn-icon" title="Xóa">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="4" class="text-center">Chưa có danh mục nào.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>