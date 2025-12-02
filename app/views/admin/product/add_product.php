<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="font-weight-bold">Thêm Sản Phẩm Mới</h3>
                    <a href="<?php echo BASE_URL ?>/product/list_product" class="btn btn-light btn-sm">
                        <i class="ti-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Start -->
        <form action="<?php echo BASE_URL ?>/product/insert_product" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- LEFT COLUMN: Main Info -->
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin chung</h4>
                            
                            <div class="form-group">
                                <label for="title_product">Tên sản phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title_product" id="title_product" placeholder="Nhập tên sản phẩm..." required>
                            </div>

                            <div class="form-group">
                                <label for="desc_product">Mô tả chi tiết</label>
                                <textarea class="form-control" name="desc_product" id="desc_product" rows="10" placeholder="Mô tả về hương thơm, thành phần..."></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_product">Giá bán (VNĐ) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="price_product" id="price_product" placeholder="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity_product">Số lượng kho</label>
                                        <input type="number" class="form-control" name="quantity_product" id="quantity_product" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Attributes & Image -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hình ảnh & Phân loại</h4>

                            <!-- Image Upload with Preview -->
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <div class="image-preview-container" onclick="document.getElementById('image_product').click()">
                                    <img id="preview_img" src="#" alt="Preview" style="display: none;">
                                    <div id="preview_placeholder" class="image-preview-text">
                                        <i class="ti-cloud-up display-4"></i><br>
                                        <span class="mt-2 d-block font-weight-bold">Nhấn để tải ảnh lên</span>
                                    </div>
                                </div>
                                <input type="file" name="image_product" id="image_product" class="file-upload-default" style="display: none;" onchange="previewImage(this)">
                            </div>

                            <div class="form-group">
                                <label for="category_product">Danh mục</label>
                                <select class="form-control" name="category_product" id="category_product">
                                    <?php if(isset($category) && !empty($category)): ?>
                                        <?php foreach($category as $key => $cate): ?>
                                            <option value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brand">Thương hiệu</label>
                                <input type="text" class="form-control" name="brand" id="brand" placeholder="Ví dụ: Dior, Chanel...">
                            </div>

                            <div class="form-group">
                                <label for="scent">Nhóm hương (Mùi hương)</label>
                                <input type="text" class="form-control" name="scent" id="scent" placeholder="Ví dụ: Hương gỗ, Hương hoa...">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Giới tính</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Unisex">Unisex</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="volume">Dung tích</label>
                                        <input type="text" class="form-control" name="volume" id="volume" placeholder="100ml">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Hidden input for hot product if needed, default 0 -->
                            <input type="hidden" name="hot_product" value="0">

                            <button type="submit" class="btn btn-primary-custom btn-block mt-3">Lưu sản phẩm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Simple JS for Image Preview -->
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_img').src = e.target.result;
                    document.getElementById('preview_img').style.display = 'block';
                    document.getElementById('preview_placeholder').style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>