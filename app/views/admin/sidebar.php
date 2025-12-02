<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/admin">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-products" aria-expanded="false" aria-controls="ui-products">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Sản phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/product/list_product">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/product/add_product">Thêm sản phẩm</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-categories" aria-expanded="false" aria-controls="ui-categories">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Danh mục</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/category/list_category">Danh sách</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/category/add_category">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-brands" aria-expanded="false" aria-controls="ui-brands">
                <i class="ti-tag menu-icon"></i>
                <span class="menu-title">Thương hiệu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-brands">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/brand/list_brand">Danh sách</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/brand/add_brand">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-scents" aria-expanded="false" aria-controls="ui-scents">
                <i class="mdi mdi-flask-outline menu-icon"></i>
                <span class="menu-title">Mùi hương</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-scents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/scent/list_scent">Danh sách</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/scent/add_scent">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Đơn hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/order/list_order">Tất cả đơn hàng</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/order/list_order?status=processing">Đang xử lý</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/order/list_order?status=shipping">Đang giao</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/order/list_order?status=completed">Hoàn thành</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/order/list_order?status=cancelled">Đơn hủy</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-customers" aria-expanded="false" aria-controls="ui-customers">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Khách hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-customers">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/customer/list_customer">Danh sách khách hàng</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/customer/history">Lịch sử mua hàng</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-stats" aria-expanded="false" aria-controls="ui-stats">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Thống kê</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-stats">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/statistic/revenue">Doanh thu</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo BASE_URL ?>/statistic/bestseller">Sản phẩm bán chạy</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>