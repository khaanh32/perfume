<div class="admin-content">

    <div class="main-content-wrapper">
        <div class="content-tabs">
            <a href="/web_perfume/admin" class="tab-link"><i class="fas fa-chart-bar"></i> Tổng quan</a>
            <a href="/web_perfume/category/list_category" class="tab-link active"><i class="fas fa-list"></i> Quản lý Danh mục</a>
            <a href="#" class="tab-link"><i class="fas fa-box"></i> Quản lý Sản phẩm</a>
            </div>

        <div class="tab-content">
            
            <h2>Quản lý Danh mục</h2>
            
            <a href="/web_perfume/category/addcategory" class="add-new-btn"><i class="fas fa-plus"></i> Thêm Danh mục mới</a>

            <table class="category-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh mục</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if (isset($category) && !empty($category)) {
                        
                        foreach ($category as $item) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id_category_product']); ?></td>
                            <td><?php echo htmlspecialchars($item['title_category']); ?></td>
                            <td><?php echo htmlspecialchars($item['desc_category_product']); ?></td>
                            <td class="action-links">
                                <a href="/web_perfume/category/editcategory/<?php echo $item['id_category_product']; ?>" class="edit-link">
                    <i class="fas fa-edit"></i> Sửa
                </a>
                
                <a href="/web_perfume/category/deletecategory/<?php echo $item['id_category_product']; ?>" 
                   class="delete-link"
                   onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                   <i class="fas fa-trash-alt"></i> Xóa
                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">Không có danh mục nào.</td>
                        </tr>
                    <?php
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>