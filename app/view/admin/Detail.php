<?php 
function product_price($priceFloat) {

    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price;
  }
?>


<body class="app sidebar-mini rtl">

<!-- Navbar-->

<!-- Sidebar menu-->

  <ul class="app-menu">
    <li><a class="app-menu__item " href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class="app-menu__label">POS Bán Hàng</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/Home' ?>"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item " href="DataStaff"><i class='app-menu__icon bx bx-id-card'></i>
        <span class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataCustomers' ?>"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataProduct' ?>"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item active" href="<?= _WEB_ROOT . '/admin/DataOrder' ?>"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
    <li><a class="app-menu__item" href="DataComment"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý bình luận
        </span></a></li>
    <li><a class="app-menu__item" href="table-data-money.html"><i class='app-menu__icon bx bx-dollar'></i><span class="app-menu__label">Bảng kê lương</span></a></li>
    <li><a class="app-menu__item" href="quan-ly-bao-cao.html"><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
    </li>
    <li><a class="app-menu__item" href="page-calendar.html"><i class='app-menu__icon bx bx-calendar-check'></i><span class="app-menu__label">Lịch công tác </span></a></li>
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
          đặt hệ thống</span></a></li>
  </ul>
</aside>
<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="DataProduct"class="list_product">Danh Sách Đơn hàng</a></li>
      <li class="breadcrumb-item"><a href="#">Chi tiết đơn hàng</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Chi Tiết Đơn Hàng</h3>
        <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                    <th>Tên sản phẩm</th>
                    <td>Ảnh sản phẩm</td>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                 
                
                  </tr>
                </thead>
                <tbody>
              
                <?php foreach ($detail_product as $item): ?>  
                  
                  <tr>
                    <td><?= $item['name'] ?></td>
                    <td><img style="width:150px;height:150px;"src="<?php echo _WEB_ROOT;?>/app/public/assets/admin/images/<?= $item['image']?>" alt=""></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= product_price($item['quantity']*$item['price']) ?></td>
                  </tr>
              <?php  endforeach;?>
            
                
                </tbody>
              </table>
        </div>

      </div>

</main>





 

</body>

</html>