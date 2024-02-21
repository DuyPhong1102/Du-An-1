<body class="app sidebar-mini rtl">
  <!-- Navbar-->
 
  <!-- Sidebar menu-->

  <ul class="app-menu">
    <li><a class="app-menu__item " href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class="app-menu__label">POS Bán Hàng</span></a></li>
    <li><a class="app-menu__item " href="Home"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item " href="DataStaff"><i class='app-menu__icon bx bx-id-card'></i>
        <span class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item active" href="DataCustomers"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
    <li><a class="app-menu__item " href="DataProduct"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item" href="DataOrder"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
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
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  
  <main class="app-content">

    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách khách hàng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
         
            <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" style="margin-bottom:15px;">
         
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-hover table-bordered" id="cart-content">
                    <thead>
                      <tr>
                
                        <th>Mã khách hàng </th>
                        <th>Tên khách hàng</th>
                        <th>Ảnh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                  
                      </tr>
                    </thead>

                    <tbody>
                     
                    <?php foreach ($dataCustomers as $item): ?>   
                    <?php $image=empty($item["image"]) ? "avatar_default.jpg" :   $item["image"];
                          if($item["gender"]==0){
                            $gender="Nam";
                          } else if($item["gender"]==1){
                            $gender="Nữ";
                          }
                          else{
                            $gender="Khác";
                            
                          }
                       
                        
                    ?>
                      <tr class="">
           
              <td><?= $item["id"] ?></td>
              <td><?= $item["fullname"] ?></td>
              <td> <img width="150"height="150" src="<?= _WEB_ROOT .'/app/public/assets/clients/images/'.$image  ?>" alt="IMG">
            </td>
              <td><?= $gender?></td>
              <td><?= $item["phone_number"] ?></td>
              <td><?= $item["email"] ?></td>
              
            
                  <?php endforeach;?>


                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-5">
               
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                    <ul class="pagination">
                   
                   
               
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>

  <!--
  MODAL
-->
  <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <form id="formEdit">
            <div class="row">
              <div class="form-group  col-md-12">
                <span class="thong-tin-thanh-toan">
                  <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
                </span>
              </div>
            </div>
            <div class="row">

              <div class="form-group col-md-6">
                <label class="control-label">Tên sản phẩm</label>
                <input name="name" class="form-control" type="text" value="Bàn ăn gỗ Theresa">
                <small></small>
                <span></span>
              </div>
              <div class="form-group  col-md-6">
                <label class="control-label">Số lượt xem</label>
                <input class="form-control" type="text" name="view" disabled>

              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Giá bán</label>
                <input name="price" class="form-control" type="text" value="5.600.000">
                <small></small>
                <span></span>
              </div>

            
              <div class="form-group col-md-6">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select name="cate" class="form-control" id="exampleSelect1">
                  <option selected value="">--Chọn danh mục--</option>
                  <?php foreach ($data_categories as $item) { ?>
                    <option value="<?php echo $item['cat_id']; ?>"><?php echo $item['cat_name']; ?></option>
                  <?php } ?>


                </select>
                <small></small>
                <span></span>
              </div>

              <div class="form-group col-md-6">
                <label for="exampleSelect1" class="control-label">Thương hiệu</label>
                <select name="brand" class="form-control" id="exampleSelect1">
                  <option selected value="">--Chọn thương hiệu--</option>
                  <?php foreach ($data_brand as $item) { ?>
                  
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['brand_name']; ?></option>
                  <?php } ?>


                </select>
                <small></small>
                <span></span>
              </div>



              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>


                <input type="file" name="fileUpload" id="file-upload">
                <label style="margin-top:10px" class="file-upload Choicefile" for="file-upload">Upload file</label>
                <div style="margin:20px 0" class="file-upload-filename"></div>

                <div class="box">
                  <div class="loader d-none"></div>
                  <img style="margin:15px 0;" height="200" width="300" src="" id="thumbimage" class="preview " height="200" alt="Image preview">
                </div>

              </div>
              <div style="margin-top:10px;" class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="desc" id="desc"></textarea>
                <small></small>
                <span></span>
              </div>
            </div>

            <BR>
            <button class="btn btn-save" type="submit">Lưu lại</button>
            <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
            <BR>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <div class="loading d-none">

    <!--?xml version="1.0" encoding="utf-8"?-->
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
      <g transform="rotate(0 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(30 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(60 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(90 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(120 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(150 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(180 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(210 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(240 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(270 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(300 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
      <g transform="rotate(330 50 50)">
        <rect x="47" y="24" rx="2.04" ry="2.04" width="6" height="12" fill="#fe718d">
          <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite">
          </animate>
        </rect>
      </g>
    </svg>
  </div>


  <script defer src="<?php echo _WEB_ROOT; ?>/app/public/assets/admin/js/DataStaff.js"></script>

</body>

</html>