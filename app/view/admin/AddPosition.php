


<body class="app sidebar-mini rtl">

<!-- Navbar-->

<!-- Sidebar menu-->

<ul class="app-menu">
    <li><a class="app-menu__item " href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class="app-menu__label">POS Bán Hàng</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/Home' ?>"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item active" href="<?= _WEB_ROOT . '/admin/DataStaff' ?>"><i class='app-menu__icon bx bx-id-card'></i>
        <span class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataCustomers' ?>"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataProduct' ?>"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item " href="<?= _WEB_ROOT . '/admin/DataOrder' ?>"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
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
      <li class="breadcrumb-item"><a href="DataProduct"class="list_product">Quản lý nhân viên</a></li>
      <li class="breadcrumb-item"><a href="#">Thêm chức vụ</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Thêm chức vụ</h3>
        <div class="tile-body">
        
          <form id="formUpdate" action="" method="post" class="row">

            <div class="form-group col-md-3">
              <label class="control-label">Thêm chức vụ</label>
              <input   class="form-control" name="position" type="text">
              <small></small>
              <span></span>
            </div>


            
            <div class="form-group col-md-12">
              <button class="btn btn-save" name="submit" type="submit">Lưu lại</button>
              <a class="btn btn-cancel" href="<?= _WEB_ROOT."/admin/DataStaff" ?>">Hủy bỏ</a>
            </div>
          </form>
        </div>

      </div>

</main>


<!--
MODAL CHỨC VỤ 
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Thêm mới nhà cung cấp</h5>
            </span>
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Nhập tên chức vụ mới</label>
            <input class="form-control" type="text" required>
          </div>
        </div>
        <BR>
        <button class="btn btn-save" type="button">Lưu lại</button>
        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
        <BR><div class="loader"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--
MODAL
-->



<!--
MODAL DANH MỤC
-->
<div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <form id="addCategories">
      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Thêm mới danh mục </h5>
            </span>
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Nhập tên danh mục mới</label>
            <input class="form-control"name="cat_name" type="text" >
            <small></small>
            <span></span>
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Danh mục sản phẩm hiện đang có</label>
            <ul class="list_categories"style="padding-left: 20px;">
              
           
            </ul>
          </div>
        </div>
        <BR>
        <button class="btn btn-save btnSuccessAddCate" type="submit">Lưu lại</button>
        <button class="btn btn-cancel cancelAddCate" type="button"data-bs-dismiss="modal">Hủy bỏ</button>
        <BR>
      </div>
      </form>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--
MODAL
-->




<!--
MODAL TÌNH TRẠNG
-->
<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <form id="formBrand">
      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Thêm mới thương hiệu</h5>
            </span>
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Nhập thương hiệu mới</label>
            <input class="form-control"name="brand" type="text" >
            <small></small>
            <span></span>
          </div>
        </div>
        <BR>
        <button class="btn btn-save save_add_brand" type="submit">Lưu lại</button>
        <button class="btn btn-cancel cancelAddBrand" type="button" data-bs-dismiss="modal" >Hủy bỏ</button>
        <BR>
      </div>
      </form>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--
MODAL
-->





 

</body>

</html>