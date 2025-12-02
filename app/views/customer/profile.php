<?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
    <?php 
        $modal_name  = $_SESSION['customer_name'] ?? '';
        $modal_email = $_SESSION['customer_email'] ?? '';
        $modal_phone = $_SESSION['customer_phone'] ?? ''; 
        $modal_addr  = $_SESSION['customer_address'] ?? '';
        
        $modal_img = isset($_SESSION['customer_image']) && !empty($_SESSION['customer_image']) 
                   ? "/web_perfume/public/uploads/avatar/" . $_SESSION['customer_image'] 
                   : "/web_perfume/public/images/default-user.png";
    ?>

    <div id="profileModal">
        <div class="profile-modal-container">
            
            <button class="pm-close-btn" onclick="closeProfileModal()">&times;</button>

            <div class="pm-sidebar">
                <div class="pm-avatar-box">
                    <img src="<?php echo $modal_img; ?>" id="miniAvatar" class="pm-avatar-img">
                    <div>
                        <h3 class="pm-user-name"><?php echo htmlspecialchars($modal_name); ?></h3>
                        <span class="pm-user-role">Thành viên</span>
                    </div>
                </div>
                <nav class="pm-menu-nav">
                    <div class="pm-menu-item active" onclick="switchTab(this, 'tab-info')">
                        <i class="far fa-user"></i> Thông tin cá nhân
                    </div>
                    <div class="pm-menu-item" onclick="switchTab(this, 'tab-orders')">
                        <i class="fas fa-shopping-bag"></i> Đơn hàng
                    </div>
                </nav>
                <a href="/web_perfume/auth/logout" class="pm-logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </a>
            </div>

            <div class="pm-content">
                
                <div id="tab-info" class="pm-tab-pane" style="display:block;">
                    <h2 class="pm-title">Hồ sơ của tôi</h2>
                    <p class="pm-subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    
                    <form action="/web_perfume/customer/update_profile" method="POST" enctype="multipart/form-data" class="pm-profile-layout">
                        
                        <div class="pm-left-col">
                            <div class="pm-row-2">
                                <div class="pm-input-group">
                                    <label class="pm-label">Họ tên</label>
                                    <input type="text" name="name" value="<?php echo htmlspecialchars($modal_name); ?>" class="pm-input" required>
                                </div>
                                <div class="pm-input-group">
                                    <label class="pm-label">Số điện thoại</label>
                                    <input type="text" name="phone" value="<?php echo htmlspecialchars($modal_phone); ?>" class="pm-input">
                                </div>
                            </div>

                            <div class="pm-input-group">
                                <label class="pm-label">Email (Không thể thay đổi)</label>
                                <input type="text" value="<?php echo htmlspecialchars($modal_email); ?>" disabled class="pm-input pm-disabled">
                            </div>

                            <div class="pm-input-group">
                                <label class="pm-label">Địa chỉ</label>
                                <input type="text" name="address" value="<?php echo htmlspecialchars($modal_addr); ?>" class="pm-input">
                            </div>

                            <button type="submit" class="pm-btn-save">Cập nhật thông tin</button>
                        </div>

                        <div class="pm-right-col">
                            <div class="pm-upload-box">
                                <div class="pm-preview-circle">
                                    <div id="avatarPreview" style="background-image: url('<?php echo $modal_img; ?>');"></div>
                                </div>
                                <input type="file" name="avatar" id="fileUpload" hidden accept=".jpg,.jpeg,.png">
                                <label for="fileUpload" class="pm-upload-btn">Chọn ảnh</label>
                                <span class="pm-upload-note">Dung lượng file tối đa 1 MB<br>Định dạng: .JPEG, .PNG</span>
                            </div>
                        </div>

                    </form>
                </div>

                <div id="tab-orders" class="pm-tab-pane" style="display:none;">
                    <h2 class="pm-title">Đơn hàng của tôi</h2>
                    <div class="pm-empty-state">
                        <i class="fas fa-box-open"></i>
                        <p>Bạn chưa có đơn hàng nào.</p>
                        <a href="/web_perfume/product/collection">Mua sắm ngay</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function switchTab(el, tabId) {
            document.querySelectorAll('.pm-menu-item').forEach(i => i.classList.remove('active'));
            document.querySelectorAll('.pm-tab-pane').forEach(p => p.style.display = 'none');
            el.classList.add('active');
            document.getElementById(tabId).style.display = 'block';
        }

        const fileInput = document.getElementById('fileUpload');
        if(fileInput){
            fileInput.onchange = function(evt) {
                const [file] = fileInput.files;
                if (file) {
                    const url = URL.createObjectURL(file);
                    const preview = document.getElementById('avatarPreview');
                    const mini = document.getElementById('miniAvatar');
                    if(preview) preview.style.backgroundImage = `url('${url}')`;
                    if(mini) mini.src = url;
                }
            };
        }
    </script>
<?php endif; ?>