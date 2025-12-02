<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KD Perfume - Nước hoa chính hãng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <?php
        $base_url = dirname($_SERVER['SCRIPT_NAME']);
        $base_url = str_replace('\\', '/', $base_url); 
        $base_url = rtrim($base_url, '/'); 
    ?>

    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/login-register-style.css?v=<?php echo time(); ?>">

<link rel="stylesheet" href="<?php echo $base_url; ?>/public/react-dist/auth-style.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        $current_uri = $_SERVER['REQUEST_URI'];
        $is_homepage = (
            $current_uri == $base_url . '/' || 
            $current_uri == $base_url . '/index.php' || 
            $current_uri == $base_url . '/home'
        );
        
        $header_class = $is_homepage ? 'is-homepage' : 'is-internal scrolled';
    ?>
    
    <header id="main-header" class="<?php echo $header_class; ?>">
        <div class="container header-container">
            
            <div class="logo">
                <a href="<?php echo $base_url; ?>/">KD <span style="font-weight: 400; font-size: 0.7em; font-style: italic; font-family: 'Manrope', sans-serif;">Perfume</span></a>
            </div>

            <nav class="main-nav">
                <ul>
                    <li><a href="<?php echo $base_url; ?>/">Trang chủ</a></li>
                    <li><a href="#">Về chúng tôi</a></li>
                    
                    <li class="has-dropdown">
<a href="<?php echo $base_url; ?>/product/collection">Bộ sưu tập nước hoa<i class="fas fa-chevron-down"></i></a>                       
                 <ul class="dropdown-menu">
    <?php 
    if(isset($categories) && is_array($categories)){
        foreach($categories as $cate){
            ?>
            <li>
                <a href="<?php echo $base_url; ?>/product/collection?category=<?php echo $cate['id_category_product'] ?>">
                    <?php echo $cate['title_category'] ?>
                </a>
            </li>
            <?php
        }
    }
    ?>
</ul>
                    </li>

                    <li class="has-dropdown">
                        <a href="#">Thương hiệu <i class="fas fa-chevron-down"></i></a>
                        
                    </li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>

            <div class="header-icons">
                <a href="#" title="Tìm kiếm"><i class="fas fa-search"></i></a>
                
                <a href="<?php echo $base_url; ?>/cart" style="position: relative;" title="Giỏ hàng">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count">0</span>
                </a>

        <div class="user-menu-container">
                <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                <?php 
            // Xử lý lấy ảnh avatar
            // Giả sử bạn đã lưu customer_image vào session khi login, hoặc lấy mặc định
            $user_name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : 'Bạn';
            
            // Logic lấy ảnh: Nếu có trong DB (đã lưu vào session hoặc query lại) thì dùng, không thì dùng ảnh mặc định
            // Lưu ý: Để tối ưu, tốt nhất lúc Login bạn nên lưu customer_image vào $_SESSION['customer_image']
            $user_avatar = '/web_perfume/public/images/default-user.png'; // Ảnh mặc định
            if(isset($_SESSION['customer_image']) && !empty($_SESSION['customer_image'])){
                $user_avatar = '/web_perfume/public/uploads/avatar/' . $_SESSION['customer_image'];
            }
        ?>
        
        <div class="header-user-btn" onclick="openProfileModal()">
            <img src="<?php echo $user_avatar; ?>" alt="Avatar" class="header-user-avatar">
            <span class="header-user-name"><?php echo htmlspecialchars($user_name); ?></span>
            
        </div>

    <?php else: ?>
        <a href="javascript:void(0);" onclick="openAuthModal('login')" title="Đăng nhập">
            <i class="far fa-user"></i>
        </a>
    <?php endif; ?>
</div>

<script>
    function openAuthModal(tabName) {
        // Tạo Custom Event để báo cho React biết hãy mở Popup
        const event = new CustomEvent('open-auth-modal', { detail: { tab: tabName } });
        window.dispatchEvent(event);
    }
</script>
                </div>
            </div>
        </div>
    </header>

    <script>
        var header = document.getElementById("main-header");
        if (header.classList.contains('is-homepage')) {
            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        }
    </script>