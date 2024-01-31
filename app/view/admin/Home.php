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

  <hr>
  <ul class="app-menu">

    <li><a class="app-menu__item active" href="Home"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item " href="DataStaff"><i class='app-menu__icon bx bx-id-card'></i>
        <span class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item " href="DataCustomers"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
    <li><a class="app-menu__item " href="DataProduct"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item" href="DataOrder"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
    <li><a class="app-menu__item" href="DataComment"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý bình luận
        </span></a></li>

  </ul>
  </aside>
  
    
  <main class="app-content">
    
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
   
    
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <!-- col-6 -->
          <div class="col-md-6 col-lg-6">
            <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
              <div class="info">
                <h4>Tổng khách hàng</h4>
                <p><b style="font-size:14px"><?= $number_customers ?> khách hàng</b></p>
                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6 col-lg-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng sản phẩm</h4>
                <p><b style="font-size:14px"><?= $number_products ?> sản phẩm</b></p>
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6 col-lg-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Tổng đơn hàng</h4>
                <p><b style="font-size:14px"><?= $number_order ?> đơn hàng</b></p>
                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6 col-lg-6">
            <div class="widget-small danger coloured-icon"><i class='icon  fas fa-book'></i>
              <div class="info">
                <h4>Tổng danh mục</h4>
                <p><b style="font-size:14px"><?= $number_cate ?> danh mục</b></p>
                <p class="info-tong">Tổng số danh mục được quản lý</p>
              </div>
            </div>
          </div>
          <!-- col-12 -->
          <!-- <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tình trạng đơn hàng</h3>
                  <div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID đơn hàng</th>
                          <th>Tên khách hàng</th>
                          <th>Tổng tiền</th>
                          <th>Trạng thái</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>AL3947</td>
                          <td>Phạm Thị Ngọc</td>
                          <td>
                            19.770.000 đ
                          </td>
                          <td><span class="badge bg-info">Chờ xử lý</span></td>
                        </tr>
                        <tr>
                          <td>ER3835</td>
                          <td>Nguyễn Thị Mỹ Yến</td>
                          <td>
                            16.770.000 đ	
                          </td>
                          <td><span class="badge bg-warning">Đang vận chuyển</span></td>
                        </tr>
                        <tr>
                          <td>MD0837</td>
                          <td>Triệu Thanh Phú</td>
                          <td>
                            9.400.000 đ	
                          </td>
                          <td><span class="badge bg-success">Đã hoàn thành</span></td>
                        </tr>
                        <tr>
                          <td>MT9835</td>
                          <td>Đặng Hoàng Phúc	</td>
                          <td>
                            40.650.000 đ	
                          </td>
                          <td><span class="badge bg-danger">Đã hủy	</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
               
                </div>
              </div>
               
                <div class="col-md-12">
                    <div class="tile">
                      <h3 class="tile-title">Khách hàng mới</h3>
                    <div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>#183</td>
                            <td>Hột vịt muối</td>
                            <td>21/7/1992</td>
                            <td><span class="tag tag-success">0921387221</span></td>
                          </tr>
                          <tr>
                            <td>#219</td>
                            <td>Bánh tráng trộn</td>
                            <td>30/4/1975</td>
                            <td><span class="tag tag-warning">0912376352</span></td>
                          </tr>
                          <tr>
                            <td>#627</td>
                            <td>Cút rang bơ</td>
                            <td>12/3/1999</td>
                            <td><span class="tag tag-primary">01287326654</span></td>
                          </tr>
                          <tr>
                            <td>#175</td>
                            <td>Hủ tiếu nam vang</td>
                            <td>4/12/20000</td>
                            <td><span class="tag tag-danger">0912376763</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div> -->

        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div style="margin:0;border-radius:0px;-webkit-border-radius: 0;" class="tile">
              <h3 style="margin-bottom:0px;"class="tile-title">Thống kê hàng hóa</h3>
              <figure class="highcharts-figure">
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
        
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>

                    <th>Danh mục sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>

                  </tr>
                </thead>
          
                <tbody>
                  <?php foreach ($dataCate as $key=> $item): ?>
                  <tr>
                    <td><?=  $item["cat_name"] ?></td>
                    <td><?= $detail_Statistical[$key]["quantity"] ?></td>
                    <td>
                    <?= product_price($detail_Statistical[$key]["maxPrice"])."đ" ?>
                    </td>
                    <td>
                    <?= product_price($detail_Statistical[$key]["minPrice"])."đ" ?>
                    </td>
                    <td>
                    <?= product_price($detail_Statistical[$key]["average"])."đ" ?>
                    </td>
                  </tr>
                  <?php  endforeach;?>

                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  <div id="container"></div>

</figure>
            </div>
          </div>
          <!-- <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div> -->
        </div>

      </div>
      <!--END right-->
    </div>


    <div class="text-center" style="font-size: 13px">
      <p><b>Copyright
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Phần mềm quản lý bán hàng
        </b></p>
    </div>
  </main>
  



</body>

</html>
<script defer src="https://code.highcharts.com/highcharts.js"></script>
<script defer src="https://code.highcharts.com/highcharts-3d.js"></script>
<script defer src="https://code.highcharts.com/modules/exporting.js"></script>
<script defer src="https://code.highcharts.com/modules/export-data.js"></script>
<script defer src="https://code.highcharts.com/modules/accessibility.js"></script>
<script defer src="<?php echo _WEB_ROOT; ?>/app/public/assets/admin/js/Home.js"></script>