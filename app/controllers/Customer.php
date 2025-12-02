<?php
class Customer extends DController {
    
    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] == false) {
            header('Location: ' . BASE_URL);
            exit();
        }
    }

    public function profile() {
        $customerModel = $this->load->model('CustomerModel');
        $categoryModel = $this->load->model('CategoryModel');

        $id = $_SESSION['customer_id'];
        $data['customer_info'] = $customerModel->getCustomerById($id);
        $data['categories'] = $categoryModel->category('tbl_category_product');

        $this->load->view('header', $data);
        $this->load->view('customer/profile', $data);
        $this->load->view('footer');
    }

    public function update_profile() {
        $customerModel = $this->load->model('CustomerModel');
        $id = $_SESSION['customer_id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu an toàn, tránh lỗi Undefined
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? ''; 
            
            // Lấy ảnh cũ từ DB để giữ lại nếu người dùng không up ảnh mới
            $currentUser = $customerModel->getCustomerById($id);
            $image = $currentUser['customer_image'];

            // Xử lý upload ảnh mới
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                // Đường dẫn thư mục (đảm bảo bạn đã tạo thư mục này)
                $uploadDir = 'public/uploads/avatar/';
                
                // Tự động tạo thư mục nếu chưa có (chỉ hoạt động nếu PHP có quyền ghi)
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                // Đặt tên file unique để tránh trùng lặp
                $filename = 'user_' . $id . '_' . time() . '.' . $extension;
                $targetFile = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
                    $image = $filename;
                }
            }

            $data = array(
                'customer_name' => $name,
                'customer_phone' => $phone,
                'customer_address' => $address,
                'customer_image' => $image
            );

            $result = $customerModel->updateCustomer($data, $id);

            if ($result) {
                // QUAN TRỌNG: Cập nhật lại Session
                $_SESSION['customer_name'] = $name;
                $_SESSION['customer_phone'] = $phone;
                $_SESSION['customer_address'] = $address;
                $_SESSION['customer_image'] = $image;

                $msg = "Cập nhật thành công!";
                $type = "success";
            } else {
                $msg = "Cập nhật thất bại hoặc chưa có thông tin thay đổi!";
                $type = "error";
            }
            
            // Chuyển hướng về trang chủ để thấy popup hiển thị đúng
            header('Location: ' . BASE_URL . '/?msg=' . urlencode($msg) . '&type=' . $type);
        }
    }
}
?>