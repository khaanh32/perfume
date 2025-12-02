<?php
class Auth extends DController {
    public function __construct() {
        parent::__construct();
        $this->authmodel = $this->load->model('authmodel');
    }

    private function getCategories() {
        $categorymodel = $this->load->model('categorymodel');
        return $categorymodel->category('tbl_category_product');
    }

    // Load view chứa React Login
    public function login() {
        $data['categories'] = $this->getCategories(); 
        $this->load->view('header', $data); 
        $this->load->view('login'); // View này giờ chỉ chứa div root cho React
        $this->load->view('footer');
    }

    // Load view chứa React Register
    public function register() {
        $data['categories'] = $this->getCategories(); 
        $this->load->view('header', $data); 
        $this->load->view('register'); // View này giờ chỉ chứa div root cho React
        $this->load->view('footer');
    }

    // --- API XỬ LÝ LOGIN (React sẽ gọi cái này) ---
   public function api_login() {
        header('Content-Type: application/json');
        
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        $username = isset($input['username']) ? trim($input['username']) : '';
        $password = isset($input['password']) ? trim($input['password']) : '';

        // ... (Đoạn kiểm tra input giữ nguyên) ...

        $user = $this->authmodel->auto_login($username, $password);

        if ($user) {
            // Set session PHP
            if ($user['user_type'] === 'admin') {
                // ... (Phần admin giữ nguyên) ...
            } else {
                $_SESSION['user_logged_in'] = true;
                $_SESSION['customer_id'] = $user['customer_id'];
                $_SESSION['customer_name'] = $user['customer_name'];
                $_SESSION['customer_email'] = $user['customer_email'];
                
                // --- THÊM 3 DÒNG NÀY ---
                // Lưu thêm các thông tin phụ vào Session để hiển thị trong Popup
                $_SESSION['customer_phone'] = $user['customer_phone'];
                $_SESSION['customer_address'] = $user['customer_address'];
                $_SESSION['customer_image'] = $user['customer_image'];
                // -----------------------
                
                $redirect = '/web_perfume/';
            }
            
            echo json_encode([
                'status' => 'success', 
                'message' => 'Đăng nhập thành công!', 
                'redirect' => $redirect
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Email hoặc mật khẩu không đúng!']);
        }
    }

    // --- API XỬ LÝ REGISTER (React sẽ gọi cái này) ---
    public function api_register() {
        header('Content-Type: application/json');

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        $name = isset($input['name']) ? trim($input['name']) : '';
        $email = isset($input['email']) ? trim($input['email']) : '';
        $password = isset($input['password']) ? trim($input['password']) : '';
        $confirm_password = isset($input['confirm_password']) ? trim($input['confirm_password']) : '';

        if (empty($name) || empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['status' => 'error', 'message' => 'Email không hợp lệ!']);
            return;
        }

        if ($password !== $confirm_password) {
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu xác nhận không khớp!']);
            return;
        }

        if ($this->authmodel->check_email_exists($email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email đã được sử dụng!']);
            return;
        }

        $data = array(
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_password' => $password, // Thực tế nên dùng password_hash($password, PASSWORD_DEFAULT)
            'customer_phone' => '',
            'customer_address' => ''
        );

        $result = $this->authmodel->insert_customer('tbl_customer', $data);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Đăng ký thành công! Vui lòng đăng nhập.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Đăng ký thất bại, vui lòng thử lại!']);
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /web_perfume/auth/login");
        exit();
    }
}
?>