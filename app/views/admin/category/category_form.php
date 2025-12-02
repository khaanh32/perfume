<?php
    
    if (isset($category_data) && !empty($category_data)) {
        
        $page_title = "Sửa Danh mục";
        $form_action = "/web_perfume/category/process_update/" . $category_data['id_category_product'];
        $title_value = $category_data['title_category'];
        $desc_value = $category_data['desc_category_product'];
        $button_text = "Cập nhật";
    } else {
        
        $page_title = "Thêm Danh mục mới";
        $form_action = "/web_perfume/category/process_insert";
        $title_value = "";
        $desc_value = "";
        $button_text = "Lưu";
    }
?>
<div class="admin-content">
    <div class="main-content-wrapper">
        <div class="content-tabs">
            <a href="/web_perfume/admin" class="tab-link"><i class="fas fa-chart-bar"></i> Tổng quan</a>
            <a href="/web_perfume/category/list_category" class="tab-link active"><i class="fas fa-list"></i> Quản lý Danh mục</a>
        </div>

        <div class="tab-content">
            <h2><?php echo $page_title; ?></h2>
            
            <div class="form-wrapper">
                <form action="<?php echo $form_action; ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="title">Tên Danh mục</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control"
                            value="<?php echo htmlspecialchars($title_value); ?>"
                            required
                            autofocus
                        >
                    </div>

                    <div class="form-group">
                        <label for="desc">Mô tả</label>
                        <textarea 
                            id="desc" 
                            name="desc" 
                            class="form-control"
                        ><?php echo htmlspecialchars($desc_value); ?></textarea>
                    </div>

                    <button type="submit" class="btn-submit"><?php echo $button_text; ?></button>
                    <a href="/web_perfume/category/list_category" class="form-back-link">Hủy</a>

                </form>
            </div>

        </div>
    </div>
</div>