<body class="app sidebar-mini rtl">
  <!-- Navbar-->

  <!-- Sidebar menu-->

  <ul class="app-menu">
    <li><a class="app-menu__item " href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class="app-menu__label">POS Bán Hàng</span></a></li>
    <li><a class="app-menu__item " href="Home"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item active" href="DataStaff"><i class='app-menu__icon bx bx-id-card'></i>
        <span class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item " href="DataCustomers"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
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
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">

                <a class="btn btn-add btn-sm" href="DataStaff/addStaff" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới nhân viên</a>
              </div>
            
            </div>
            <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" style="margin-bottom:15px;">
              <div style="margin:30px 0;" class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="sampleTable_length"><label>Hiện
                      <select style="width:60px;" name="itemPerPage" aria-controls="sampleTable" class="form-control form-control-sm">
                       <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select> danh mục</label></div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="sampleTable_filter" class="dataTables_filter">
                    <div class="d-flex  align-items-center " style="background-color:#f1f1f1;width:300px;">
                      <span class="d-flex align-items-center" style="white-space: nowrap; margin-right:5px; ">Tìm kiếm:</span>
                      <input name="search" style="font-size:16px;height:30px;padding:4px;background-color: transparent;outline:none;border:none;" type="search" class="form-control form-control-sm searchByName" placeholder="" aria-controls="sampleTable">
                      <svg class="d-none remove-search" width="30" height="30" viewBox="0 0 48 48" fill="rgba(22, 24, 35, .34)" xmlns="http://www.w3.org/2000/svg" style="margin: 0px 12px;">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 46C36.1503 46 46 36.1503 46 24C46 11.8497 36.1503 2 24 2C11.8497 2 2 11.8497 2 24C2 36.1503 11.8497 46 24 46ZM15.1466 30.7323L21.8788 24.0001L15.1466 17.2679C14.756 16.8774 14.756 16.2442 15.1466 15.8537L15.8537 15.1466C16.2442 14.756 16.8774 14.756 17.2679 15.1466L24.0001 21.8788L30.7323 15.1466C31.1229 14.756 31.756 14.756 32.1466 15.1466L32.8537 15.8537C33.2442 16.2442 33.2442 16.8774 32.8537 17.2679L26.1214 24.0001L32.8537 30.7323C33.2442 31.1229 33.2442 31.756 32.8537 32.1466L32.1466 32.8537C31.756 33.2442 31.1229 33.2442 30.7323 32.8537L24.0001 26.1214L17.2679 32.8537C16.8774 33.2442 16.2442 33.2442 15.8537 32.8537L15.1466 32.1466C14.756 31.756 14.756 31.1229 15.1466 30.7323Z"></path>
                      </svg>
                    </div>

                  </div>
                </div>

              </div>
              <?php 
              if(isset($error)){
                echo "<div style='color:red;margin:10px 0; font-weight:bold;'>$error</div>";
              }
              ?>
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-hover table-bordered" id="cart-content">
                    <thead>
                      <tr>
                    
                        <th>Mã nhân viên </th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Ảnh thẻ</th>
                        <th>Chức vụ</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($allStaff as $item): ?>
                        <tr>
                          <td><?= $item["id"] ?></td>
                          <td><?= $item["username"] ?></td>
                          <td><?= $item["email"] ?></td>
                          <td>
                            <img 
                          style="object-fit:cover;"
                          height="100"
                          width="100"
                          src="<?php echo _WEB_ROOT;?>/app/public/assets/admin/images/<?= $item['image']?>"
                          alt="">
                        </td>

                        <td><?= $item["name_position"] ?></td>
                       
                          <td>
                         <form action=""method="post">
                          <input type="hidden" name="id"value="<?=  $item["id"]?>">
                          <input type="hidden" name="id_position"value="<?=  $item["id_position"]?>">

                         <button class="btn btn-primary btn-sm trash" type="submit" title="Xóa">
                            <i class="fas fa-trash-alt"></i> 
                          </button>
                        </form>
                        <a href="DataStaff/updateStaff/<?= $item["id"] ?>" class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fa fa-edit"></i></a>
                          </td>
                  </tr>
                          </tr>
                      <?php endforeach;?>


                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
              
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
                <label for="exampleSelect1" class="control-label">Chức vụ</label>
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