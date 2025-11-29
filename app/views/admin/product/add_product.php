<?php
// Hiển thị thông báo nếu có
if (isset($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    if (is_array($msg)) {
        foreach ($msg as $value) {
            $color = (strpos($value, 'thành công') !== false) ? 'green' : 'red';
            echo "<span style=\"color:$color;font-weight:bold\">$value</span><br>";
        }
    }
}
?>

<h3 style="text-align: center;">Thêm sản phẩm</h3>
<div class="col-md-6">
    <form action="index.php?url=product/insert_product" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title_product">Tên sản phẩm</label>
            <input type="text" name="title_product" class="form-control">
        </div>

        <div class="form-group">
            <label for="price_product">Giá sản phẩm</label>
            <input type="text" name="price_product" class="form-control">
        </div>

        <div class="form-group">
            <label for="desc_product">Miêu Tả Sản Phẩm</label>
            <textarea name="desc_product" rows="5" style="resize: none" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Giới tính</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam">
                <label class="form-check-label">Nam</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ">
                <label class="form-check-label">Nữ</label>
            </div>
        </div>

      <div class="form-group">
    <label for="quantity">Số Lượng</label>
    <input type="text" name="quantity" value="<?php echo $productbyid['quantity'] ?? ''; ?>" class="form-control">
</div>

<div class="form-group">
    <label for="capacity">Dung tích</label>
    <input type="text" name="capacity" value="<?php echo $productbyid['capacity'] ?? ''; ?>" class="form-control">
</div>

        <div class="form-group">
            <label for="image">Hình Ảnh Sản Phẩm</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="id_category_product">Danh Mục Sản Phẩm</label>
            <select class="form-control" name="id_category_product">
                <?php foreach($category as $cate){ ?>
                    <option value="<?= $cate['id_category_product'] ?>">
                        <?= $cate['title_category'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_brand">Thương Hiệu</label>
            <select class="form-control" name="id_brand">
                <?php foreach($brand as $brnd){ ?>
                    <option value="<?= $brnd['id_brand'] ?>">
                        <?= $brnd['brand_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_scent">Mùi Hương</label>
            <select class="form-control" name="id_scent">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <button type="submit" class="btn btn-default">Thêm sản phẩm</button>

    </form>
</div>
