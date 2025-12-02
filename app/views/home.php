<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: { primary: "#000000", secondary: "#f0f0f0" },
          fontFamily: { display: "Playfair Display", body: "Manrope" }
        }
      }
    }
</script>

<section class="hero-slider-area">
    <div class="slide-item active" style="background-image: url('<?php echo BASE_URL; ?>/public/images/banners/banner1.jpg');">
        <div class="slide-overlay"></div>
        <div class="container">
            <div class="slide-content">
                <span class="slide-subtitle">Bộ sưu tập 2025</span>
                <h1 class="slide-title">Tuyệt Tác <br> Hương Thơm</h1>
                <p class="slide-desc">Khám phá những nốt hương tinh tế được chế tác thủ công.</p>
                <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-hero-buy">
                   Mua ngay <i class="material-icons" style="font-size: 14px; vertical-align: middle;">arrow_forward</i>
                </a>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('<?php echo BASE_URL; ?>/public/images/banners/banner2.jpg');">
        <div class="slide-overlay"></div>
        <div class="container">
            <div class="slide-content">
                <span class="slide-subtitle">Mùa Hè Rực Rỡ</span>
                <h1 class="slide-title">Thanh Khiết & <br> Tươi Mát</h1>
                <p class="slide-desc">Cảm hứng từ những khu vườn Địa Trung Hải.</p>
                <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-hero-buy">Mua ngay <i class="material-icons" style="font-size: 14px; vertical-align: middle;">arrow_forward</i></a>
            </div>
        </div>
    </div>
    <div class="slide-item" style="background-image: url('<?php echo BASE_URL; ?>/public/images/banners/banner3.jpg');">
        <div class="slide-overlay"></div>
        <div class="container">
            <div class="slide-content">
                <span class="slide-subtitle">Đẳng Cấp Quý Ông</span>
                <h1 class="slide-title">Mạnh Mẽ & <br> Lịch Lãm</h1>
                <p class="slide-desc">Những nốt hương gỗ trầm ấm, đại diện cho bản lĩnh.</p>
                <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-hero-buy">Mua ngay <i class="material-icons" style="font-size: 14px; vertical-align: middle;">arrow_forward</i></a>
            </div>
        </div>
    </div>
    <div class="slider-dots">
        <span class="dot active" onclick="goToSlide(0)"></span>
        <span class="dot" onclick="goToSlide(1)"></span>
        <span class="dot" onclick="goToSlide(2)"></span>
    </div>
</section>

<div class="marquee-container">
    <div class="marquee-track">
        <div class="flex gap-24 items-center">
            <span class="marquee-item"><span class="material-icons">verified</span> Hàng chính Hãng 100%</span>
            <span class="marquee-item"><span class="material-icons">local_shipping</span> Giao hàng nhanh</span>
            <span class="marquee-item"><span class="material-icons">thumb_up</span> Đảm bảo chất lượng</span>
            <span class="marquee-item"><span class="material-icons">support_agent</span> Hỗ trợ 24/7</span>
            <span class="marquee-item"><span class="material-icons">shield</span> Bảo hành uy tín</span>
        </div>
        <div class="flex gap-24 items-center">
            <span class="marquee-item"><span class="material-icons">verified</span> Hàng chính Hãng 100%</span>
            <span class="marquee-item"><span class="material-icons">local_shipping</span> Giao hàng nhanh</span>
            <span class="marquee-item"><span class="material-icons">thumb_up</span> Đảm bảo chất lượng</span>
            <span class="marquee-item"><span class="material-icons">support_agent</span> Hỗ trợ 24/7</span>
            <span class="marquee-item"><span class="material-icons">shield</span> Bảo hành uy tín</span>
        </div>
    </div>
</div>

