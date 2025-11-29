<section class="hero-slider-area">
    <div class="slider-container">
        
        
        <div class="slide-item active" style="background-image: url('/web_perfume/public/images/banners/banner1.jpg');">
            <div class="overlay"></div> 
            <div class="container">
                <div class="slide-content">
                    <h2 class="slide-subtitle fadeInUp" style="animation-delay: 0.2s;">Bộ sưu tập độc quyền</h2>
                    <h1 class="slide-title fadeInUp" style="animation-delay: 0.4s;">Hương Thơm Của Sự Quyến Rũ</h1>
                    <p class="slide-desc fadeInUp" style="animation-delay: 0.6s;">
                        Khám phá những nốt hương tinh tế được chế tác thủ công, đánh thức mọi giác quan và khẳng định đẳng cấp của bạn.
                    </p>
                    <a href="/web_perfume/product" class="btn-hero fadeInUp" style="animation-delay: 0.8s;">Mua ngay</a>
                </div>
            </div>
        </div>

        
        <div class="slide-item" style="background-image: url('/web_perfume/public/images/banners/banner2.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="slide-content">
                    <h2 class="slide-subtitle">Mùa Hè Rực Rỡ</h2>
                    <h1 class="slide-title">Thanh Khiết & Tươi Mát</h1>
                    <p class="slide-desc">Lấy cảm hứng từ những khu vườn Địa Trung Hải ngập nắng, mang lại cảm giác sảng khoái bất tận.</p>
                    <a href="/web_perfume/product" class="btn-hero">Xem bộ sưu tập</a>
                </div>
            </div>
        </div>
        
        
        <div class="slide-item" style="background-image: url('/web_perfume/public/images/banners/banner3.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="slide-content">
                    <h2 class="slide-subtitle">Phong Cách Quý Ông</h2>
                    <h1 class="slide-title">Mạnh Mẽ & Lịch Lãm</h1>
                    <p class="slide-desc">Những mùi hương gỗ trầm ấm, đại diện cho sự thành đạt và bản lĩnh phái mạnh.</p>
                    <a href="/web_perfume/product" class="btn-hero">Khám phá ngay</a>
                </div>
            </div>
        </div>

    </div>

    <div class="slider-dots">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</section>

<section class="featured-products">
    <div class="container">
        <div class="section-title">
            <h2>Sản phẩm nổi bật</h2>
            <p>Tuyệt tác hương thơm dành cho bạn</p>
        </div>

        <div class="product-grid">
            <?php
            // Kiểm tra xem có dữ liệu sản phẩm không
            if(isset($product_home) && !empty($product_home)){
                foreach($product_home as $key => $pro){
            ?>
            
            <div class="product-item">
                <div class="product-img">
                    <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>">
                        <img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" alt="<?php echo $pro['title_product'] ?>">
                    </a>
                    
                    <div class="product-actions">
                        <form action="<?php echo BASE_URL ?>/cart/add" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $pro['id_product'] ?>">
                            <button type="submit" class="action-btn" title="Thêm vào giỏ">
                                <i class="fas fa-shopping-bag"></i>
                            </button>
                        </form>
                        <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>" class="action-btn" title="Xem chi tiết">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>

                <div class="product-info">
                    <span class="product-category">Dung tích: <?php echo $pro['capacity'] ?></span>
                    <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>" class="product-name">
                        <?php echo $pro['title_product'] ?>
                    </a>
                    <div class="product-price">
                        <?php echo number_format($pro['price_product'], 0, ',', '.') ?>đ
                    </div>
                </div>
            </div>
            <?php
                } // End foreach
            } else {
                echo '<p style="text-align:center; width:100%;">Chưa có sản phẩm nào được cập nhật.</p>';
            }
            ?>
        </div>
    </div>
</section>

<script>
    
    let slideIndex = 0;
    let slideInterval;
    const slides = document.getElementsByClassName("slide-item");
    const dots = document.getElementsByClassName("dot");
    const slideDelay = 6000; 

    function startAutoSlide() {
        slideInterval = setInterval(() => changeSlide(1), slideDelay);
    }
    function stopAutoSlide() { clearInterval(slideInterval); }

    function showSlides(n) {
        if (n >= slides.length) slideIndex = 0;
        if (n < 0) slideIndex = slides.length - 1;
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
            dots[i].classList.remove("active");
        }
        slides[slideIndex].classList.add("active");
        dots[slideIndex].classList.add("active");
    }

    function changeSlide(n) {
        slideIndex += n;
        showSlides(slideIndex);
    }
    function currentSlide(n) {
        stopAutoSlide();
        slideIndex = n - 1;
        showSlides(slideIndex);
        startAutoSlide();
    }
    showSlides(slideIndex);
    startAutoSlide();
</script>

<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}
.fadeInUp { opacity: 0; animation: fadeInUp 1s cubic-bezier(0.25, 1, 0.5, 1) forwards; }
</style>