<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <?php
    // Lấy thông tin sản phẩm từ mảng data
    foreach($product_details as $key => $value){
        $name = $value['title_product'];
        $price = $value['price_product'];
        $img = $value['image'];
        $desc = $value['desc_product'];
        $capacity = $value['capacity'];
    ?>
    <div class="row">
        <div class="col-md-5">
            <img src="<?php echo BASE_URL ?>/img/<?php echo $img ?>" width="100%" style="border-radius: 8px;">
        </div>

        <div class="col-md-7">
            <h2 style="font-family: 'Playfair Display', serif;"><?php echo $name ?></h2>
            <p style="color: #666;">Thương hiệu: Chanel </p>
            
            <h3 style="color: #d4a574; font-weight: bold; margin: 20px 0;">
                <?php echo number_format($price, 0, ',', '.') ?>đ
            </h3>

            <div style="margin-bottom: 20px;">
                <p><strong>Dung tích:</strong></p>
                <div style="display: flex; gap: 10px;">
                    <button class="btn btn-dark" disabled><?php echo $capacity ?></button>

                    <?php 
                    if(isset($variants) && !empty($variants)){
                        foreach($variants as $var){
                    ?>
                        <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $var['id_product'] ?>" class="btn btn-outline-dark">
                            <?php echo $var['capacity'] ?>
                        </a>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>

            <p><?php echo $desc ?></p>

            <form action="<?php echo BASE_URL ?>/cart/add" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $value['id_product'] ?>">
                <button type="submit" class="btn btn-black" style="width: 200px; margin-top: 20px;">THÊM VÀO GIỎ</button>
            </form>
        </div>
    </div>
    <?php } ?>
</div>