<main>
    <section class="story-section" style="padding: 80px 0; background: linear-gradient(to bottom, #f9f8f6 58%, #ffffff 58%);">
        <div class="container">
            <?php if(isset($random_products) && !empty($random_products)): $default_prod = $random_products[0]; ?>
            <div class="grid md:grid-cols-2 gap-20 items-center">
                <div class="relative flex justify-center items-center h-[450px]">
                    <div class="absolute w-[60%] h-[60%] bg-white rounded-full blur-[60px] opacity-60 z-0"></div>
                    <img id="spotlight-img" src="<?php echo BASE_URL ?>/img/<?php echo $default_prod['image'] ?>" alt="<?php echo $default_prod['title_product'] ?>" class="relative z-10 w-auto h-full object-contain transition-transform duration-500 hover:scale-105" style="mix-blend-mode: multiply; filter: drop-shadow(0 20px 20px rgba(0,0,0,0.15));"> 
                </div>
                <div class="text-left pl-0 md:pl-10 pt-5 md:pt-0 relative">
                    <span class="text-xs font-bold tracking-[0.2em] text-gray-400 uppercase mb-3 block">Sản phẩm nổi bật</span>
                    <h2 id="spotlight-title" class="text-6xl font-display text-black mb-6 leading-tight tracking-wide" style="font-weight: 500;">
                        <?php echo $default_prod['title_product'] ?>
                    </h2>
                    <p id="spotlight-desc" class="text-gray-500 text-base leading-relaxed mb-10 font-body max-w-lg">
                        <?php echo $default_prod['desc_product']; ?>
                    </p>
                    <a id="spotlight-link" href="<?php echo BASE_URL ?>/product/detail/<?php echo $default_prod['id_product'] ?>" class="btn-pill-outline mb-20 inline-flex items-center bg-transparent hover:bg-black hover:text-white transition-all">
                        Mua ngay <span class="ml-2 text-xl">→</span>
                    </a>
                    <div class="pt-4 relative" style="margin-top: 10px;">
                        <div class="absolute top-0 left-0 w-16 h-[2px] bg-black"></div>
                        <div class="flex gap-10 mt-6">
                            <?php foreach($random_products as $index => $rnd): ?>
                                <div class="thumb-item group <?php echo ($index == 0) ? 'active' : ''; ?>" onclick="changeSpotlight(this)" data-id="<?php echo $rnd['id_product'] ?>" data-img="<?php echo BASE_URL ?>/img/<?php echo $rnd['image'] ?>" data-title="<?php echo $rnd['title_product'] ?>" data-desc="<?php echo htmlspecialchars($rnd['desc_product']); ?>">
                                    <div class="w-16 h-20 mb-3 flex items-center justify-center transition-transform duration-300 group-hover:-translate-y-1">
                                        <img src="<?php echo BASE_URL ?>/img/<?php echo $rnd['image'] ?>" class="max-w-full max-h-full object-contain mix-blend-multiply opacity-60 group-hover:opacity-100 transition-opacity" style="mix-blend-mode: multiply;">
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-gray-300 group-hover:text-black transition-colors block text-center truncate w-20">
                                        <?php $names = explode(' ', $rnd['title_product']); echo isset($names[0]) ? $names[0] : 'PERFUME'; ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <p style="text-align: center;">Đang cập nhật sản phẩm...</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="pb-24">
        <div class="container">
            <div class="section-title"><h2>Bộ Sưu Tập</h2></div>
            <div class="grid md:grid-cols-3 gap-8">
                
                <div class="collection-item">
                    <img src="<?php echo BASE_URL; ?>/public/images/banners/banner1.jpg" alt="Nuoc hoa nu">
                    <div class="collection-content">
                        <h3>Nước Hoa Nữ</h3>
                        <a href="<?php echo BASE_URL; ?>/product/collection?category=1" class="btn-underline">Xem Ngay</a>
                    </div>
                </div>

                <div class="collection-item">
                    <img src="<?php echo BASE_URL; ?>/public/images/banners/banner2.jpg" alt="Nuoc hoa unisex">
                    <div class="collection-content">
                        <h3>Unisex</h3>
                        <a href="<?php echo BASE_URL; ?>/product/collection?category=2" class="btn-underline">Xem Ngay</a>
                    </div>
                </div>

                <div class="collection-item">
                    <img src="<?php echo BASE_URL; ?>/public/images/banners/banner3.jpg" alt="Nuoc hoa nam">
                    <div class="collection-content">
                        <h3>Nước Hoa Nam</h3>
                        <a href="<?php echo BASE_URL; ?>/product/collection?category=3" class="btn-underline">Xem Ngay</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 bg-white relative">
        <div class="container">
            <div class="section-title"><h2>Sản Phẩm Bán Chạy</h2></div>
            <div class="swiper bestSellerSwiper px-4 md:px-8 pb-12">
                <div class="swiper-wrapper">
                    <?php if(isset($product_home) && !empty($product_home)): ?>
                        <?php foreach($product_home as $pro): ?>
                        <div class="swiper-slide">
                            <div class="product-card-luxury group">
                                <div class="product-image-box">
                                    <span class="brand-tag">KD PERFUME</span>
                                    <img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" alt="<?php echo $pro['title_product'] ?>" class="product-img-main">
                                    <div class="overlay-hover">
                                        <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>" class="btn-view-detail">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="product-info-box">
                                    <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>" class="product-title-link"><?php echo $pro['title_product'] ?></a>
                                    <p class="product-price-text"><?php echo number_format($pro['price_product'], 0, ',', '.') ?> ₫</p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            
            <div class="flex justify-center mt-10">
                <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-hero-buy" style="background: #000; color: #fff; border: 1px solid #000;">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="container text-center max-w-4xl mx-auto">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 80px; opacity: 0.05; font-weight: 700; margin-bottom: -40px; position: relative; z-index: 0;">KDPERFUME</h2>
            <h3 style="font-family: 'Playfair Display', serif; font-size: 36px; font-weight: 700; position: relative; z-index: 1; margin-bottom: 30px;">Về Chúng Tôi</h3>
            <p style="color: #666; font-size: 16px; line-height: 1.8; margin-bottom: 30px;">
                Sứ mệnh của <b>KD Perfume</b> chính là việc kiến tạo một thương hiệu uy tín...
            </p>
            <a href="#" style="font-weight: 600; border-bottom: 2px solid #000; padding-bottom: 2px;">Đọc thêm về câu chuyện</a>
        </div>
    </section>
