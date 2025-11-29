<!-- Trang đăng ký cũng sử dụng layout full màn hình -->

<div class="auth-container">
    <div class="auth-wrapper">
        <div class="auth-header">
            <h2>Đăng Ký</h2>
            <p>Trở thành thành viên để nhận ưu đãi</p>
        </div>

        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            $message = '';
            switch($error) {
                case 'empty_fields': $message = 'Vui lòng điền đầy đủ thông tin!'; break;
                case 'invalid_email': $message = 'Email không hợp lệ!'; break;
                case 'password_mismatch': $message = 'Mật khẩu xác nhận không khớp!'; break;
                case 'email_exists': $message = 'Email đã được sử dụng!'; break;
                case 'register_failed': $message = 'Đăng ký thất bại, vui lòng thử lại!'; break;
                default: $message = 'Có lỗi xảy ra!';
            }
            echo '<div class="alert-message alert-error">' . $message . '</div>';
        }
        ?>

        <form action="/web_perfume/auth/process_register" method="POST">
            
            <div class="form-group-auth">
                <input type="text" id="name" name="name" class="form-control-auth" placeholder="Họ và tên" required>
            </div>

            <div class="form-group-auth">
                <input type="email" id="email" name="email" class="form-control-auth" placeholder="Email" required>
            </div>

            <div class="form-group-auth">
                <div style="position: relative;">
                    <input type="password" id="reg_password" name="password" class="form-control-auth" placeholder="Mật khẩu" required minlength="5">
                    <i class="fas fa-eye password-toggle-icon" onclick="togglePassword('reg_password', this)"></i>
                </div>
            </div>

            <div class="form-group-auth">
                <div style="position: relative;">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control-auth" placeholder="Nhập lại mật khẩu" required minlength="5">
                    <i class="fas fa-eye password-toggle-icon" onclick="togglePassword('confirm_password', this)"></i>
                </div>
            </div>

            <div class="privacy-text" style="font-size: 12px; color: #999; margin-bottom: 10px; text-align: justify;">
                Bằng việc đăng ký, bạn đồng ý với các Điều khoản dịch vụ & Chính sách bảo mật của KD Perfume.
            </div>

            <button type="submit" class="btn-black">Đăng ký thành viên</button>
        </form>

        <div class="auth-footer">
            <span>Đã có tài khoản?</span>
            <a href="/web_perfume/auth/login">Đăng nhập</a>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, icon) {
        const input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>