<!-- Không cần container đệm margin-top vì Auth Container đã căn giữa màn hình -->

<div class="auth-container">
    <div class="auth-wrapper">
        <div class="auth-header">
            <h2>Đăng Nhập</h2>
            <p>Chào mừng bạn trở lại với KD Perfume</p>
        </div>

        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            $message = '';
            switch($error) {
                case 'empty_fields': $message = 'Vui lòng điền đầy đủ thông tin!'; break;
                case 'invalid_credentials': $message = 'Email hoặc mật khẩu không đúng!'; break;
                case 'missing_data': $message = 'Dữ liệu không hợp lệ!'; break;
                default: $message = 'Đăng nhập thất bại!';
            }
            echo '<div class="alert-message alert-error">' . $message . '</div>';
        }
        if (isset($_GET['success']) && $_GET['success'] == 'registered') {
            echo '<div class="alert-message alert-success">Đăng ký thành công! Vui lòng đăng nhập.</div>';
        }
        ?>

        <form action="/web_perfume/auth/process_login" method="POST">
            <div class="form-group-auth">
                
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="form-control-auth"
                    placeholder="Email / Tên đăng nhập"
                    required
                >
            </div>

            <div class="form-group-auth">
                <div style="position: relative;">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control-auth"
                        placeholder="Mật khẩu"
                        required
                    >
                    <i class="fas fa-eye password-toggle-icon" onclick="togglePassword('password', this)"></i>
                </div>
            </div>

            <div class="auth-options">
                <label class="remember-me" style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="remember">
                    <span>Ghi nhớ</span>
                </label>
                <a href="#" class="forgot-password">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="btn-black">Đăng nhập</button>
        </form>

        <div class="auth-footer">
            <span>Bạn chưa có tài khoản?</span>
            <a href="/web_perfume/auth/register">Đăng ký ngay</a>
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