</main>

<script>
    // Logic Spotlight (Giữ nguyên)
    function changeSpotlight(element) {
        const id = element.getAttribute('data-id');
        const img = element.getAttribute('data-img');
        const title = element.getAttribute('data-title');
        const desc = element.getAttribute('data-desc');
        const baseUrl = '<?php echo BASE_URL; ?>';
        const mainImg = document.getElementById('spotlight-img');
        const mainTitle = document.getElementById('spotlight-title');
        const mainDesc = document.getElementById('spotlight-desc');
        const mainLink = document.getElementById('spotlight-link');

        mainImg.style.opacity = 0; mainTitle.style.opacity = 0; mainDesc.style.opacity = 0;
        mainImg.style.transform = "translateY(10px) scale(0.95)"; mainTitle.style.transform = "translateY(10px)";

        setTimeout(() => {
            mainImg.src = img; mainTitle.innerText = title; mainDesc.innerText = desc;
            mainLink.href = baseUrl + '/product/detail/' + id;
            mainImg.style.opacity = 1; mainTitle.style.opacity = 1; mainDesc.style.opacity = 1;
            mainImg.style.transform = "translateY(0) scale(1)"; mainTitle.style.transform = "translateY(0)";
        }, 300);
        document.querySelectorAll('.thumb-item').forEach(el => el.classList.remove('active'));
        element.classList.add('active');
    }

    // Logic Hero Slider
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.dot');
    const intervalTime = 6000; 
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        if (index >= slides.length) currentSlideIndex = 0;
        else if (index < 0) currentSlideIndex = slides.length - 1;
        else currentSlideIndex = index;
        slides[currentSlideIndex].classList.add('active');
        dots[currentSlideIndex].classList.add('active');
    }
    function nextSlide() { showSlide(currentSlideIndex + 1); }
    function goToSlide(index) { showSlide(index); resetTimer(); }
    let slideInterval = setInterval(nextSlide, intervalTime);
    function resetTimer() { clearInterval(slideInterval); slideInterval = setInterval(nextSlide, intervalTime); }

    // Logic Best Seller
    var swiper = new Swiper(".bestSellerSwiper", {
        slidesPerView: 1, spaceBetween: 20, loop: true, 
        autoplay: { delay: 3500, disableOnInteraction: false },
        pagination: { el: ".swiper-pagination", clickable: true, dynamicBullets: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 4 } },
    });
</script>