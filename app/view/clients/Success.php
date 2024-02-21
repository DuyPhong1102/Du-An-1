<?php 

  function product_price($priceFloat) {

    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price;
}   
$prices_value_final=0;
    
foreach ($order_data as $item) {
    $prices_value_final+=($item["price"]*$item["quantity"]);
}

?>
<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/success.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/checkouts.css">

<div class="breadcrumb_bg">
    <div class="breadcrumb-box-img">
        <img src="<?= _WEB_ROOT.'/app/public/assets/clients/images/bg_breadcrumb.png' ?>" alt="">
    </div>
    <div class="title-full">
        <div class="container">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <p class="title-page">Đặt hàng thành công- Oars Organic</p>
        </div>
    </div>
</div>
<div class="order-success">
    <div class="grid wide">
        <div class="row">
            <div class="order-success2 col l-7">
                <div class="order-heading">
                    <h2 class="order-head-title flex">
                        Đặt hàng thành công
                        <div class="icon-check">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </h2>
                    <span class="ma-don-hang">Mã đơn hàng #<?=rand(10000,100000)?></span>
                    <span class="order-thank-you">Cảm ơn bạn đã mua hàng</span>
                </div>
                <div class="infor-order">
                    <h3>Thông tin giao hàng</h3>
                    <div class="content-main">
                       <?php foreach ($info_user as $item) { ?>
                        <div class="form-group flex">
                            <span>Họ và tên người nhận hàng:</span>
                            <span><?= $item["name_receiver"] ?></span>
                        </div>
                        <div class="form-group flex">
                            <span>Số điện thoại:</span>
                            <span><?=$item['phone_receiver']?></span>
                        </div>
                        <div class="form-group flex">
                            <span>Địa chỉ nhận hàng:</span>
                            <span><?=$item['address_receiver']?></span>
                        </div>
                        <div class="form-group flex">
                            <span>Phương thức thanh toán:</span>
                            <span>Thanh toán khi giao hàng (COD)</span>
                        </div>
                     <?php  }?>

                    </div>
                </div>
                <div class="order-footer">
                    <a href="<?= _WEB_ROOT . '/category' ?>" class="tag-a">
                        <span>Tiếp tục mua hàng</span>
                    </a>
                </div>
            </div>
            <div class="col l-5 c-12 " style="background-color: #fafafa;border-radius: 15px;height:315px;">
                    <div class="checkout_product">
                        <div class="title-infor" style="padding: 5px 0;">
                            <h2>Thông tin đơn hàng</h2>
                        </div>
                        <div class="infor-product-order">
                            <div class="product-order">
                                  <?php foreach ($order_data as $item): ?>   
                                <div class="product-item flex">
                                    <div class="product-left flex">
                                        <div class="product-img">
                                            <img src="<?= _WEB_ROOT.'/app/public/assets/admin/images/'.$item['image'] ?>" alt="error">
                                        </div>
                                        <div class="product-name">
                                            <span><?= $item["name"]?></span>
                                            <div style="display:flex;align-items: center;">
                                                <b>x</b>
                                                <div class="quantity-product"><?= $item["quantity"] ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <p><?= product_price( $item["price"] * $item["quantity"]) ?> </p><sup>đ</sup>
                                    </div>
                                </div>
                                 <?php endforeach;?>              
                            </div>
                        </div>
                        
                     
                        <div class="tong-cong flex">
                            <span>Tổng tiền:</span>
                            <h3 style="color:red;"><?= product_price($prices_value_final)?> <sup>đ</sup></h3>
                        </div>
                    </div>
                </div>
            <?php
         
            ?>
        </div>
    </div>
</div>