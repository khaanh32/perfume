<?php
// Lấy biến productbyid đã truyền từ Controller
$pro = $productbyid; 
?>

<h3 style="text-align: center;">Cập Nhật Sản Phẩm</h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title_product">Tên sản phẩm</label>
            <input type="text" name="title_product" class="form-control" value="<?php echo $pro['title_product'] ?>">
        </div>

        <div class="form-group">
            <label for="price_product">Giá sản phẩm</label>
            <input type="text" name="price_product" class="form-control" value="<?php echo $pro['price_product'] ?>">
        </div>

        <div class="form-group">
            <label for="quantity">Số Lượng</label>
            <input type="text" name="quantity" class="form-control" value="<?php echo $pro['quantity'] ?>">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="capacity">Dung tích</label>
                    <input type="text" name="capacity" class="form-control" value="<?php echo $pro['capacity'] ?? '' ?>">
                </div>
            </div>
           
        </div>

        <div class="form-group">
            <label for="image">Hình Ảnh Sản Phẩm</label>
            <input type="file" name="image" class="form-control">
            <p>Ảnh hiện tại:</p>
            <img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" height="100" width="100">
        </div>

        <div class="form-group">
            <label for="desc_product">Miêu Tả Sản Phẩm</label>
            <textarea name="desc_product" rows="5" style="resize: none" class="form-control"><?php echo $pro['desc_product'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Giới tính</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam" <?php if($pro['gender']=='Nam'){echo 'checked';} ?>>
                <label class="form-check-label">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ" <?php if($pro['gender']=='Nữ'){echo 'checked';} ?>>
                <label class="form-check-label">Nữ</label>
            </div>
        </div>

        <div class="form-group">
            <label for="id_category_product">Danh Mục Sản Phẩm</label>
            <select class="form-control" name="id_category_product">
                <?php foreach($category as $cate){ ?>
                    <option <?php if($cate['id_category_product']==$pro['id_category_product']){echo 'selected';} ?> value="<?= $cate['id_category_product'] ?>">
                        <?= $cate['title_category'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_brand">Thương Hiệu</label>
            <select class="form-control" name="id_brand">
                <?php foreach($brand as $brnd){ ?>
                    <option <?php if($brnd['id_brand']==$pro['id_brand']){echo 'selected';} ?> value="<?= $brnd['id_brand'] ?>">
                        <?= $brnd['brand_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_scent">Mùi Hương</label>
            <select class="form-control" name="id_scent">
                <option value="1" <?php if($pro['id_scent']==1){echo 'selected';} ?>>1</option>
                <option value="2" <?php if($pro['id_scent']==2){echo 'selected';} ?>>2</option>
                <option value="3" <?php if($pro['id_scent']==3){echo 'selected';} ?>>3</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>

    </form>
</div>