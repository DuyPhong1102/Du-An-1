<?php
function product_price($priceFloat)
{

    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price;
}
 

?>
    
<div class="wrapper" style="background-color: #efefef;">
    <div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">

            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>"><span>Trang chủ</span></a>
                    <span class="icon icon-next"><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#808089" fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"></path>
                        </svg></span>

                    <p>/</p>

                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/category' ?>">Danh mục</a>
                    <span class="icon icon-next"><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#808089" fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"></path>
                        </svg></span>
                    <p>/</p>

                    <a><span><?= $data_product[0]['cat_name'] ?></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid wide">
        <div class="chitietsanpham">
            <div class="chitiet-header">

                <?php foreach ($data_product as $item) : ?>

                    <div class="row">
                        <div class="col l-6 c-12">
                            <div class="chitiet-big-img">
                                <img style="object-fit:cover;" src="<?= _WEB_ROOT . '/app/public/assets/admin/images/' . $item['image'] ?>" alt="">

                            </div>

                        </div>
                        <div class="col l-6 c-12">
                            <div class="chitiet-description">
                                <div class="chitiet-des-name">
                                    <span><?= $item['name'] ?></span>
                                </div>
                                <div class="group-status">
                                    <span class="frist-status">
                                        Thương hiệu: <span class="status-name"><?= $item['brand_name'] ?></span>
                                    </span>
                                    <span class="frist-status status-2">
                                        <span class="line_tt hidden-sm" style="margin-right: 10px;">|</span>
                                        Tình trạng: <span class="status-name">Còn hàng</span>
                                    </span>
                                </div>

                                <div class="chitiet-des-price">
                                    <span>30,000<sup>đ</sup></span>
                                </div>

                                <form id="form_add_product" method="post" class="quantity-product">
                                    <div class="box-quantity-product">
                                        <div class="so-luong">
                                            <h1>Số lượng: </h1>
                                        </div>
                                        <input type="button" value="-" class="minus tru">
                                        <input type="number" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="value-quantity" value="1" onchange="if(this.value == 0)this.value=1;">
                                        <input type="button" value="+" class="increase cong">
                                        <input type="hidden" name="id_product" value="<?= $item["id"] ?>">
                                    </div>

                                    <button type="submit" class="chitiet-add-cart btn-add-product ">
                                        <h3>Thêm vào giỏ hàng</h3>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="banner-product" style="margin-bottom: 30px;">
                <img style="width:100%; " src="<?= _WEB_ROOT . '/app/public/assets/clients/images/bg_pro.jpg' ?>" xriginal="" alt="">
                <h1>OARS</h1>
                <h3>Thực phẩm an toàn 100%</h3>
            </div>
            <div class="chitiet-body">
                <div class="chitiet-body-header">
                    <div class="chitiet-body-title">
                        <span class="chitiet-title-mota chitiet-body-active" data-title="#chitiet-mota">
                            Mô tả
                        </span>

                    </div>

                    <div class="chitiet-mota chitiet-active" id="chitiet-mota">
                        <div style="overflow: hidden;height:300px;" class="chitiet-mota-text">
                            <p><?= $item['description'] ?></p>
                        </div>
                        <div class="gradient"></div>
                        <a data-view-id="view_description_button" class="btn-more">Xem Thêm Nội Dung</a>

                    </div>

                </div>
            </div>


        </div>
        <div class="chitiet-foot">
            <div class="chitiet-foot-title">
                <span>SẢN PHẨM TƯƠNG TỰ</span>
            </div>


            <div class="wrapper-product">
                <div class=" product-selling-main">
                    <?php foreach ($product_same as $item) : ?>
                        <div>
                            <a href="<?= _WEB_ROOT . '/products/detail/' . $item['id'] ?>" class="content-tab-item">
                                <div class="product-thumnail">

                                    <img width="180" height="180" src="<?= _WEB_ROOT . '/app/public/assets/admin/images/' . $item['image'] ?>" alt="">

                                </div>
                                <div class="product-info">
                                    <div class="product-name">
                                        <h3><?= $item['name'] ?></h3>
                                    </div>
                                    <div class="product-price">
                                        <h3><?= product_price($item['price']) ?><sup>đ</sup></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="icon-next">
                    <i class="fa-solid fa-chevron-right icon-right glider-next "></i>
                </div>
                <div class="icon-previous">
                    <i class="fa-solid fa-chevron-left icon-left glider-prev"></i>
                </div>


            </div>
        </div>

        <div style="background-color: #f9f9f9;"class="chitiet-foot">
            <div class="chitiet-foot-title">
                <span>ĐÁNH GIÁ SẢN PHẨM</span>

            </div>

            <div class="form-post-comment">
                    
            <?php if(isset($_SESSION["user"])){?>
                <form id="hrv-product-reviews-frm" name="hrv-product-reviews-frm">
                    <input type="hidden" name="customer_id" value="<?= $_SESSION['user']['id'] ?> ">
                    <input type="hidden" name="product_id" value="<?= $product_id ?> ">

                    <fieldset>
                        <div id="dvBody">
                            <label style="margin:10px 0;display:block;font-size: 18px;">Nội dung</label>
                            <label id="dvBody_character"></label>
                            <textarea name="content_comment" id="hrv_product_reviews_form" rows="10" placeholder="Viết nội dung đánh giá ở đây (>3 ký tự và < 1000 ký tự)"></textarea>
                            <div id="msg_body" style="display:none; color:red; margin-top:10px;">Độ dài nội dung phải từ 3 đến 1000 ký tự, vui lòng nhập lại.</div>
                            <div id="msg_body_validate" style="display:none; color:red; margin-top:10px;">Nội dung của bạn không hợp lệ, vui lòng nhập lại.</div>
                        </div>
                    </fieldset>
                    <p class="error"></p>
                    <div style="display:flex;justify-content: flex-end;">
                        <input type="submit" id="btnSubmitReview" value="Gửi đánh giá" width="80">
                    </div>
                </form>
                <?php } else { ?>
                    <h1 style="margin-top:50px;font-weight:bold;">Vui lòng 
                    <a style="color:#91ad41;" href="<?= _WEB_ROOT."/account/login"?>"> Đăng nhập </a>
                    để bình luận</h1>
                    <?php }?>


                     
                                
                            
            </div>


            <div class="comment-list">
                <?php foreach ($dataComment as $item) { ?>
                  
                    <?php $timestamp=strtotime($item["time_comment"])?>
                    <div class="item">
                    <div class="avatar">
                        <img src="<?= _WEB_ROOT . '/app/public/assets/clients/images/' . $item['image'] ?>" alt="<?= $item["fullname"]  ?>">
                    </div>
                    <div class="summary">
                        <div class="info-user">
                            <div class="comment-header">
                                <span class="authorname name-4"><?= $item["fullname"] ?></span>

                            </div>
                            <div class="comment-content"><?= $item["content"] ?></div>
                            <div class="time-comment"><?=  strftime("%d/%m/%Y %T",$timestamp)?></div>
 
                        </div>
                    </div>
                </div>
               <?php }?>
             
            </div>

        </div>
    </div>
    <script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Detail.js"></script>