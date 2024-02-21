<div class="wrapper" style="background-color: #efefef;">
    <div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="home"><span>Trang chủ</span></a>
                    <span class="icon icon-next"><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#808089" fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"></path>
                        </svg></span>
                     <p>/</p>

                    <a class="breadcrumb-item" href="category">Danh mục</a>
                    <span class="icon icon-next"><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#808089" fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"></path>
                        </svg></span>
                     <p>/</p>

                    <a><span>Tất cả sản phẩm</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid wide">
        <div class="row no-gutters">
            <div class="col l-3 ">
                <aside class=" scroll card py-2 dqdt-sidebar sidebar  ">
                    <p  class="clear_checkBox">Xóa tất cả lựa chọn</p>
                    <div style="margin-top:10px;"class="wrap_background_aside asidecollection">
                        <div class="filter-content aside-filter">
                            <div class="filter-container">
                                <div class="filter-container__selected-filter" style="display: none;">
                                    <div class="filter-container__selected-filter-header clearfix d-none">
                                        <span class="filter-container__selected-filter-header-title"><i class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
                                        <a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <!-- Lọc Hãng -->
                                <aside style="margin-top: 17px;" class="aside-item filter-vendor">

                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0"><span>Thương hiệu</span></h2>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green">


                                                <?php foreach ($dataBrand as $item) : ?>
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-vendor-mommy-bliss">
                                                            <input style="width:20px;height:20px;" class="common_selector " name="brand"value="<?=  $item['brand_name'] ?>"type="checkbox" id="filter-vendor-mommy-bliss" >
                                                            <i class="fa"></i>
                                                            <?= $item['brand_name'] ?>
                                                        </label>
                                                    </span>
                                                <?php endforeach; ?>
                                            </li>



                                        </ul>
                                    </div>
                                </aside>
                                <!-- Lọc theo Tag (Màu sắc)-->
                                <!-- End Lọc theo Tag (Màu sắc)-->
                                <aside class="aside-item filter-price dq-filterxx">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0"><span>Mức giá </span></h2>
                                    </div>
                                    <div class="aside-content filter-group scroll">
                                        <div class="showstt d-none">
                                            <!--<span>Mức giá</span> -->
                                        </div>
                                        <div class="shopee-filter-group shopee-price-range-filter shopee-price-range-filter--vn">
                                            <div class="shopee-filter-group__header shopee-price-range-filter__header">Khoảng Giá</div>
                                            <div class="shopee-filter-group__body shopee-price-range-filter__edit">
                                                <div class="shopee-price-range-filter__inputs">
                                                    <input type="text" maxlength="13" class="shopee-price-range-filter__input" name="min-price" placeholder="₫ TỪ" value="">
                                                    <div class="shopee-price-range-filter__range-line">
                                                    </div>
                                                    <input type="text" maxlength="13" class="shopee-price-range-filter__input" name="max-price" placeholder="₫ ĐẾN" value="">
                                                </div>
                                            </div><button class="shopee-button-solid shopee-button-solid--primary hDJj0c common_selector" style="background-color: #5bbb46;">Áp dụng</button>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Lọc Loại -->
                                <aside class="aside-item aside-itemxx filter-type">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0"><span>Loại</span></h2>
                                    </div>
                                    <div class="aside-content filter-group scroll">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <span>


                                                    <?php foreach ($dataCategories as $item) { ?>
                                                        <label class="custom-checkbox" for="data-filter-<?= $item['cat_id'] ?> ">
                                                            <input style="width:20px;height:20px;" name="categories" value="<?= $item['cat_name'] ?>" class="common_selector"type="checkbox" id="data-filter-<?= $item['cat_id'] ?> ">
                                                            <i class="fa"></i>
                                                            <?= $item['cat_name'] ?>
                                                        </label>
                                                    <?php  } ?>

                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Lọc Loại -->
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col l-9">
                <div class="card py-2 main_container collection  ">
                    <h1 class="title_page collection-title mb-0">
                        Superfood
                    </h1>
                    <div class="filter-content aside-filter">
                        <div class="filter-container">
                            <div class="filter-container__selected-filter" style="display: none;">
                                <!--<div class="filter-container__selected-filter-header clearfix">
<span class="filter-container__selected-filter-header-title">Bạn chọn</span>
</div> -->
                                <div class="filter-container__selected-filter-list mb-2 ">
                                    <ul></ul>
                                </div>
                                <!--<a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="category-products products">
                        <div class="border-bottom">
                            <div class=" d-flex justify-content-between">
                                <div class="sortPagiBar">
                                    <!-- <div class="sort-cate clearfix">
                                        <div style="gap:20px;" id="sort-by" class="d-flex align-items-baseline">
                                            <span style="margin-bottom:2px" class="left">
                                                <span class="">Sắp xếp: </span></span>

                                            <ul class="content_ul">
                                                <li data-sort="title:product=asc" class="active"><a data-sort="Theo bảng chữ cái: A-Z" class="link" href="javascript:;" onclick="sortby('alpha-asc')">Tên A → Z</a></li>
                                                <li data-sort="title:product=desc"><a data-sort="Theo bảng chữ cái: Z-A" class="link" href="javascript:;" onclick="sortby('alpha-desc')">Tên Z → A</a></li>
                                                <li data-sort="price:product=desc"><a data-sort="Theo giá: Từ cao đến thấp" class="link" href="javascript:;" onclick="sortby('price-desc')">Giá giảm dần</a></li>
                                                <li data-sort="price:product=asc"><a data-sort="Theo giá: Từ thấp đến cao" class="link" href="javascript:;" onclick="sortby('price-asc')">Giá tăng dần</a></li>
                                                <li data-sort="created:product=desc">
                                                    <a data-sort="Theo ngày: Từ mới đến cũ" href="javascript:;" onclick="sortby('created-desc')"><i></i>Hàng mới</a>
                                                </li>
                                                <li data-sort="created:product=asc">
                                                    <a data-sort="Theo ngày: Từ cũ đến mới" href="javascript:;" onclick="sortby('created-asc')" class="d-none">Hàng cũ</a>
                                                </li>
                                                <li data-sort="sold_quantity:product=desc"><a data-sort="Bán chạy" href="javascript:;" onclick="sortby('sold_quantity-desc')" class="d-none">Bán chạy</a></li>


                                            </ul>
                                            </li>

                                        </div>
                                    </div> -->
                                </div>
                               
                            </div>
                        </div>
                        <section class="products-view products-view-grid collection_reponsive list_hover_pro">
                            <div style="gap:5px;margin:25px 0;" class="main-content row  content-col">
                            
                            

                            </div>
                        </section>
                        <div class="section pagenav">
                            <nav class="clearfix relative nav_pagi w_100">
                                <ul class="pagination clearfix float-right">
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Category.js"></script>
