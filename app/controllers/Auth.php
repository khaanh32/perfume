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

    public function login() {
        $data['categories'] = $this->getCategories(); 
        
        $this->load->view('header', $data); 
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function register() {
        $data['categories'] = $this->getCategories(); 

        $this->load->view('header', $data); 
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function process_login() {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header("Location: /web_perfume/auth/login?error=missing_data");
            exit();
        }

        $username_or_email = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username_or_email) || empty($password)) {
            header("Location: /web_perfume/auth/login?error=empty_fields");
            exit();
        }

        $user = $this->authmodel->auto_login($username_or_email, $password);

        if ($user) {
            if ($user['user_type'] === 'admin') {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['admin_id'] = $user['admin_id'];
                header("Location: /web_perfume/admin");
                exit();
            } else {
                $_SESSION['user_logged_in'] = true;
                $_SESSION['customer_id'] = $user['customer_id'];
                $_SESSION['customer_name'] = $user['customer_name'];
                $_SESSION['customer_email'] = $user['customer_email'];
                header("Location: /web_perfume/");
                exit();
            }
        } else {
            header("Location: /web_perfume/auth/login?error=invalid_credentials");
            exit();
        }
    }

    public function process_register() {
        if (!isset($_POST['name']) || !isset($_POST['email']) || 
            !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
            header("Location: /web_perfume/auth/register?error=missing_data");
            exit();
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            header("Location: /web_perfume/auth/register?error=empty_fields");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /web_perfume/auth/register?error=invalid_email");
            exit();
        }

        if ($password !== $confirm_password) {
            header("Location: /web_perfume/auth/register?error=password_mismatch");
            exit();
        }

        if ($this->authmodel->check_email_exists($email)) {
            header("Location: /web_perfume/auth/register?error=email_exists");
            exit();
        }

        $data = array(
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_password' => $password,
            'customer_phone' => '',
            'customer_address' => ''
        );

        $result = $this->authmodel->insert_customer('tbl_customer', $data);

        if ($result) {
            header("Location: /web_perfume/auth/login?success=registered");
            exit();
        } else {
            header("Location: /web_perfume/auth/register?error=register_failed");
            exit();
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