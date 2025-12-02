<div class="product-detail-wrapper">
    <?php
    // BẮT ĐẦU LOGIC PHP (GIỮ NGUYÊN)
    if (isset($product_details) && !empty($product_details)) {
        $prod = $product_details[0]; 
        
        $id = $prod['id_product'];
        $title = $prod['title_product'];
        $price = $prod['price_product'];
        $desc = $prod['desc_product'];
        $gender = $prod['gender'];
        $qty_db = $prod['quantity'];
        $capacity = $prod['capacity'];
        $image = $prod['image'];
        
        // Brand name
        $brand_name = isset($prod['brand_name']) ? $prod['brand_name'] : 'KD PERFUME'; 
        
        // Trạng thái tồn kho
        $is_in_stock = ($qty_db > 0);
    ?>

    <div class="container">
        <nav class="pd-breadcrumb">
            <a href="<?php echo BASE_URL ?>/">Trang chủ</a>
            <span class="sep"><i class="fas fa-chevron-right"></i></span>
            <a href="<?php echo BASE_URL ?>/product/collection">Nước hoa</a>
            <span class="sep"><i class="fas fa-chevron-right"></i></span>
            <span class="current"><?php echo htmlspecialchars($title); ?></span>
        </nav>
    </div>

    <div class="container pd-container">
        <div class="pd-layout-top">
            
            <div class="pd-gallery-section">
                <div class="pd-main-image-box">
                    <img src="<?php echo BASE_URL ?>/img/<?php echo $image ?>" 
                         alt="<?php echo htmlspecialchars($title); ?>" 
                         id="mainImage" 
                         class="pd-main-img">
                </div>
                
            </div>

            <div class="pd-info-section">
                
                <h1 class="pd-title"><?php echo htmlspecialchars($title); ?></h1>
                
                <div class="pd-meta-row">
                    <span class="pd-meta-item">Thương hiệu: <strong><?php echo $brand_name; ?></strong></span>
                    <span class="pd-meta-sep">|</span>
                    <span class="pd-meta-item">SKU: <strong><?php echo $title; ?></strong></span>
                    <span class="pd-meta-sep">|</span>
                    <span class="pd-status <?php echo $is_in_stock ? 'in-stock' : 'out-stock'; ?>">
                        <?php echo $is_in_stock ? 'Còn hàng' : 'Hết hàng'; ?>
                    </span>
                </div>

                <div class="pd-price-box">
                    <?php echo number_format($price, 0, ',', '.'); ?> ₫
                </div>

                <form action="<?php echo BASE_URL ?>/cart/add" method="POST" id="addToCartForm">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    
                    <div class="pd-option-row">
    <label>Dung tích</label>
    <div class="pd-option-values">
        <span class="opt-btn active"><?php echo $capacity; ?> ml</span>
        
        <?php if(isset($variants) && !empty($variants)): ?>
            <?php foreach($variants as $var): ?>
                <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $var['id_product'] ?>" class="opt-btn">
                    <?php echo $var['capacity'] ?> ml
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

                    <?php if($is_in_stock): ?>
                    <div class="pd-option-row">
                        <label>Số lượng</label>
                        <div class="qty-wrapper">
                            <button type="button" class="qty-btn" onclick="updateQty(-1)">-</button>
                            <input type="number" name="quantity" id="qtyInput" value="1" min="1" max="<?php echo $qty_db; ?>" readonly>
                            <button type="button" class="qty-btn" onclick="updateQty(1)">+</button>
                        </div>
                    </div>

                    <div class="pd-actions-row">
                        <button type="submit" class="btn-action btn-buy-now" onclick="setBuyNowAction(event)">
                            Mua ngay
                        </button>
                        <button type="submit" class="btn-action btn-add-cart">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                    <?php else: ?>
                        <div class="out-of-stock-msg">Sản phẩm hiện đang tạm hết hàng.</div>
                    <?php endif; ?>
                </form>

                <div class="pd-contact-share">
                    <div class="contact-left">
                        <a href="https://zalo.me/0589506666" target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1200px-Icon_of_Zalo.svg.png" width="20" style="vertical-align:middle;"> Zalo
                        </a>
                        <span class="sep">|</span>
                        <a href="#"><i class="fab fa-facebook-messenger"></i> Fanpage</a>
                        <span class="sep">|</span>
                        <a href="tel:0589506666"><i class="fas fa-phone-alt"></i> 058 950 6666</a>
                    </div>
                    <div class="share-right">
                        <span>Chia sẻ:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>
                    </div>
                </div>

                <div class="pd-specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon"><i class="fas fa-spray-can"></i></div>
                        <div class="spec-text">
                            <strong>Thương hiệu</strong>
                            <span><?php echo $brand_name; ?></span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon"><i class="fas fa-flask"></i></div>
                        <div class="spec-text">
                            <strong>Nồng độ</strong>
                            <span>Eau de Parfum</span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon"><i class="fas fa-wind"></i></div>
                        <div class="spec-text">
                            <strong>Độ tỏa hương</strong>
                            <span>1 sải tay</span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon"><i class="far fa-clock"></i></div>
                        <div class="spec-text">
                            <strong>Độ lưu hương</strong>
                            <span>6 - 8h</span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon"><i class="fas fa-venus-mars"></i></div>
                        <div class="spec-text">
                            <strong>Giới tính</strong>
                            <span><?php echo $gender; ?></span>
                        </div>
                    </div>
                </div>

            </div> </div>

        <div class="pd-bottom-layout">
            
            <div class="pd-content-left">
                <div class="pd-tabs-nav">
                    <div class="tab-item active" onclick="openTab(event, 'desc')">Mô tả sản phẩm</div>
                    <div class="tab-item" onclick="openTab(event, 'usage')">Sử dụng và bảo quản</div>
                    <div class="tab-item" onclick="openTab(event, 'policy')">Chính sách</div>
                </div>

                <div class="tab-pane active" id="desc">
                    <table class="specs-table">
                        <tbody>
                            <tr>
                                <td class="spec-label">Thương hiệu</td>
                                <td class="spec-value"><?php echo $brand_name; ?></td>
                            </tr>
                            
                            <tr>
                                <td class="spec-label">Giới tính</td>
                                <td class="spec-value"><?php echo $gender; ?></td>
                            </tr>
                            <tr>
                                <td class="spec-label">Nồng độ</td>
                                <td class="spec-value">Eau de Parfum (EDP)</td>
                            </tr>
                            <tr>
                                <td class="spec-label">Dung tích</td>
                                <td class="spec-value"><?php echo $capacity; ?></td>
                            </tr>
                            <tr>
                                <td class="spec-label">Độ lưu hương</td>
                                <td class="spec-value">6 - 8 tiếng</td>
                            </tr>
                            <tr>
                                <td class="spec-label">Độ toả hương</td>
                                <td class="spec-value">1 cánh tay</td>
                            </tr>
                            <tr>
                                <td class="spec-label">Nhóm hương</td>
                                <td class="spec-value">Hương gỗ, Hoa cỏ</td>
                            </tr>
                        </tbody>
                    </table>

                   
                </div>

                <div class="tab-pane" id="usage" style="display:none;">
                    <div class="desc-text">
                        <p><strong>Cách sử dụng:</strong> Xịt nước hoa vào các điểm mạch (cổ tay, sau gáy, khuỷu tay) để lưu hương lâu nhất. Tránh chà xát sau khi xịt.</p>
                        <p><strong>Bảo quản:</strong> Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao.</p>
                    </div>
                </div>

                <div class="tab-pane" id="policy" style="display:none;">
                    <div class="desc-text">
                        <p>1. Đổi trả miễn phí trong vòng 7 ngày nếu sản phẩm lỗi do nhà sản xuất.</p>
                        <p>2. Cam kết hàng chính hãng 100%, hoàn tiền gấp đôi nếu phát hiện hàng giả.</p>
                    </div>
                </div>
            </div>

            <div class="pd-sidebar-right">
                <div class="policy-box">
                    <div class="policy-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="policy-text">
                        <h4>Chính hãng 100%</h4>
                        <p>Cam kết sản phẩm chính hãng 100%</p>
                    </div>
                </div>
                <div class="policy-box">
                    <div class="policy-icon"><i class="fas fa-shipping-fast"></i></div>
                    <div class="policy-text">
                        <h4>Chính sách đổi trả</h4>
                        <p>Chính sách đổi hàng và tích điểm thành viên</p>
                    </div>
                </div>
                <div class="policy-box">
                    <div class="policy-icon"><i class="fas fa-headset"></i></div>
                    <div class="policy-text">
                        <h4>Tư vấn & hỗ trợ</h4>
                        <p>Tư vấn và hỗ trợ gói quà miễn phí</p>
                    </div>
                </div>
            </div>

        </div> </div>
    <?php } else { echo '<div class="container text-center py-5">Sản phẩm không tồn tại</div>'; } ?>
</div>

<script>
    function updateQty(change) {
        const input = document.getElementById('qtyInput');
        if(!input) return;
        let val = parseInt(input.value) + change;
        let max = parseInt(input.getAttribute('max'));
        if (val < 1) val = 1;
        if (val > max) { val = max; alert('Đã đạt giới hạn số lượng tồn kho!'); }
        input.value = val;
    }

    function changeImage(el, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumb-item').forEach(i => i.classList.remove('active'));
        el.classList.add('active');
    }

    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-pane");
        for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; }
        tablinks = document.getElementsByClassName("tab-item");
        for (i = 0; i < tablinks.length; i++) { tablinks[i].className = tablinks[i].className.replace(" active", ""); }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function setBuyNowAction(e) {
        // Logic mua ngay
    }
</script>