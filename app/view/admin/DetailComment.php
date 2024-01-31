<?php 

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
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataOrder' ?>"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
    <li><a class="app-menu__item active" href="DataComment"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý bình luận
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
      <li class="breadcrumb-item"><a href="<?= _WEB_ROOT."/admin/DataComment" ?>"class="list_product">Quản lý bình luận</a></li>
      <li class="breadcrumb-item"><a href="#">Chi tiết bình luận</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Chi Tiết Bình Luận</h3>
        <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                    <th>Mã sản phẩm</th>
                    <td>Nội dung</td>
                    <th>Thời gian bình luận</th>
                  </tr>
                </thead>
                <tbody>
              
                <?php foreach ($dataComment as $item): ?>  
                 
                  <tr>
                    <td><?= $item['product_id'] ?></td>
           
                    <td><?= $item['content'] ?></td>
                    <td><?=   strftime("%d/%m/%Y %T",strtotime($item["time_comment"]));?></td>
                  </tr>
              <?php  endforeach;?>
            
                
                </tbody>
              </table>
        </div>

      </div>

</main>





 

</body>

</html>