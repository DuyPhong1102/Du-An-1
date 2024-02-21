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
      <li><a class="app-menu__item active" href="DataOrder"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="DataComment"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý bình luận
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
          <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row element-button">
                <div class="col-sm-2">
  
                  <a class="btn btn-add btn-sm" href="form-add-don-hang.html" title="Thêm"><i class="fas fa-plus"></i>
                    Tạo mới đơn hàng</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                      class="fas fa-file-upload"></i> Tải từ file</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                      class="fas fa-copy"></i> Sao chép</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                      class="fas fa-file-pdf"></i> Xuất PDF</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                      class="fas fa-trash-alt"></i> Xóa tất cả </a>
                </div>
              </div>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="10"><input type="checkbox" id="all"></th>
                    <th>ID đơn hàng</th>
                    <th>Thông tin người nhận </th>
                    <th> Thời gian đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th >Thông tin đơn hàng</th>
                    <!-- <th>Chức năng</th> -->
                  </tr>
                </thead>
                <tbody>
              
                <?php foreach ($info_order as $item)
              
                
                {?>  
              
                  <tr>
                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                    <td><?= $item["id"] ?></td>
                    <td>
                      <strong>Tên:</strong> <?= $item["name_receiver"] ?> <BR>
                      <strong>Số điện thoại:</strong>  <?= $item["phone_receiver"] ?><BR>
                      <strong>Địa chỉ:</strong>  <?= $item["address_receiver"] ?><BR>
                   

                    </td>
                    <td><?=  strftime("%d/%m/%Y %T",strtotime($item["created_at"])) ?></td>

                    <td><?= product_price($item["total_price"]) ?> đ</td>
                   
       
                    <td>
                   
                  
                        <?php 
                        switch ($item['status']) {
                            case '0':
                                echo "Mới đặt";
                                break;
                            case '1':
                                echo "Đã duyệt";
                                break;
                                case '2':
                                    echo "Đã hủy";
                                 break;
                        }
                        ?>
                    
                  
                  </td>
                  <td><a href="DataOrder/detail/<?= $item['id'] ?>">Xem chi tiết</a></td>
                    <!-- <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i> </button>
                      <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fa fa-edit"></i></button></td> -->
                  </tr>
              <?php  }?>
            
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
     
    
    </body>
   
    </html>