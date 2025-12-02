<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Tổng quan hệ thống</h3>
                        <h6 class="font-weight-normal mb-0">Chào mừng bạn quay trở lại trang quản trị <span class="text-primary">Web Perfume</span>!</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Tổng Đơn Hàng Mới</p>
                        <p class="fs-30 mb-2"><?php echo isset($order_count) ? $order_count : 0; ?></p>
                        <p>Đơn hàng cần xử lý</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Tổng Doanh Thu</p>
                        <p class="fs-30 mb-2"><?php echo isset($revenue) ? $revenue : '0đ'; ?></p>
                        <p>Tháng này</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Tổng Sản Phẩm</p>
                        <p class="fs-30 mb-2"><?php echo isset($product_count) ? $product_count : 0; ?></p>
                        <p>Đang kinh doanh</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Khách Hàng</p>
                        <p class="fs-30 mb-2"><?php echo isset($customer_count) ? $customer_count : 0; ?></p>
                        <p>Đã đăng ký</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Biểu đồ doanh thu (Mô phỏng)</p>
                        <p class="font-weight-500">Tổng quan doanh thu theo tháng của cửa hàng.</p>
                        <canvas id="order-chart" style="height:250px; width: 100%; border: 1px dashed #ccc; display: flex; align-items: center; justify-content: center;"></canvas>
                        <div class="text-center mt-3 text-muted small">Chức năng đang phát triển</div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sản phẩm bán chạy</h4>
                        <ul class="icon-data-list">
                            <li>
                                <div class="d-flex">
                                    <div class="icon-section">
                                        <i class="ti-package text-info" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="text-info mb-1">Dior Sauvage Elixir</p>
                                        <p class="mb-0">Đã bán: 150</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <div class="icon-section">
                                        <i class="ti-package text-info" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="text-info mb-1">Chanel Bleu</p>
                                        <p class="mb-0">Đã bán: 120</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>