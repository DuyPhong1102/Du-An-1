<?php 
function product_price($priceFloat) {

  $symbol_thousand = '.';
  $decimal_place = 0;
  $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
  return $price;
}
?>
<!DOCTYPE html>
    <html lang="en">
  
    <head>
      <title>Danh sách nhân viên | Quản trị Admin</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/app/public/assets/admin/css/main.css">
       <?php require_once  __DIR_ROOT.'/app/library/admin/admin.library.php'?>
      
    </head>

    <body  class="app sidebar-mini rtl">
      <!-- Navbar-->
     
      <!-- Sidebar menu-->
   
    <ul class="app-menu">
      <li><a class="app-menu__item " href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
          <li><a class="app-menu__item " href="Home"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item " href="DataStaff"><i class='app-menu__icon bx bx-id-card'></i>
          <span class="app-menu__label">Quản lý nhân viên</span></a></li>
      <li><a class="app-menu__item " href="DataCustomers"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item " href="DataProduct"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item " href="DataOrder"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item active" href="DataComment"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label ">Quản lý bình luận
          </span></a></li>
      <li><a class="app-menu__item" href="table-data-money.html"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Bảng kê lương</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-bao-cao.html"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="page-calendar.html"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Quản lý bình luận</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
        
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>

                    <th>ID sản phẩm</th>
                    <th>Nội dung bình luận </th>
                    <th>Thời gian bình luận</th>
                    <th>Chi tiết bình luận</th>

                  </tr>
                </thead>
                <tbody>

                <?php foreach ($dataComment as $item) 
               
                { 
                  ?>
                  
                             <tr>
                        <td><?= $item["product_id"] ?></td>
                        <td><?= $item["content"] ?></td>
                        <td><?=  strftime("%d/%m/%Y %T",strtotime($item["time_comment"]));?> </td>
                        <td style="cursor: pointer;">
                        <a href="DataComment/detailComment/<?= $item["product_id"] ?>">Xem chi tiết</a>
                      </td>
                          </tr>

             <?php }?>
             
            
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
     
    
    </body>
   
    </html>