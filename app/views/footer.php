<footer>
    <div class="container footer-container">
        
        <div>
            <h3>KD Perfume</h3>
            <p style="margin-bottom: 20px; font-size: 14px; color: #666; line-height: 1.8;">
                "Luxe - Art - Nostalgia". Sang trọng là bản chất. Nghệ thuật là hình thái. 
                Mỗi mùi hương là một tuyên ngôn thầm lặng dành cho người có gu sống riêng biệt.
            </p>
            <div style="display: flex; gap: 15px;">
                <a href="#" style="font-size: 18px;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="font-size: 18px;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="font-size: 18px;"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>

        <div>
            <h3>Liên kết nhanh</h3>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>/">Trang chủ</a></li>
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="<?php echo BASE_URL; ?>/product">Cửa hàng</a></li>
                <li><a href="#">Tin tức</a></li>
            </ul>
        </div>

        <div>
            <h3>Sản phẩm</h3>
            <ul>
                <li><a href="#">Nước hoa Nam</a></li>
                <li><a href="#">Nước hoa Nữ</a></li>
                <li><a href="#">Unisex</a></li>
                <li><a href="#">Gift Set</a></li>
            </ul>
        </div>

        <div>
            <h3>Hệ thống cửa hàng</h3>
            <ul style="font-size: 14px; color: #666;">
                <li style="margin-bottom: 15px;">
                    <strong>TP. HỒ CHÍ MINH</strong><br>
                    123 Nguyễn Huệ, Quận 1
                </li>
                <li style="margin-bottom: 15px;">
                    <strong>HÀ NỘI</strong><br>
                    108 Phố Huế, Hai Bà Trưng
                </li>
                <li style="border-top: 1px solid #eee; padding-top: 15px; margin-top: 15px;">
                    <i class="fas fa-phone-alt" style="margin-right: 5px;"></i> 0909 123 456<br>
                    <i class="fas fa-envelope" style="margin-right: 5px;"></i> support@kdperfume.com
                </li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> KD Perfume. All rights reserved.</p>
        <p>Designed by You</p>
    </div>
</footer>

<div style="position: fixed; bottom: 30px; right: 30px; z-index: 99; display: flex; flex-direction: column; gap: 10px;">
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="width: 45px; height: 45px; border-radius: 50%; background: #000; color: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>

<?php 
    // Kiểm tra file tồn tại trước khi include để tránh lỗi
    if (file_exists('app/views/customer/profile.php')) {
        include_once 'app/views/customer/profile.php'; 
    }
?>

<div id="react-auth-modal-root"></div>

<script>
    // --- Logic đóng/mở Profile Modal (JS Thuần) ---
    function openProfileModal() { 
        const modal = document.getElementById('profileModal');
        if(modal) {
            modal.style.display = 'flex';
            // setTimeout để transition opacity hoạt động mượt mà
            setTimeout(() => { 
                modal.style.opacity = '1'; 
                modal.style.visibility = 'visible'; 
            }, 10);
        }
    }

    function closeProfileModal() { 
        const modal = document.getElementById('profileModal');
        if(modal) {
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
            setTimeout(() => { modal.style.display = 'none'; }, 300);
        }
    }
    
    // Đóng khi click ra ngoài vùng modal
    window.onclick = function(event) {
        const modal = document.getElementById('profileModal');
        if (event.target == modal) {
            closeProfileModal();
        }
    }

    // --- Logic mở React Auth Modal (Login/Register) ---
    function openAuthModal(tabName) {
        if (typeof CustomEvent !== 'undefined') {
            // Phát sự kiện để React Component (AuthModal.jsx) bắt được
            window.dispatchEvent(new CustomEvent('open-auth-modal', { detail: { tab: tabName } }));
        }
    }
</script>

<script type="module" src="/web_perfume/public/react-dist/auth-LR.js"></script>

</body>
</html>