<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>".$value."</span>";
    }
}
?>

<h3 style="text-align: center;">Liệt kê sản phẩm</h3>
<div class="col-md-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Dung tích</td>
                <td>Miêu Tả Sản Phẩm</td>
                <td>Giới Tính</td>
                <td>Số Lượng</td>
                <td>Hình ảnh</td>
                <td>Danh mục</td>
                <td>Thương hiệu</td>
                <td>Mùi Hương</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach($product as $key => $pro){
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $pro['title_product'] ?></td>
                <td><?php echo number_format($pro['price_product'], 0, ',', '.') ?></td>
                <td><?php echo $pro['capacity'] ?></td>
                <td><?php echo $pro['desc_product'] ?></td>
                <td><?php echo $pro['gender'] ?></td>
                <td><?php echo $pro['quantity'] ?></td>
                <td><img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" height="100" width="100"></td>
                <td><?php echo $pro['title_category'] ?></td>
                <td><?php echo $pro['id_brand'] ?></td>
                <td><?php echo $pro['id_scent'] ?></td>
               <td>
                    <a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>">Xoá</a> || 
                    <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>">Cập nhật</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
