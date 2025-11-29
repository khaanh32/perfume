<?php

class product extends DController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $this->add_product();
    }

    public function add_product(){
    // 1. CHUẨN BỊ DỮ LIỆU (MODEL)
    $table = "tbl_category_product";
    $categorymodel = $this->load->model('categorymodel');
    // Lấy danh sách danh mục và lưu vào $data
    $data['category'] = $categorymodel->category($table); 
    // 2. TẢI GIAO DIỆN THEO ĐÚNG THỨ TỰ (VIEW)
    // Tải Header (Mở trang)
    $this->load->view('admin/header'); 
    // Tải View chính (TRUYỀN $data vào đây)
    // View này sẽ nhận được biến $category để đổ dữ liệu vào dropdown
    $table_brand = "tbl_brand";
    $data['brand'] = $categorymodel->brand($table_brand);
    $this->load->view('admin/product/add_product', $data); 
    // Tải Footer (Đóng trang)
    $this->load->view('admin/footer');
}
    public function insert_product() {
    $title = $_POST['title_product'] ?? '';
    $price = $_POST['price_product'] ?? '';
    $desc = $_POST['desc_product'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $quantity = $_POST['quantity'] ?? '';
    $capacity = $_POST['capacity'] ?? '';// t them dong nay 
    $category = $_POST['id_category_product'] ?? '';
    $brand = $_POST['id_brand'] ?? '';
    $scent = $_POST['id_scent'] ?? '';

    // Xử lý upload ảnh
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        //move_uploaded_file($tmp_name, 'public/uploads/' . $image); // đường dẫn tùy project  " bên t lỗi nên t fix lại dòng này 
        move_uploaded_file($tmp_name, './img/' . $image);
    }
        $table = "tbl_product";
        $data = array(
            'title_product' => $title,
            'price_product' => $price,
            'desc_product' => $desc,
            'gender' => $gender,
            'quantity' => $quantity,
            'capacity' => $capacity, // nay nua
            'image' => $image,
            'id_category_product' => $category,
            'id_brand' => $brand,
            'id_scent' => $scent,
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertproduct($table, $data);
         if($result){
        $msg = array('Thêm san pham thành công!');
    } else {
        $msg = array('Thêm san pham thất bại!');
    }

    header("Location: index.php?url=product/add_product&msg=" . urlencode(serialize($msg)));
    exit();
    }
    public function list_product()
    {
        $table_product = "tbl_product";
        $table_category="tbl_category_product";


        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->product($table_product,$table_category);

        
        
        
        
        $this->load->view('admin/product/list_product', $data); 
        
    }




            public function delete_product($id){
            $table = "tbl_product";
            $cond = "id_product = '$id'";
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->deleteproduct($table, $cond);

            if($result == 1){
                $message['msg'] = "Xóa sản phẩm thành công";
                header('Location: '.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Xóa sản phẩm thất bại";
                header('Location: '.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_product($id){
    // 1. Chuẩn bị Model
    $table = "tbl_product";
    $categorymodel = $this->load->model('categorymodel');
    $cond = "tbl_product.id_product='$id'";

    // 2. Lấy dữ liệu sản phẩm cần sửa
    // Lưu ý: Hàm select trả về mảng danh sách, ta lấy phần tử [0]
    $product_data = $categorymodel->productbyid($table, $cond);
    
    // Kiểm tra nếu có dữ liệu
    if(count($product_data) > 0){
        $data['productbyid'] = $product_data[0]; 
    } else {
        header("Location: ".BASE_URL."/product/list_product"); // Không tìm thấy thì quay về
    }

    // 3. Lấy danh mục & thương hiệu (để hiện dropdown chọn)
    $data['category'] = $categorymodel->category('tbl_category_product');
    $data['brand'] = $categorymodel->brand('tbl_brand');

    // 4. Load View
    $this->load->view('admin/header');
    $this->load->view('admin/product/edit_product', $data);
    $this->load->view('admin/footer');
}
public function update_product($id){
    // 1. Khai báo bảng và Model
    $table = "tbl_product";
    $categorymodel = $this->load->model('categorymodel');
    $cond = "tbl_product.id_product='$id'"; // Điều kiện: Update dòng có ID này

    // 2. Lấy dữ liệu từ Form (Giống ảnh dòng 172-177, nhưng thêm các cột dự án bạn cần)
    $title = $_POST['title_product'];
    $price = $_POST['price_product'];
    $desc = $_POST['desc_product'];
    $quantity = $_POST['quantity'];
    $gender = $_POST['gender'];
    $category = $_POST['id_category_product'];
    $brand = $_POST['id_brand'];
    $scent = $_POST['id_scent'];
    
    // Các trường mới thêm (Dung tích, Mã nhóm)
    $capacity = $_POST['capacity'];
    $group_code = $_POST['group_code'];

    // 3. Xử lý hình ảnh (CODE GIỐNG TRONG ẢNH DÒNG 178-183)
    $image = $_FILES['image']['name']; // Tên file
    $tmp_image = $_FILES['image']['tmp_name']; // Đường dẫn tạm

    if($image){ 
        // A. NẾU CÓ CHỌN ẢNH MỚI
        
        // Tách tên file để lấy đuôi (vd: jpg, png)
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        
        // Tạo tên file duy nhất bằng hàm time() -> Giống ảnh dòng 182
        $unique_image = $div[0] . time() . '.' . $file_ext;
        
        // Đường dẫn lưu ảnh (Dự án bạn dùng thư mục img)
        $path_uploads = "./img/" . $unique_image; 
        
        // Upload file
        move_uploaded_file($tmp_image, $path_uploads);

        // Mảng dữ liệu update (Bao gồm cả ảnh mới)
        $data = array(
            'title_product' => $title,
            'price_product' => $price,
            'desc_product' => $desc,
            'quantity' => $quantity,
            'gender' => $gender,
            'image' => $unique_image, // Cập nhật tên ảnh mới
            'id_category_product' => $category,
            'id_brand' => $brand,
            'id_scent' => $scent,
            'capacity' => $capacity,
        );
    } else {
        // B. NẾU KHÔNG CHỌN ẢNH MỚI (Giữ nguyên ảnh cũ)
        $data = array(
            'title_product' => $title,
            'price_product' => $price,
            'desc_product' => $desc,
            'quantity' => $quantity,
            'gender' => $gender,
            // Không có dòng 'image' -> Database giữ nguyên ảnh cũ
            'id_category_product' => $category,
            'id_brand' => $brand,
            'id_scent' => $scent,
            'capacity' => $capacity,
        );
    }

    // 4. Gọi Model để Update (Giống ảnh dòng 169)
    $result = $categorymodel->updateproduct($table, $data, $cond);

    // 5. Thông báo và chuyển hướng
    if($result == 1){
        $message['msg'] = "Cập nhật sản phẩm thành công";
        header('Location: '.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }else{
        $message['msg'] = "Cập nhật sản phẩm thất bại";
        header('Location: '.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
}

public function detail($id) {
    // 1. Load Model (Quan trọng: Phải có dòng này mới gọi được dữ liệu)
    $categorymodel = $this->load->model('categorymodel');
    $table = 'tbl_product';
    $cond = "tbl_product.id_product='$id'"; // Tạo điều kiện lấy đúng ID

    // 2. Lấy thông tin sản phẩm hiện tại
    // Sử dụng hàm productbyid bạn đã có trong Model
    $product_details = $categorymodel->productbyid($table, $cond); 

    // 3. Lấy danh sách các dung tích khác (biến thể)
    $variants = [];
    foreach ($product_details as $key => $value) {
        // THAY ĐỔI Ở ĐÂY: Lấy tên sản phẩm thay vì group_code
        $title = $value['title_product']; 
        $current_id = $value['id_product']; 
        
        if($title) {
             // Truyền Tên sản phẩm vào hàm Model
             $variants = $categorymodel->getRelatedVariants($title, $current_id);
        }
    }

    // 4. Đóng gói dữ liệu gửi sang View
    $data['product_details'] = $product_details;
    $data['variants'] = $variants; 

    // 5. Load giao diện
    $this->load->view('header', $data); // Header chung của khách hàng
$this->load->view('detail', $data);
    $this->load->view('footer'); // Footer chung
}      
       
}


?>